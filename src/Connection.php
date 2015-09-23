<?php

namespace Glassdoor;
use Glassdoor\Action\ActionInterface;
use Glassdoor\Error\GlassDoorResponseException;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;

/**
 * Makes the calls to Glassdoor
 */
final class Connection {
  /**
   * @var \Glassdoor\Config
   */
  private $config;
  /**
   * @var HandlerStack|null
   */
  private $stack;

  /**
   * @param \Glassdoor\Config $config
   */
  public function __construct(Config $config) {
    $this->config = $config;
  }

  public function setHandlerStack(HandlerStack $stack) {
    $this->stack = $stack;
  }

  /**
   * Build a URI object for the Request
   *
   * @param \Glassdoor\Action\ActionInterface $action
   * @return \GuzzleHttp\Psr7\Uri
   */
  private function buildUri(ActionInterface $action) {
    $parts = parse_url($this->config->getBaseUrl());

    $params = $action->getParams();
    $params['v'] = $action->getVersion();
    $params['format'] = $this->config->getResponseFormat();
    $params['t.p'] = $this->config->getPartnerId();
    $params['t.k'] = $this->config->getPartnerKey();
    $params['userip'] = $_SERVER['REMOTE_ADDR'];
    $params['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    $params['action'] = $action->action();

    // Allow any overrides
    if (!empty($parts['query'])) {
      parse_str($parts['query'], $query_params);
      array_merge($params, $query_params);
    }

    $parts['query'] = http_build_query($params);

    return Uri::fromParts($parts);
  }

  /**
   * Make a call to the GlassDoor API
   *
   * @param \Glassdoor\Action\ActionInterface $action
   * @return \Glassdoor\ResponseObject\ResponseInterface
   *
   * @throws \Glassdoor\Error\GlassDoorResponseException
   */
  public function call(ActionInterface $action) {
    // If a handler is set then use that to build the client
    if ($this->stack) {
      $client = new Client([
        'handler' => $this->stack,
      ]);
    }
    else {
      $client = new Client();
    }

    $request = new Request($action->getMethod(), $this->buildUri($action));

    $response = $client->send($request);

    if ($response->getStatusCode() !== 200) {
      throw new GlassDoorResponseException($response->getReasonPhrase(), $response->getStatusCode());
    }

    $body = json_decode($response->getBody(), TRUE);

    if (!$body || $body['status'] !== 'OK') {
      if ($body) {
        $status = $body['status'];
      }
      else {
        $status = $response->getReasonPhrase();
      }
      throw new GlassDoorResponseException($status, $response->getStatusCode());
    }

    return $action->buildResponse($body, $response);
  }
}
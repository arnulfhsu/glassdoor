<?php

/**
 * @file
 * Action interface.
 */

namespace Glassdoor\Action;

use GuzzleHttp\Psr7\Response;

/**
 * ActionInterface class.
 */
interface ActionInterface {

  /**
   * Add a new parameter.
   *
   * @param string $key
   *   Parameter key.
   * @param string $value
   *   Parameter value.
   *
   * @return $this
   *   JobProgression object.
   */
  public function addParam($key, $value);

  /**
   * The name of the action to use in the GD API.
   *
   * @return string
   *   Name of the action.
   */
  public static function action();

  /**
   * Return params array.
   *
   * @return array
   *   Parameters.
   */
  public function getParams();

  /**
   * The HTTP method to use for the call.
   *
   * @return string
   *   GET method for call.
   */
  public function getMethod();

  /**
   * Get the Version of the API to use.
   *
   * @return int
   *   API version
   */
  public function getVersion();

  /**
   * Build the Response Object.
   *
   * @param array $body
   *   Body of the response.
   * @param \GuzzleHttp\Psr7\Response $response
   *   Response object.
   *
   * @return \Glassdoor\ResponseObject\ResponseInterface
   *   Built response.
   */
  public function buildResponse(array $body, Response $response);

}

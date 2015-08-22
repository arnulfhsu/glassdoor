<?php

namespace Glassdoor\Action;

use Psr\Http\Message\ResponseInterface;

interface ActionInterface {
  /**
   * Set a url param.
   *
   * @param $key
   * @param $value
   * @return $this
   */
  public function addParam($key, $value);

  /**
   * The name of the action to use in the GD API.
   *
   * @return string
   */
  public static function action();

  /**
   * The URL query parameters
   *
   * @return array
   */
  public function getParams();

  /**
   * The HTTP method to use for the call
   *
   * @return string
   */
  public function getMethod();

  /**
   * Get the Version of the API to use.
   *
   * @return string
   */
  public function getVersion();

  /**
   * Build the Response Object
   *
   * @param array $body
   * @return \Glassdoor\ResponseObject\ResponseInterface
   */
  public function buildResponse(array $body);
}
<?php

/**
 * @file
 * Glassdoor response interface.
 */

namespace Glassdoor\ResponseObject;

use GuzzleHttp\Psr7\Response;

/**
 * ResponseInterface interface.
 */
interface ResponseInterface {

  /**
   * Construct parameters.
   *
   * @param array $values
   *   Input values.
   * @param \GuzzleHttp\Psr7\Response $response
   *   Response object.
   */
  public function __construct(array $values, Response $response);

}

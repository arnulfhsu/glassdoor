<?php

namespace Glassdoor\ResponseObject;


use GuzzleHttp\Psr7\Response;

interface ResponseInterface {
  /**
   * @param array $values
   * @param \GuzzleHttp\Psr7\Response $response
   */
  public function __construct(array $values, Response $response);
}
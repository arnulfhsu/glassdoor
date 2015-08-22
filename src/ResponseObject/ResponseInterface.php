<?php

namespace Glassdoor\ResponseObject;


interface ResponseInterface {
  public function __construct(array $values);
}
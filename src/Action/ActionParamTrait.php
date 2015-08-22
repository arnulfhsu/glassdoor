<?php

namespace Glassdoor\Action;


trait ActionParamTrait {
  protected $params;

  /**
   * Set a url param
   *
   * @param $key
   * @param $value
   * @return $this
   */
  public function addParam($key, $value) {
    $this->params[$key] = $value;
    return $this;
  }

  /**
   * Return params array.
   *
   * @return array
   */
  public function getparams() {
    return $this->params;
  }
}
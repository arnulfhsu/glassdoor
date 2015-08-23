<?php

namespace Glassdoor\ResponseObject;


use Glassdoor\Error\GlassDooorResponseException;

class Image implements ResponseInterface {
  public $src;
  public $height;
  public $weight;

  public function __construct(array $values) {
    if (empty($values['src']) ||
      empty($values['height']) ||
      empty($values['weight'])) {

      throw new GlassDooorResponseException('Image requires src, height and weight');
    }

    $this->src = $values['src'];
    $this->height = $values['height'];
    $this->weight = $values['weight'];
  }


}
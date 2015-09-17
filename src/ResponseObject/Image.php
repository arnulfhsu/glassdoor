<?php

namespace Glassdoor\ResponseObject;


use Glassdoor\Error\GlassDooorResponseException;

class Image {
  /**
   * @var string
   */
  private $src;
  /**
   * @var int
   */
  private $height;
  /**
   * @var int
   */
  private $weight;

  /**
   * @param array $values
   * @throws \Glassdoor\Error\GlassDooorResponseException
   */
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

  /**
   * @return string
   */
  public function getSrc() {
    return $this->src;
  }

  /**
   * @return int
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * @return int
   */
  public function getWeight() {
    return $this->weight;
  }

}
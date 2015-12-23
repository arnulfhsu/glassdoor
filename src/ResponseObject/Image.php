<?php

/**
 * @file
 */

namespace Glassdoor\ResponseObject;


use Glassdoor\Error\GlassDoorResponseException;
/**
 *
 */
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
  private $width;

  /**
   * @param array $values
   * @throws \Glassdoor\Error\GlassDoorResponseException
   */
  public function __construct(array $values) {
    if (empty($values['src']) ||
      empty($values['height']) ||
      empty($values['width'])) {

      throw new GlassDoorResponseException('Image requires src, height and width');
    }

    $this->src = $values['src'];
    $this->height = $values['height'];
    $this->width = $values['width'];
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
  public function getWidth() {
    return $this->width;
  }

}

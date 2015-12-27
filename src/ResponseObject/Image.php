<?php

/**
 * @file
 * Response object from Image on Company.
 */

namespace Glassdoor\ResponseObject;

use Glassdoor\Error\GlassDoorResponseException;

/**
 * Image class.
 */
class Image {

  /**
   * Image src attribute.
   *
   * @var string
   */
  private $src;

  /**
   * Image height.
   *
   * @var string
   */
  private $height;

  /**
   * Image width.
   *
   * @var string
   */
  private $width;

  /**
   * Constructor.
   *
   * @param array $values
   *   Input attributes.
   *
   * @throws \Glassdoor\Error\GlassDoorResponseException
   *   Throws error if input value not found.
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
   * Get src attribute.
   *
   * @var string
   */
  public function getSrc() {
    return $this->src;
  }

  /**
   * Height.
   *
   * @var string
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * Width.
   *
   * @var string
   */
  public function getWidth() {
    return $this->width;
  }

}

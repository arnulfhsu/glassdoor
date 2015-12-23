<?php

/**
 * @file
 */

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\Image;
/**
 *
 */
class Person {
  /**
   * @var string
   */
  private $name;
  /**
   * @var string
   */
  private $title;
  /**
   * @var float
   */
  private $percent_approval;
  /**
   * @var float
   */
  private $percent_disapproval;
  /**
   * @var \Glassdoor\ResponseObject\Image
   */
  private $image;

  /**
   *
   */
  public function __construct(array $values) {
    $this->name = empty($values['name']) ? '' : $values['name'];
    $this->title = empty($values['title']) ? '' : $values['title'];
    $this->percent_approval = empty($values['percent_approval']) ? '' : $values['percent_approval'];
    $this->percent_disapproval = empty($values['percent_disapproval']) ? '' : $values['percent_disapproval'];

    if (!empty($values['image'])) {
      $this->image = new Image($values['image']);
    }
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @return float
   */
  public function getPercentApproval() {
    return $this->percent_approval;
  }

  /**
   * @return float
   */
  public function getPercentDisapproval() {
    return $this->percent_disapproval;
  }

  /**
   * @return Image
   */
  public function getImage() {
    return $this->image;
  }

}

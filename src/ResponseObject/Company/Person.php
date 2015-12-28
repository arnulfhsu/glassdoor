<?php

/**
 * @file
 * Person object from Company.
 */

namespace Glassdoor\ResponseObject\Company;

use Glassdoor\ResponseObject\Image;

/**
 * Person class.
 */
class Person {

  /**
   * Person's name.
   */
  private $name;

  /**
   * Title of person.
   */
  private $title;

  /**
   * Percent of raters who approve.
   */
  private $percent_approval;

  /**
   * Percent of raters who disapprove.
   */
  private $percent_disapproval;

  /**
   * Image object.
   */
  private $image;

  /**
   * Construction method.
   *
   * $values array
   *   Values to populate.
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
   * Get name.
   *
   * @return string
   *   Name of person.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Get title.
   *
   * @return string
   *   Title of person.
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Get approval percentage.
   *
   * @return float
   *   Approval rating.
   */
  public function getPercentApproval() {
    return $this->percent_approval;
  }

  /**
   * Get disapproval percentage.
   *
   * @return float
   *   Disapproval rating.
   */
  public function getPercentDisapproval() {
    return $this->percent_disapproval;
  }

  /**
   * Get image.
   *
   * @return \Glassdoor\ResponseObject\Image
   *   Image object.
   */
  public function getImage() {
    return $this->image;
  }

}

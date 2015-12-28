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
  private $percentApproval;

  /**
   * Percent of raters who disapprove.
   */
  private $percentDisapproval;

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
    $this->percentApproval = empty($values['percent_approval']) ? '' : $values['percent_approval'];
    $this->percentDisapproval = empty($values['percent_disapproval']) ? '' : $values['percent_disapproval'];

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
    return $this->percentApproval;
  }

  /**
   * Get disapproval percentage.
   *
   * @return float
   *   Disapproval rating.
   */
  public function getPercentDisapproval() {
    return $this->percentDisapproval;
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

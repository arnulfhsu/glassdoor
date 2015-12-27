<?php

/**
 * @file
 * Review object from Company.
 */

namespace Glassdoor\ResponseObject\Company;

/**
 * Review class.
 */
class Review {
  /**
   * @var int
   */
  private $id;

  /**
   * @var boolean
   */
  private $currentJob;

  /**
   * @var \DateTime
   */
  private $reviewDateTime;

  /**
   * @var string
   */
  private $location;

  /**
   * @var string
   */
  private $jobTitle;

  /**
   * @var string
   */
  private $jobTitleFromDB;

  /**
   * @var string
   */
  private $headline;

  /**
   * @var string
   */
  private $pros;

  /**
   * @var string
   */
  private $cons;

  /**
   * @var int
   */
  private $overall;

  /**
   * @var int
   */
  private $overallNumeric;

  /**
   * @param array $values
   */
  public function __construct(array $values) {
    $this->id = empty($values['id']) ? '' : $values['id'];
    $this->currentJob = (bool) empty($values['currentJob']) ? '' : $values['currentJob'];
    $this->requestDate = empty($values['reviewDateTime']) ? '' : new \DateTime($values['reviewDateTime']);
    $this->location = empty($values['location']) ? '' : $values['location'];
    $this->jobTitle = empty($values['jobTitle']) ? '' : $values['jobTitle'];
    $this->jobTitleFromDB = empty($values['jobTitleFromDb']) ? '' : $values['jobTitleFromDb'];
    $this->headline = empty($values['headline']) ? '' : $values['headline'];
    $this->pros = empty($values['pros']) ? '' : $values['pros'];
    $this->cons = empty($values['cons']) ? '' : $values['cons'];
    $this->overall = empty($values['overall']) ? '' : $values['overall'];
    $this->overallNumeric = empty($values['overallNumeric']) ? '' : $values['overallNumeric'];
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return boolean
   */
  public function isCurrentJob() {
    return $this->currentJob;
  }

  /**
   * @return \DateTime
   */
  public function getReviewDateTime() {
    return $this->reviewDateTime;
  }

  /**
   * @return string
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * @return string
   */
  public function getJobTitle() {
    return $this->jobTitle;
  }

  /**
   * @return string
   */
  public function getJobTitleFromDB() {
    return $this->jobTitleFromDB;
  }

  /**
   * @return string
   */
  public function getHeadline() {
    return $this->headline;
  }

  /**
   * @return string
   */
  public function getPros() {
    return $this->pros;
  }

  /**
   * @return string
   */
  public function getCons() {
    return $this->cons;
  }

  /**
   * @return int
   */
  public function getOverall() {
    return $this->overall;
  }

  /**
   * @return int
   */
  public function getOverallNumeric() {
    return $this->overallNumeric;
  }

}

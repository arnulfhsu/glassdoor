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
   * Id of the review.
   */
  private $id;

  /**
   * Current job being reviewed.
   */
  private $currentJob;

  /**
   * Date of review.
   */
  private $reviewDateTime;

  /**
   * Location of review.
   */
  private $location;

  /**
   * Job title of review.
   */
  private $jobTitle;

  /**
   * Job title of review from DB.
   */
  private $jobTitleFromDB;

  /**
   * Headline.
   */
  private $headline;

  /**
   * Pros of review.
   */
  private $pros;

  /**
   * Cons of review.
   */
  private $cons;

  /**
   * Overall rating.
   */
  private $overall;

  /**
   * Numeric rating.
   */
  private $overallNumeric;

  /**
   * Construct.
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
   * Get Id.
   *
   * @return int
   *   Id of review.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Check if reviewer still at job.
   *
   * @return bool
   *   If reviewer is still at job.
   */
  public function isCurrentJob() {
    return $this->currentJob;
  }

  /**
   * Get review date/time.
   *
   * @return \DateTime
   *   DateTime of reivew.
   */
  public function getReviewDateTime() {
    return $this->reviewDateTime;
  }

  /**
   * Location of review.
   *
   * @return string
   *   Location string.
   */
  public function getLocation() {
    return $this->location;
  }

  /**
   * Job title.
   *
   * @return string
   *   String.
   */
  public function getJobTitle() {
    return $this->jobTitle;
  }

  /**
   * Job title from DB.
   *
   * @return string
   *   String.
   */
  public function getJobTitleFromDb() {
    return $this->jobTitleFromDB;
  }

  /**
   * Headline of review.
   *
   * @return string
   *   String.
   */
  public function getHeadline() {
    return $this->headline;
  }

  /**
   * Pros of review.
   *
   * @return string
   *   String.
   */
  public function getPros() {
    return $this->pros;
  }

  /**
   * Cons.
   *
   * @return string
   *   String.
   */
  public function getCons() {
    return $this->cons;
  }

  /**
   * Overall rating.
   *
   * @return string
   *   String.
   */
  public function getOverall() {
    return $this->overall;
  }

  /**
   * Overall rating - numeric.
   *
   * @return int
   *   Numberic rating.
   */
  public function getOverallNumeric() {
    return $this->overallNumeric;
  }

}

<?php

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\ResponseInterface;

class Review implements ResponseInterface {
  /**
   * @var int
   */
  public $id;

  /**
   * @var boolean
   */
  public $currentJob;

  /**
   * @var \DateTime
   */
  public $reviewDateTime;

  /**
   * @var string
   */
  public $location;

  /**
   * @var string
   */
  public $jobTitle;

  /**
   * @var string
   */
  public $jobTitleFromDb;

  /**
   * @var string
   */
  public $headline;

  /**
   * @var string
   */
  public $pros;

  /**
   * @var string
   */
  public $cons;

  /**
   * @var int
   */
  public $overall;

  /**
   * @var int
   */
  public $overallNumeric;

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
}

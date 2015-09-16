<?php

namespace Glassdoor\ResponseObject;


class JobProgression implements ResponseInterface{
  /**
   * @var string
   */
  private $job_title;
  /**
   * @var int
   */
  private $frequency;
  /**
   * @var float
   */
  private $frequency_percent;
  /**
   * @var int
   */
  private $national_job_count;
  /**
   * @var int
   */
  private $median_salary;


  public function __construct(array $values) {
    $this->frequency = empty($value['frequency']) ? '' : $value['frequency'];
    $this->job_title = empty($value['nextJobTitle']) ? '' : $value['nextJobTitle'];
    $this->frequency_percent = empty($value['frequencyPercent']) ? '' : $value['frequencyPercent'];
    $this->national_job_count = empty($value['nationalJobCount']) ? '' : $value['nationalJobCount'];
    $this->median_salary = empty($value['medianSalary']) ? '' : $value['medianSalary'];
  }

  /**
   * @return string
   */
  public function getJobTitle() {
    return $this->job_title;
  }

  /**
   * @return int
   */
  public function getFrequency() {
    return $this->frequency;
  }

  /**
   * @return float
   */
  public function getFrequencyPercent() {
    return $this->frequency_percent;
  }

  /**
   * @return int
   */
  public function getNationalJobCount() {
    return $this->national_job_count;
  }

  /**
   * @return int
   */
  public function getMedianSalary() {
    return $this->median_salary;
  }

}
<?php

namespace Glassdoor\ResponseObject;


class JobProgression implements ResponseInterface{
  /**
   * @var string
   */
  public $job_title;
  /**
   * @var int
   */
  public $frequency;
  /**
   * @var float
   */
  public $frequency_percent;
  /**
   * @var int
   */
  public $national_job_count;
  /**
   * @var int
   */
  public $median_salary;


  public function __construct(array $values) {
    $this->frequency = empty($value['frequency']) ? '' : $value['frequency'];
    $this->job_title = empty($value['nextJobTitle']) ? '' : $value['nextJobTitle'];
    $this->frequency_percent = empty($value['frequencyPercent']) ? '' : $value['frequencyPercent'];
    $this->national_job_count = empty($value['nationalJobCount']) ? '' : $value['nationalJobCount'];
    $this->median_salary = empty($value['medianSalary']) ? '' : $value['medianSalary'];
  }
}
<?php

/**
 * @file
 * Job progression.
 */

namespace Glassdoor\ResponseObject;

/**
 * JobProgression class.
 */
class JobProgression {

  /**
   * Job title.
   *
   * @var string
   */
  private $jobTitle;

  /**
   * Frequency.
   *
   * @var int
   */
  private $frequency;

  /**
   * Frequency percentage.
   *
   * @var float
   */
  private $frequencyPercent;

  /**
   * National job count.
   *
   * @var string
   */
  private $nationalJobCount;

  /**
   * Median salary.
   *
   * @var int
   */
  private $medianSalary;

  /**
   * Constructor.
   */
  public function __construct(array $values) {
    $this->frequency = empty($value['frequency']) ? '' : $value['frequency'];
    $this->jobTitle = empty($value['nextJobTitle']) ? '' : $value['nextJobTitle'];
    $this->frequencyPercent = empty($value['frequencyPercent']) ? '' : $value['frequencyPercent'];
    $this->nationalJobCount = empty($value['nationalJobCount']) ? '' : $value['nationalJobCount'];
    $this->medianSalary = empty($value['medianSalary']) ? '' : $value['medianSalary'];
  }

  /**
   * Job title.
   *
   * @var string
   */
  public function getJobTitle() {
    return $this->jobTitle;
  }

  /**
   * Frequency.
   *
   * @var int
   */
  public function getFrequency() {
    return $this->frequency;
  }

  /**
   * Frequency percent.
   *
   * @var float
   */
  public function getFrequencyPercent() {
    return $this->frequencyPercent;
  }

  /**
   * National job count.
   *
   * @var int
   */
  public function getNationalJobCount() {
    return $this->nationalJobCount;
  }

  /**
   * Salary.
   *
   * @var int
   */
  public function getMedianSalary() {
    return $this->median_salary;
  }

}

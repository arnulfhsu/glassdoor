<?php

namespace Glassdoor\ResponseObject;


class JobProgressionResponse implements ResponseInterface {
  /**
   * @var string
   */
  private $job_title;
  /**
   * @var string
   */
  private $currency_code;
  /**
   * @var string
   */
  private $currency_symbol;
  /**
   * @var string
   */
  private $pay_log;
  /**
   * @var string
   */
  private $pay_median;
  /**
   * @var string
   */
  private $pay_high;
  /**
   * @var JobProgression[]
   */
  private $job_progressions;

  public function __construct(array $values) {
    $this->job_title = empty($values['jobTitle']) ? '' : $values['jobTitle'];
    $this->currency_code = empty($values['payCurrencyCode']) ? '' : $values['payCurrencyCode'];
    $this->currency_symbol = empty($values['payCurrencySymbol']) ? '' : $values['payCurrencySymbol'];
    $this->pay_log = empty($values['payLow']) ? '' : $values['payLow'];
    $this->pay_high = empty($values['payHigh']) ? '' : $values['payHigh'];
    $this->pay_median = empty($values['payMedian']) ? '' : $values['payMedian'];

    $this->job_progressions = [];
    if (!empty($values['progressions']) && is_array($values['progressions'])) {
      foreach($values['progressions'] as $progression) {
        $this->job_progressions[] = new JobProgression($progression);
      }
    }
  }

  /**
   * @return string
   */
  public function getJobTitle() {
    return $this->job_title;
  }

  /**
   * @return string
   */
  public function getCurrencyCode() {
    return $this->currency_code;
  }

  /**
   * @return string
   */
  public function getCurrencySymbol() {
    return $this->currency_symbol;
  }

  /**
   * @return string
   */
  public function getPayLog() {
    return $this->pay_log;
  }

  /**
   * @return string
   */
  public function getPayMedian() {
    return $this->pay_median;
  }

  /**
   * @return string
   */
  public function getPayHigh() {
    return $this->pay_high;
  }

  /**
   * @return JobProgression[]
   */
  public function getJobProgressions() {
    return $this->job_progressions;
  }
}
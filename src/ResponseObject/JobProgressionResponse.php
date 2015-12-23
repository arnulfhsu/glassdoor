<?php

/**
 * @file
 * Response object from JobProgression endpoint.
 */

namespace Glassdoor\ResponseObject;


use GuzzleHttp\Psr7\Response;

/**
 * JobProgressionResponse class.
 */
class JobProgressionResponse implements ResponseInterface {

  /**
   * Job title.
   *
   * @var string
   */
  private $jobTitle;

  /**
   * Currency code.
   *
   * @var string
   */
  private $currencyCode;

  /**
   * Currency Symbol.
   *
   * @var string
   */

  private $currencySymbol;

  /**
   * Pay log.
   *
   * @var string
   */
  private $payLog;

  /**
   * Pay median.
   *
   * @var string
   */
  private $payMedian;

  /**
   * @var string
   */
  private $payHigh;
  /**
   * @var JobProgression[]
   */
  private $jobProgressions;

  /**
   * @var Response
   */
  private $response;

  /**
   *
   */
  public function __construct(array $values, Response $response) {
    $this->response = $response;

    $this->jobTitle = empty($values['jobTitle']) ? '' : $values['jobTitle'];
    $this->currencyCode = empty($values['payCurrencyCode']) ? '' : $values['payCurrencyCode'];
    $this->currencySymbol = empty($values['payCurrencySymbol']) ? '' : $values['payCurrencySymbol'];
    $this->payLog = empty($values['payLow']) ? '' : $values['payLow'];
    $this->payHigh = empty($values['payHigh']) ? '' : $values['payHigh'];
    $this->payMedian = empty($values['payMedian']) ? '' : $values['payMedian'];

    $this->job_progressions = [];
    if (!empty($values['progressions']) && is_array($values['progressions'])) {
      foreach ($values['progressions'] as $progression) {
        $this->job_progressions[] = new JobProgression($progression);
      }
    }
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

  /**
   * @return Response
   */
  public function getResponse() {
    return $this->response;
  }

}

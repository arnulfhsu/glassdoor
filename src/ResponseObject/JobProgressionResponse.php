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
   * Pay high.
   *
   * @var string
   */
  private $payHigh;

  /**
   * Job progressions.
   *
   * @var array
   */
  private $jobProgressions;

  /**
   * Response object.
   *
   * @var Response
   */
  private $response;

  /**
   * Constructor.
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
   * Job title.
   *
   * @return string
   *   Return attribute.
   */
  public function getJobTitle() {
    return $this->jobTitle;
  }

  /**
   * Currency code.
   *
   * @return string
   *   Return attribute.
   */
  public function getCurrencyCode() {
    return $this->currency_code;
  }

  /**
   * Currency symbol.
   *
   * @return string
   *   Return attribute.
   */
  public function getCurrencySymbol() {
    return $this->currency_symbol;
  }

  /**
   * Pay log.
   *
   * @return string
   *   Return attribute.
   */
  public function getPayLog() {
    return $this->pay_log;
  }

  /**
   * Pay median.
   *
   * @return string
   *   Return attribute.
   */
  public function getPayMedian() {
    return $this->pay_median;
  }

  /**
   * Pay high.
   *
   * @return string
   *   Return attribute.
   */
  public function getPayHigh() {
    return $this->pay_high;
  }

  /**
   * Job progressions array.
   *
   * @return array
   *   Return attribute.
   */
  public function getJobProgressions() {
    return $this->job_progressions;
  }

  /**
   * Response Object.
   *
   * @return Response
   *   Return attribute.
   */
  public function getResponse() {
    return $this->response;
  }

}

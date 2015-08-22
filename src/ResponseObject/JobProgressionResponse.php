<?php

namespace Glassdoor\ResponseObject;


class JobProgressionResponse implements ResponseInterface {
  public $job_title;
  public $currency_code;
  public $currency_symbol;
  public $pay_log;
  public $pay_median;
  public $pay_high;
  public $job_progressions;

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
}
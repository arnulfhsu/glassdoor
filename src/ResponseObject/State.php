<?php

namespace Glassdoor\ResponseObject;


class State implements ResponseInterface {
  /**
   * @var string|null
   */
  public $name;
  /**
   * @var int|null
   */
  public $id;
  /**
   * @var int|null
   */
  public $jobCount;
  /**
   * @var float|null
   */
  public $score;
  /**
   * @var float|null
   */
  public $latitude;
  /**
   * @var float|null
   */
  public $longitude;

  /**
   * @param array $values
   * - id
   * - name
   * - jobCount
   * - score
   * - latitude
   * - longitude
   */
  public function __construct(array $values) {
    $this->id = empty($values['id']) ? NULL : $values['id'];
    $this->id = empty($values['name']) ? NULL : $values['name'];
    $this->id = empty($values['jobCount']) ? NULL : $values['jobCount'];
    $this->id = empty($values['score']) ? NULL : $values['score'];
    $this->id = empty($values['latitude']) ? NULL : $values['latitude'];
    $this->id = empty($values['longitude']) ? NULL : $values['longitude'];
  }
}
<?php

namespace Glassdoor\ResponseObject;


use Glassdoor\Error\GlassDooorResponseException;
use Glassdoor\GlassdoorException;

class JobStat implements ResponseInterface {

  /**
   * @var int $count The number of states
   */
  public $count;
  /**
   * @var State[] $states An array of State objects
   */
  public $states;

  /**
   * @param array $values
   *   An array with properties
   *     - count
   *     - states - array of State objects
   *
   * @throws \Glassdoor\Error\GlassDooorResponseException
   */
  public function __construct(array $values) {
    throw new GlassdoorException('NOT IMPLEMENTED');

    if (empty($values['count']) || empty($values['states'])) {
      throw new GlassDooorResponseException('count and states are required');
    }

    $this->count = $values['count'];
    $this->states = $values['states'];
  }
}
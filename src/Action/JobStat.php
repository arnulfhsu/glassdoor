<?php

namespace Glassdoor\Action;

use Glassdoor\ResponseObject\JobStat as JobStatResponse;
use Glassdoor\ResponseObject\State;

class JobStat implements ActionInterface {
  use ActionParamTrait;

  /**
   * The name of the action.
   *
   * @return string
   */
  public static function action() {
    return 'jobs-stats';
  }

  /**
   * The URL query parameters
   *
   * @return array
   */
  public function getParams() {
    return $this->params;
  }

  /**
   * The HTTP method to use for the call
   *
   * @return string
   */
  public function getMethod() {
    return 'GET';
  }

  /**
   * Get the Version of the API to use.
   *
   * @return string
   */
  public function getVersion() {
    return '1';
  }


  /**
   * Build the Response Object
   *
   * @param array $body
   * @return \Glassdoor\ResponseObject\JobStat
   */
  public function buildResponse(array $body) {
    $values = [];

    if (!empty($body['response']['countReturned'])) {
      $values['count'] = $body['response']['countReturned'];
    }
    else {
      $values['count'] = 0;
    }

    $values['states'] = [];
    if (!empty($body['response']['states']) && is_array($body['response']['states'])) {
      foreach ($body['response']['states'] as $name => $state_values) {
        $values['states'][] = new State($state_values);
      }
    }

    return new JobStatResponse($values);
  }
}
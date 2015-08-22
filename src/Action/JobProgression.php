<?php

namespace Glassdoor\Action;


use Glassdoor\GlassdoorException;
use Glassdoor\ResponseObject\JobProgressionResponse;

class JobProgression implements ActionInterface {
  private $job_title;
  private $country_id = 1;

  /**
   * Return params array.
   *
   * @return array
   *
   * @throws \Glassdoor\GlassdoorException
   */
  public function getParams() {
    if (empty($this->job_title)) {
      throw new GlassdoorException('job_title Required for JobProgression Action');
    }

    return [
      'jobTitle' => $this->job_title,
      'countryId' => $this->country_id
    ];
  }


  /**
   * Set a url param.
   *
   * @param $key
   * @param $value
   * @return $this
   *
   * @throws \Glassdoor\GlassdoorException
   */
  public function addParam($key, $value) {
    if ($key !== 'job_title' || $key !== 'country_id') {
      throw new GlassdoorException('Job Progression Param can only be job_title or country_id');
    }

    $this->$key = $value;
    return $this;
  }


  /**
   * The name of the action to use in the GD API.
   *
   * @return string
   */
  public static function action() {
    return 'jobs-prog';
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
    return 1;
  }

  /**
   * Build the Response Object
   *
   * @param array $body
   * @return \Glassdoor\ResponseObject\ResponseInterface
   */
  public function buildResponse(array $body) {
    $progressions = empty($body['response']['results']) ? [] : $body['response']['results'];

    // Clone the array
    $values = $body['response'];
    unset($values['result']);

    $values['progressions'] = $progressions;

    return new JobProgressionResponse($values);
  }
}
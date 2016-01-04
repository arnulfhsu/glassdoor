<?php

/**
 * @file
 * Action to access the JobProgression endpoint.
 */

namespace Glassdoor\Action;

use Glassdoor\Error\GlassdoorException;
use Glassdoor\ResponseObject\JobProgressionResponse;
use GuzzleHttp\Psr7\Response;

/**
 * JobProgression class.
 */
class JobProgression implements ActionInterface {

  /**
   * Job title.
   *
   * @var string
   */
  private $job_title;

  /**
   * Country ID.
   *
   * @var int
   */
  private $country_id = 1;

  /**
   * Return params array.
   *
   * @return array
   *   Parameters.
   *
   * @throws \Glassdoor\Error\GlassdoorException
   */
  public function getParams() {
    if (empty($this->job_title)) {
      throw new GlassdoorException('job_title Required for JobProgression Action');
    }

    return [
      'jobTitle' => $this->job_title,
      'countryId' => $this->country_id,
    ];
  }

  /**
   * Add a new parameter.
   *
   * @param string $key
   *   Parameter key.
   * @param string $value
   *   Parameter value.
   *
   * @return $this
   *   JobProgression object.
   *
   * @throws \Glassdoor\Error\GlassdoorException
   *   Exception if invalid parameter is added.
   */
  public function addParam($key, $value) {
    if ($key !== 'job_title' && $key !== 'country_id') {
      throw new GlassdoorException('Job Progression Param can only be job_title or country_id');
    }

    $this->$key = $value;
    return $this;
  }

  /**
   * The name of the action to use in the GD API.
   *
   * @return string
   *   Name of the action.
   */
  public static function action() {
    return 'jobs-prog';
  }

  /**
   * The HTTP method to use for the call.
   *
   * @return string
   *   GET method for call.
   */
  public function getMethod() {
    return 'GET';
  }

  /**
   * Get the Version of the API to use.
   *
   * @return int
   *   API version
   */
  public function getVersion() {
    return 1;
  }

  /**
   * Build the Response Object.
   *
   * @param array $body
   *   Body of the response.
   * @param \GuzzleHttp\Psr7\Response $response
   *   Response object.
   *
   * @return \Glassdoor\ResponseObject\ResponseInterface
   *   Built response.
   */
  public function buildResponse(array $body, Response $response) {
    $progressions = empty($body['response']['results']) ? [] : $body['response']['results'];

    // Clone the array.
    $values = $body['response'];
    unset($values['result']);

    $values['progressions'] = $progressions;

    return new JobProgressionResponse($values, $response);
  }

}

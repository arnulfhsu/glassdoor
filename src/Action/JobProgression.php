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
  private $jobTitle;

  /**
   * Country ID.
   *
   * @var int
   */
  private $countryId = 1;

  /**
   * Return params array.
   *
   * @return array
   *   Parameters.
   *
   * @throws \Glassdoor\Error\GlassdoorException
   *   Job title Required for JobProgression Action.
   */
  public function getParams() {
    if (empty($this->jobTitle)) {
      throw new GlassdoorException('jobTitle Required for JobProgression Action.');
    }

    return [
      'jobTitle' => $this->jobTitle,
      'countryId' => $this->countryId,
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
   *   Job Progression Param can only be jobTitle or countryId.
   */
  public function addParam($key, $value) {
    if ($key !== 'jobTitle' && $key !== 'countryId') {
      throw new GlassdoorException('Job Progression Param can only be jobTitle or countryId.');
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

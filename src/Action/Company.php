<?php

/**
 * @file
 * Action to access the company search API endpoint.
 */

namespace Glassdoor\Action;

use Glassdoor\Error\GlassdoorException;
use Glassdoor\ResponseObject\Company\CompanyResponse;
use GuzzleHttp\Psr7\Response;

/**
 * Company class.
 */
class Company implements ActionInterface {
  private $query;
  private $locationSearch;
  private $city;
  private $state;
  private $country;
  private $page = 1;
  private $pageSize = 20;

  /**
   * Return params array.
   *
   * @return array
   *   Parameters.
   */
  public static function params() {
    return [
      'query',
      'city',
      'state',
      'country',
      'location_search',
      'page',
      'page_size',
    ];
  }

  /**
   * Filter companies by state.
   *
   * @return Company
   *   This class.
   */
  public function filterByState($state) {
    return $this->addParam('state', $state);
  }

  /**
   * Filter companies by city.
   *
   * @return Company
   *   This class.
   */
  public function filterByCity($city) {
    return $this->addParam('city', $city);
  }

  /**
   * Filter companies by country.
   *
   * @return Company
   *   This class.
   */
  public function filterByCountry($country) {
    return $this->addParam('country', $country);
  }

  /**
   * Search by location.
   *
   * @return Company
   *   This class.
   */
  public function searchByLocation($location) {
    return $this->addParam('location_search', $location);
  }

  /**
   * Search by company or job.
   *
   * @return Company
   *   This class.
   */
  public function searchByCompanyOrJob($search) {
    return $this->addParam('query', $search);
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
    if (!in_array($key, self::params())) {
      throw new GlassdoorException('Param not allowed');
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
    return 'employers';
  }

  /**
   * Return params array.
   *
   * @return array
   *   Parameters.
   */
  public function getParams() {
    $return = [];
    if (isset($this->query)) {
      $return['q'] = $this->query;
    }

    if (isset($this->location_search)) {
      $return['l'] = $this->locationSearch;
    }

    if (isset($this->city)) {
      $return['city'] = $this->city;
    }

    if (isset($this->state)) {
      $return['state'] = $this->state;
    }

    if (isset($this->country)) {
      $return['country'] = $this->country;
    }

    if (isset($this->page)) {
      $return['pn'] = $this->page;
    }

    if (isset($this->page_size)) {
      $return['ps'] = $this->pageSize;
    }

    return $return;
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
    $companies = empty($body['response']['employers']) ? [] : $body['response']['employers'];

    $values = $body['response'];
    unset($values['employers']);

    $values['companies'] = $companies;
    $values['locationLongName'] = isset($values['lashedLocation']['locationLongName']) ? isset($values['lashedLocation']['locationLongName']) : NULL;
    $values['locationShortName'] = isset($values['lashedLocation']['locationShortName']) ? isset($values['lashedLocation']['locationShortName']) : NULL;
    $values['locationType'] = isset($values['lashedLocation']['locationType']) ? isset($values['lashedLocation']['locationType']) : NULL;

    $return = new CompanyResponse($values, $response);
    return $return;
  }

}

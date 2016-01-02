<?php

namespace Glassdoor\Action;


use Glassdoor\Error\GlassdoorException;
use Glassdoor\ResponseObject\Company\CompanyResponse;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class Company implements ActionInterface {
  private $query;
  private $location_search;
  private $city;
  private $state;
  private $country;
  private $page = 1;
  private $page_size = 20;


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

  public function filterByState($state) {
    return $this->addParam('state', $state);
  }

  public function filterByCity($city) {
    return $this->addParam('city', $city);
  }

  public function filterByCountry($country) {
    return $this->addParam('country', $country);
  }

  public function searchByLocation($location) {
    return $this->addParam('location_search', $location);
  }

  public function searchByCompanyOrJob($search) {
    return $this->addParam('queyr', $search);
  }

  /**
   * Set a url param.
   *
   * @param $key
   * @param $value
   *
   * @return $this
   *
   * @throws \Glassdoor\Error\GlassdoorException
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
   */
  public static function action() {
    return 'employers';
  }

  /**
   * The URL query parameters
   *
   * @return array
   */
  public function getParams() {
    $return = [];
    if (isset($this->query)) {
      $return['q'] = $this->query;
    }

    if (isset($this->location_search)) {
      $return['l'] = $this->location_search;
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
      $return['ps'] = $this->page_size;
    }

    return $return;
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
   * @param \GuzzleHttp\Psr7\Response $response
   * @return \Glassdoor\ResponseObject\Company\CompanyResponse
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
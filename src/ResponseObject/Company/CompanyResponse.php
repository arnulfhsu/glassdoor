<?php

/**
 * @file
 * Response object from Company endpoint.
 */

namespace Glassdoor\ResponseObject\Company;

use Glassdoor\ResponseObject\ResponseInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;

/**
 * CompanyResponse class.
 */
class CompanyResponse implements ResponseInterface {

  /**
   * Glassdoor attribution url.
   */
  private $attributionURL;

  /**
   * Page number of results.
   */
  private $currentPageNumber;

  /**
   * Number of pages.
   */
  private $totalNumberOfPages;

  /**
   * Number of records retrieved.
   */
  private $totalRecordCount;

  /**
   * Location string.
   */
  private $locationString;

  /**
   * Location id.
   */
  private $locationId;

  /**
   * Short location string.
   */
  private $locationShortName;

  /**
   * Long location string.
   */
  private $locationLongName;

  /**
   * Location type.
   */
  private $locationType;

  /**
   * Array of companies.
   */
  private $companies;

  /**
   * Response object.
   */
  private $response;

  /**
   * Construct method.
   *
   * $values array
   *   Values to populate.
   * $response \GuzzleHttp\Psr7\Response
   *   Response object.
   */
  public function __construct(array $values, Response $response) {
    $this->response = $response;

    $this->attributionURL = empty($values['attributionURL']) ? NULL : new Uri($values['attributionURL']);
    $this->currentPageNumber = empty($values['currentPageNumber']) ? 1 : $values['currentPageNumber'];
    $this->currentPageNumber = empty($values['currentPageNumber']) ? 1 : $values['currentPageNumber'];
    $this->totalNumberOfPages = empty($values['totalNumberOfPages']) ? 1 : $values['totalNumberOfPages'];
    $this->totalRecordCount = empty($values['totalRecordCount']) ? 1 : $values['totalRecordCount'];
    $this->locationString = empty($values['locationString']) ? '' : $values['locationString'];
    $this->locationLongName = empty($values['locationLongName']) ? '' : $values['locationLongName'];
    $this->locationShortName = empty($values['locationShortName']) ? '' : $values['locationShortName'];
    $this->locationType = empty($values['locationType']) ? '' : $values['locationType'];

    $this->companies = [];
    if (!empty($values['companies']) && is_array($values['companies'])) {
      foreach ($values['companies'] as $company) {
        $this->companies[] = new Company($company);
      }
    }
  }

  /**
   * Get Attribution url.
   *
   * @return string
   *   Attribution url.
   */
  public function getAttributionUrl() {
    return $this->attributionURL;
  }

  /**
   * Get Current page number.
   *
   * @return int
   *   Page number.
   */
  public function getCurrentPageNumber() {
    return $this->currentPageNumber;
  }

  /**
   * Get total number of pages.
   *
   * @return int
   *   Pages.
   */
  public function getTotalNumberOfPages() {
    return $this->totalNumberOfPages;
  }

  /**
   * Get total records.
   *
   * @return int
   *   Records.
   */
  public function getTotalRecordCount() {
    return $this->totalRecordCount;
  }

  /**
   * Get location string.
   *
   * @return string
   *   Location.
   */
  public function getLocationString() {
    return $this->locationString;
  }

  /**
   * Get location id.
   *
   * @return int
   *   Location id.
   */
  public function getLocationId() {
    return $this->locationId;
  }

  /**
   * Get short location string.
   *
   * @return string
   *   Short location.
   */
  public function getLocationShortName() {
    return $this->locationShortName;
  }

  /**
   * Get long location string.
   *
   * @return string
   *   Long location.
   */
  public function getLocationLongName() {
    return $this->locationLongName;
  }

  /**
   * Get location type.
   *
   * @return string
   *   Location type.
   */
  public function getLocationType() {
    return $this->locationType;
  }

  /**
   * Companies array.
   *
   * @return array
   *   Companies objects.
   */
  public function getCompanies() {
    return $this->companies;
  }

  /**
   * The Guzzle response.
   *
   * @return Response
   *   Response object.
   */
  public function getResponse() {
    return $this->response;
  }

}

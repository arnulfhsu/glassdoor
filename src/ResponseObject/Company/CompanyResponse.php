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
   * @var Uri
   */
  private $attributionURL;
  /**
   * @var int
   */
  private $currentPageNumber;
  /**
   * @var int
   */
  private $totalNumberOfPages;
  /**
   * @var int
   */
  private $totalRecordCount;
  /**
   * @var string
   */
  private $locationString;
  /**
   * @var int
   */
  private $locationId;
  /**
   * @var string
   */
  private $locationShortName;
  /**
   * @var string
   */
  private $locationLongName;
  /**
   * @var string
   */
  private $locationType;

  /**
   * @var Company[]
   */
  private $companies;
  /**
   * @var Response
   */
  private $response;

  /**
   *
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
   * @return Uri
   */
  public function getAttributionURL() {
    return $this->attributionURL;
  }

  /**
   * @return int
   */
  public function getCurrentPageNumber() {
    return $this->currentPageNumber;
  }

  /**
   * @return int
   */
  public function getTotalNumberOfPages() {
    return $this->totalNumberOfPages;
  }

  /**
   * @return int
   */
  public function getTotalRecordCount() {
    return $this->totalRecordCount;
  }

  /**
   * @return string
   */
  public function getLocationString() {
    return $this->locationString;
  }

  /**
   * @return int
   */
  public function getLocationId() {
    return $this->locationId;
  }

  /**
   * @return string
   */
  public function getLocationShortName() {
    return $this->locationShortName;
  }

  /**
   * @return string
   */
  public function getLocationLongName() {
    return $this->locationLongName;
  }

  /**
   * @return string
   */
  public function getLocationType() {
    return $this->locationType;
  }

  /**
   * @return Company[]
   */
  public function getCompanies() {
    return $this->companies;
  }

  /**
   * The Guzzle response.
   *
   * @return Response
   */
  public function getResponse() {
    return $this->response;
  }

}

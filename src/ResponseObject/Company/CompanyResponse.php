<?php

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\ResponseInterface;
use GuzzleHttp\Psr7\Uri;

class CompanyResponse implements ResponseInterface {
  /**
   * @var Uri
   */
  public $attributionURL;
  /**
   * @var int
   */
  public $currentPageNumber;
  /**
   * @var int
   */
  public $totalNumberOfPages;
  /**
   * @var int
   */
  public $totalRecordCount;
  /**
   * @var string
   */
  public $locationString;
  /**
   * @var int
   */
  public $locationId;
  /**
   * @var string
   */
  public $locationShortName;
  /**
   * @var string
   */
  public $locationLongName;
  /**
   * @var string
   */
  public $locationType;

  /**
   * @var Company[]
   */
  public $companies;

  public function __construct(array $values) {
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
      foreach($values['companies'] as $company) {
        $this->companies[] = new Company($company);
      }
    }
  }
}

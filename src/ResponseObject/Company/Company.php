<?php

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\ResponseInterface;
use GuzzleHttp\Psr7\Uri;

class Company implements ResponseInterface {
  /**
   * @var int
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var Uri
   */
  public $website;
  /**
   * @var boolean
   */
  public $isEEP;
  /**
   * @var boolean
   */
  public $exactMatch;
  /**
   * @var string
   */
  public $industry;
  /**
   * @var int
   */
  public $numberOfRating;
  /**
   * @var Uri
   */
  public $squareLogo;
  /**
   * @var float
   */
  public $overallRatings;
  /**
   * @var float
   */
  public $ratingDescription;
  /**
   * @var float
   */
  public $cultureAndValuesRatings;
  /**
   * @var float
   */
  public $seniorLeadershipRating;
  /**
   * @var float
   */
  public $compensationAndBenefitsRating;
  /**
   * @var float
   */
  public $careerOpportunitiesRating;
  /**
   * @var float
   */
  public $workLifeBalanceRating;
  /**
   * @var float
   */
  public $recommendToFriendRating;
  /**
   * @var \Glassdoor\ResponseObject\Company\Review
   */
  public $featuredReview;
  /**
   * @var Person
   */
  public $ceo;

  public function __construct(array $values) {
    $this->id = empty($values['id']) ? '' : $values['id'];
    $this->name = empty($values['name']) ? '' : $values['name'];
    $this->website = empty($values['website']) ? NULL : new Uri($values['website']);
    $this->squareLogo = empty($values['squareLogo']) ? NULL : new Uri($values['squareLogo']);
    $this->isEEP = empty($values['isEEP']) ? FALSE : (bool) $values['isEEP'];
    $this->exactMatch = empty($values['exactMatch']) ? FALSE : (bool) $values['exactMatch'];
    $this->industry = empty($values['industry']) ? '' : $values['industry'];
    $this->numberOfRating = empty($values['numberOfRating']) ? '' : $values['numberOfRating'];
    $this->overallRatings = empty($values['overallRatings']) ? '' : $values['overallRatings'];
    $this->ratingDescription = empty($values['ratingDescription']) ? '' : $values['ratingDescription'];
    $this->cultureAndValuesRatings = empty($values['cultureAndValuesRatings']) ? '' : $values['cultureAndValuesRatings'];
    $this->seniorLeadershipRating = empty($values['seniorLeadershipRating']) ? '' : $values['seniorLeadershipRating'];
    $this->compensationAndBenefitsRating = empty($values['compensationAndBenefitsRating']) ? '' : $values['compensationAndBenefitsRating'];
    $this->careerOpportunitiesRating = empty($values['careerOpportunitiesRating']) ? '' : $values['careerOpportunitiesRating'];
    $this->workLifeBalanceRating = empty($values['workLifeBalanceRating']) ? '' : $values['workLifeBalanceRating'];
    $this->recommendToFriendRating = empty($values['recommendToFriendRating']) ? '' : $values['recommendToFriendRating'];

    if (!empty($values['featuredReview'])) {
      $this->featuredReview = new Review($values['featuredReview']);
    }

    if (!empty($values['ceo'])) {
      $this->ceo = new Person($values['ceo']);
    }
  }
}

<?php

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\ResponseInterface;
use GuzzleHttp\Psr7\Uri;

class Company {

  /**
   * @var int
   */
  private $id;
  /**
   * @var string
   */
  private $name;
  /**
   * @var Uri
   */
  private $website;
  /**
   * @var boolean
   */
  private $isEEP;
  /**
   * @var boolean
   */
  private $exactMatch;
  /**
   * @var string
   */
  private $industry;
  /**
   * @var int
   */
  private $numberOfRating;
  /**
   * @var Uri
   */
  private $squareLogo;
  /**
   * @var float
   */
  private $overallRatings;
  /**
   * @var float
   */
  private $ratingDescription;
  /**
   * @var float
   */
  private $cultureAndValuesRatings;
  /**
   * @var float
   */
  private $seniorLeadershipRating;
  /**
   * @var float
   */
  private $compensationAndBenefitsRating;
  /**
   * @var float
   */
  private $careerOpportunitiesRating;
  /**
   * @var float
   */
  private $workLifeBalanceRating;
  /**
   * @var float
   */
  private $recommendToFriendRating;
  /**
   * @var \Glassdoor\ResponseObject\Company\Review
   */
  private $featuredReview;
  /**
   * @var Person
   */
  private $ceo;

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

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @return Uri
   */
  public function getWebsite() {
    return $this->website;
  }

  /**
   * @return boolean
   */
  public function isIsEEP() {
    return $this->isEEP;
  }

  /**
   * @return boolean
   */
  public function isExactMatch() {
    return $this->exactMatch;
  }

  /**
   * @return string
   */
  public function getIndustry() {
    return $this->industry;
  }

  /**
   * @return int
   */
  public function getNumberOfRating() {
    return $this->numberOfRating;
  }

  /**
   * @return Uri
   */
  public function getSquareLogo() {
    return $this->squareLogo;
  }

  /**
   * @return float
   */
  public function getOverallRatings() {
    return $this->overallRatings;
  }

  /**
   * @return float
   */
  public function getRatingDescription() {
    return $this->ratingDescription;
  }

  /**
   * @return float
   */
  public function getCultureAndValuesRatings() {
    return $this->cultureAndValuesRatings;
  }

  /**
   * @return float
   */
  public function getSeniorLeadershipRating() {
    return $this->seniorLeadershipRating;
  }

  /**
   * @return float
   */
  public function getCompensationAndBenefitsRating() {
    return $this->compensationAndBenefitsRating;
  }

  /**
   * @return float
   */
  public function getCareerOpportunitiesRating() {
    return $this->careerOpportunitiesRating;
  }

  /**
   * @return float
   */
  public function getWorkLifeBalanceRating() {
    return $this->workLifeBalanceRating;
  }

  /**
   * @return float
   */
  public function getRecommendToFriendRating() {
    return $this->recommendToFriendRating;
  }

  /**
   * @return Review
   */
  public function getFeaturedReview() {
    return $this->featuredReview;
  }

  /**
   * @return Person
   */
  public function getCeo() {
    return $this->ceo;
  }
}

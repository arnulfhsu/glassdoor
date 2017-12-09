<?php

/**
 * @file
 * Company object class.
 */

namespace Glassdoor\ResponseObject\Company;

use GuzzleHttp\Psr7\Uri;

/**
 * Company class.
 */
class Company {

    /**
     * ID.
     *
     * @var int
     */
    private $id;

    /**
     * Company name.
     *
     * @var string
     */
    private $name;

    /**
     * Company website url.
     *
     * @var \GuzzleHttp\Psr7\Uri
     */
    private $website;

    /**
     * Is EEP.
     *
     * @var boolean
     */
    private $isEEP;

    /**
     * Exact match for company.
     *
     * @var boolean
     */
    private $exactMatch;

    /**
     * Industry.
     *
     * @var string
     */
    private $industry;

    /**
     * Number of glassoor ratings.
     *
     * @var int
     */
    private $numberOfRating;

    /**
     * Company logo url.
     *
     * @var \GuzzleHttp\Psr7\Uri
     */
    private $squareLogo;

    /**
     * Company Rating.
     *
     * @var float
     */
    private $overallRatings;

    /**
     * Rating description.
     *
     * @var string
     */
    private $ratingDescription;

    /**
     * Company culture and values rating.
     *
     * @var float
     */
    private $cultureAndValuesRatings;

    /**
     * Company leadership rating.
     *
     * @var float
     */
    private $seniorLeadershipRating;

    /**
     * Compensation rating.
     *
     * @var float
     */
    private $compensationAndBenefitsRating;

    /**
     * Career opportunities rating.
     *
     * @var float
     */
    private $careerOpportunitiesRating;

    /**
     * Work/life balance rating.
     *
     * @var float
     */
    private $workLifeBalanceRating;

    /**
     * Recommend to friend rating.
     *
     * @var float
     */
    private $recommendToFriendRating;

    /**
     * Review objects.
     *
     * @var \Glassdoor\ResponseObject\Company\Review
     */
    private $featuredReview;

    /**
     * CEO.
     *
     * @var \Glassdoor\ResponseObject\Company\Person
     */
    private $ceo;


    private $raw;

    /**
     * Constructor.
     */
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
        $this->cultureAndValuesRatings = empty($values['cultureAndValuesRating']) ? '' : $values['cultureAndValuesRating'];
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

        $this->raw = $values;

    }

    /**
     * ID.
     *
     * @return int
     *   Return attribute.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Name.
     *
     * @return string
     *   Return attribute.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Company url.
     *
     * @return \GuzzleHttp\Psr7\Uri
     *   Return attribute.
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * Company EEP.
     *
     * @return bool
     *   Return attribute.
     */
    public function isIsEep() {
        return $this->isEEP;
    }

    /**
     * Company is exact match.
     *
     * @return bool
     *   Return attribute.
     */
    public function isExactMatch() {
        return $this->exactMatch;
    }

    /**
     * Get industry.
     *
     * @return string
     *   Return attribute.
     */
    public function getIndustry() {
        return $this->industry;
    }

    /**
     * Number of company ratings.
     *
     * @return int
     *   Return attribute.
     */
    public function getNumberOfRating() {
        return $this->numberOfRating;
    }

    /**
     * Company logo url.
     *
     * @return \GuzzleHttp\Psr7\Uri
     *   Return attribute.
     */
    public function getSquareLogo() {
        return $this->squareLogo;
    }

    /**
     * Overall rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getOverallRatings() {
        return $this->overallRatings;
    }

    /**
     * Rating description.
     *
     * @return float
     *   Return attribute.
     */
    public function getRatingDescription() {
        return $this->ratingDescription;
    }

    /**
     * Culture rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getCultureAndValuesRatings() {
        return $this->cultureAndValuesRatings;
    }

    /**
     * Leadership rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getSeniorLeadershipRating() {
        return $this->seniorLeadershipRating;
    }

    /**
     * Compensation rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getCompensationAndBenefitsRating() {
        return $this->compensationAndBenefitsRating;
    }

    /**
     * Opportunities rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getCareerOpportunitiesRating() {
        return $this->careerOpportunitiesRating;
    }

    /**
     * Work/life rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getWorkLifeBalanceRating() {
        return $this->workLifeBalanceRating;
    }

    /**
     * Recommend to friend rating.
     *
     * @return float
     *   Return attribute.
     */
    public function getRecommendToFriendRating() {
        return $this->recommendToFriendRating;
    }

    /**
     * Featured reviews.
     *
     * @return \Glassdoor\ResponseObject\Company\Review
     *   Return attribute.
     */
    public function getFeaturedReview() {
        return $this->featuredReview;
    }

    /**
     * CEO.
     *
     * @return \Glassdoor\ResponseObject\Company\Person
     *   Return attribute.
     */
    public function getCeo() {
        return $this->ceo;
    }


    public function getRaw() {
        return $this->raw;
    }

}

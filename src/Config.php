<?php

/**
 * @file
 * Configuration class for Glassdoor API.
 */

namespace Glassdoor;

use Glassdoor\Error\GlassDoorConfigException;

/**
 * Configuration Class.
 */
final class Config {

  /**
   * Partner ID.
   */
  private $partnerId;

  /**
   * Partner Key.
   */
  private $partnerKey;

  /**
   * Base Url.
   */
  private $baseUrl;

  /**
   * Response - either 'xml' OR 'json'.
   */
  private $responseFormat;

  /**
   * Construct method.
   *
   * @param string $partner_id
   *   Partner id.
   * @param string $partner_key
   *   Partner key.
   * @param string $base_url
   *   Base url.
   * @param string $response_format
   *   Response format desired.
   *
   * @throws \Glassdoor\Error\GlassDoorConfigException
   *   Invalid config.
   */
  public function __construct($partner_id, $partner_key, $base_url = 'http://api.glassdoor.com/api/api.htm', $response_format = 'json') {

    if (empty(trim($partner_id)) || empty(trim($partner_key))) {
      throw new GlassDoorConfigException('Partner Id, key and Base URL are required.');
    }

    if (!filter_var($base_url, FILTER_VALIDATE_URL)) {
      throw new GlassDoorConfigException('Base URL must be a valid URL');
    }

    if (strtolower($response_format) !== 'json' && strtolower($response_format) !== 'xml') {
      throw new GlassDoorConfigException('Response Format must be json or xml.');
    }

    $this->partnerId = $partner_id;
    $this->partnerKey = $partner_key;
    $this->baseUrl = $base_url;
    $this->responseFormat = $response_format;
  }

  /**
   * Get base url.
   *
   * @return string
   *   Base url.
   */
  public function getBaseUrl() {
    return $this->baseUrl;
  }

  /**
   * Get response format.
   *
   * @return string
   *   Format.
   */
  public function getResponseFormat() {
    return $this->responseFormat;
  }

  /**
   * Get partner id.
   *
   * @return string
   *   Partner id.
   */
  public function getPartnerId() {
    return $this->partnerId;
  }

  /**
   * Get partner key.
   *
   * @return string
   *   Partner key.
   */
  public function getPartnerKey() {
    return $this->partnerKey;
  }

}

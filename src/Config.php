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
  private $partner_id;

  /**
   * Partner Key.
   */
  private $partner_key;

  /**
   * Base Url.
   */
  private $base_url;

  /**
   * Response - either 'xml' OR 'json'.
   */
  private $response_format;

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
    if (empty(trim($partner_id)) ||
        empty(trim($partner_key)) ||
        empty(trim($base_url))) {

      throw new GlassDoorConfigException('Partner Id, key and Base URL are required.');
    }

    if (!filter_var($base_url, FILTER_VALIDATE_URL)) {
      throw new GlassDoorConfigException('Base URL must be a valid URL');
    }

    $this->partner_id = $partner_id;
    $this->partner_key = $partner_key;
    $this->base_url = $base_url;

    if (strtolower($response_format) !== 'json' && strtolower($response_format) !== 'xml') {
      throw new GlassDoorConfigException('Response Format must be json or xml.');
    }

    $this->response_format = $response_format;
  }

  /**
   * Get base url.
   *
   * @return string
   *   Base url.
   */
  public function getBaseUrl() {
    return $this->base_url;
  }

  /**
   * Get response format.
   *
   * @return string
   *   Format.
   */
  public function getResponseFormat() {
    return $this->response_format;
  }

  /**
   * Get partner id.
   *
   * @return string
   *   Partner id.
   */
  public function getPartnerId() {
    return $this->partner_id;
  }

  /**
   * Get partner key.
   *
   * @return string
   *   Partner key.
   */
  public function getPartnerKey() {
    return $this->partner_key;
  }

}

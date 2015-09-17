<?php

namespace Glassdoor;
use Glassdoor\Error\GlassDoorConfigException;

/**
 * Configuration Class
 */
final class Config {
  /**
   * @var string
   */
  private $partner_id;
  /**
   * @var string
   */
  private $partner_key;
  /**
   * @var string
   */
  private $base_url;
  /**
   * @var string Either 'xml' OR 'json'
   */
  private $response_format;

  /**
   * @param $partner_id
   * @param $partner_key
   * @param $base_url
   * @param $response_format
   * @throws \Glassdoor\Error\GlassDoorConfigException
   */
  public function __construct($partner_id, $partner_key, $base_url, $response_format) {
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
   * @return string
   */
  public function getBaseUrl() {
    return $this->base_url;
  }

  /**
   * @return string
   */
  public function getResponseFormat() {
    return $this->response_format;
  }

  /**
   * @return string
   */
  public function getPartnerId() {
    return $this->partner_id;
  }

  /**
   * @return string
   */
  public function getPartnerKey() {
    return $this->partner_key;
  }
}
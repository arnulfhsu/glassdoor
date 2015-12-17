<?php

namespace Glassdoor\Tests;

use Glassdoor\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase {

  /**
   * Test Required Variables
   */
  public function testRequired() {
    // all correct
    $partner_id = 123;
    $partner_key = 1234;
    $base_url = 'http://google.com';

    try {
      new Config($partner_id, $partner_key, $base_url, 'json');
    } catch (\Exception $e) {
      $this->fail('Required Config Failed');
    }

    $this->assertTrue(TRUE, 'Required Config');
  }

  /**
   * @expectedException        Glassdoor\Error\GlassDoorConfigException
   * @expectedExceptionMessage Partner Id, key and Base URL are required.
   */
  public function testEmptyString() {
    new Config(' ', 123, 'http://google.com', 'json');
  }

  /**
   * @expectedException        Glassdoor\Error\GlassDoorConfigException
   * @expectedExceptionMessage Partner Id, key and Base URL are required.
   */
  public function testNullString() {
    new Config(NULL, 123, 'http://google.com', 'json');
  }

  /**
   * @expectedException        Glassdoor\Error\GlassDoorConfigException
   * @expectedExceptionMessage Base URL must be a valid URL
   */
  public function testBaseUrl() {
    new Config(213, 123, 'Hi Mom', 'json');
  }

  /**
   * @expectedException        Glassdoor\Error\GlassDoorConfigException
   * @expectedExceptionMessage Response Format must be json or xml.
   */
  public function testFormat() {
    new Config(1234, 123, 'http://google.com', 'hi mom');
  }
}
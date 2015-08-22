<?php

namespace Glassdoor\Tests;

use Glassdoor\Config;
use Glassdoor\Error\GlassDoorConfigException;

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
   * @expectedException        GlassDoorConfigException
   * @expectedExceptionMessage Partner Id, key and Base URL are required.
   */
  public function testEmptyString() {
    new Config(' ', 123, 'http://google.com', 'json');
  }

  /**
   * @expectedException        GlassDoorConfigException
   * @expectedExceptionMessage Partner Id, key and Base URL are required.
   */
  public function testNullString() {
    new Config(NULL, 123, 'http://google.com', 'json');
  }

  /**
   * @expectedException        GlassDoorConfigException
   * @expectedExceptionMessage Base URL must be a valid URL
   */
  public function testBaseUrl() {
    new Config(213, 123, 'Hi Mom', 'json');
  }

  /**
   * @expectedException        GlassDoorConfigException
   * @expectedExceptionMessage Response Format must be json or xml.
   */
  public function testFormat() {
    new Config(NULL, 123, 'http://google.com', 'hi mom');
  }
}
<?php

namespace Glassdoor\Tests\Action;

use Glassdoor\Action\JobProgression;
use Glassdoor\Tests\Fixture\JobProgression as JobProgressionFixture;

class JobProgressionTest extends \PHPUnit_Framework_TestCase {
  public function testParams() {
    $action = new JobProgression();

    $action->addParam('job_title', 'title');
    $action->addParam('country_id', 2);

    $params = $action->getParams();

    $this->assertEquals($params, ['jobTitle' => 'title', 'countryId' => 2]);
  }

  /**
   * @expectedException        Glassdoor\Error\GlassdoorException
   * @expectedExceptionMessage job_title Required for JobProgression Action
   */
  public function testParamTitleError() {
    (new JobProgression())->getParams();
  }

  /**
   * @expectedException        Glassdoor\Error\GlassdoorException
   * @expectedExceptionMessage Job Progression Param can only be job_title or country_id
   */
  public function testInvalidKey() {
    (new JobProgression())->addParam('wrong', 'value');
  }

  public function testBuildResponse() {
    $action = new JobProgression();

    $body = JobProgressionFixture::getResponseBody();

    $response = $action->buildResponse($body, new \GuzzleHttp\Psr7\Response);

    $this->assertInstanceOf('Glassdoor\ResponseObject\JobProgressionResponse', $response, 'Response instance of JobProgressionRespose');
  }
}

<?php

namespace Glassdoor\Tests\Action;

use Glassdoor\Action\Company;

class CompanyTest extends \PHPUnit_Framework_TestCase {
  
    public function setUp()
    {
        $this->company = new Company();
    }

    public function testItCanBuildResponse()
    {
        $body = [
            'response' => null,
        ];
        $response = new \GuzzleHttp\Psr7\Response;

        $result = $this->company->buildResponse($body, $response);

        $this->assertEquals('Glassdoor\ResponseObject\Company\CompanyResponse', get_class($result));
    }

}

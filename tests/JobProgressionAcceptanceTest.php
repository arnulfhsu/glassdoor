<?php

namespace Glassdoor\Tests;

use Glassdoor\Action\JobProgression;
use Glassdoor\Config;
use Glassdoor\Connection;

class JobProgressionAcceptanceTest extends \PHPUnit_Framework_TestCase {
  
    /* 
     * JobProgression Acceptance test 
     * Ensures the API client works end-to-end
     */
    public function testItCanGetJobProgressionFromApiInRealLife()
    {
        // Check for and set required server variables
        if (!isset($_SERVER['PARTNER_ID'])) {
            $this->markTestSkipped('PARTNER_ID is not available');
        }
        if (!isset($_SERVER['PARTNER_KEY'])) {
            $this->markTestSkipped('PARTNER_KEY is not available');
        }
        $_SERVER['REMOTE_ADDR'] = getHostByName(getHostName());
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';

        // Instantiate the connection
        $config = new Config($_SERVER['PARTNER_ID'], $_SERVER['PARTNER_KEY']);
        $connection = new Connection($config);

        $action = new JobProgression;
        $action->addparam('job_title', 'developer');

        // Get the response from the API
        $response = $connection->call($action);
        
        // Assert proper classes/results are returned
        $this->assertEquals('Glassdoor\ResponseObject\JobProgressionResponse', get_class($response));
        foreach ($response->getJobProgressions() as $progression) {
            $this->assertEquals('Glassdoor\ResponseObject\JobProgression', get_class($progression));
            $this->assertNotNull($progression->getJobTitle());
        }
    }

}
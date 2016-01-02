<?php

namespace Glassdoor\Tests;

use Glassdoor\Config;
use Glassdoor\Connection;

class ConnectionTest extends \PHPUnit_Framework_TestCase {
  
    public function testItCanInstantiate()
    {
        $partner_id = 123;
        $partner_key = 1234;
        $base_url = 'http://google.com';
        $config = new Config($partner_id, $partner_key, $base_url, 'json');
        
        // Mocking the config would be better, but this one's marked final
        // $config = $this->getMockBuilder('Glassdoor\Config')->getMock();
        
        $connection = new Connection($config);
    }

}
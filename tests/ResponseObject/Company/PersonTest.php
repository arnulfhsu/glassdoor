<?php

namespace Glassdoor\Tests\ResponseObject\Company;

use Glassdoor\ResponseObject\Company\Person;

class PersonTest extends \PHPUnit_Framework_TestCase {
    
    public function setUp()
    {
        $this->values = [
            'name' => uniqid(),
            'title' => uniqid(),
            'percent_approval' => uniqid(),
            'percent_disapproval' => uniqid(),
            'image' => [
                'src' => uniqid(),
                'height' => uniqid(),
                'width' => uniqid(),
            ],
        ];

        $this->person = new Person($this->values);
    }

    public function testItCanInstantiateWithoutImage()
    {
        $values = $this->values;
        $values['image'] = [];

        $person = new Person($values);
    }

    public function testItGetsPersonName()
    {
        $result = $this->person->getName();
        
        $this->assertEquals($this->values['name'], $result);
    }

    public function testItGetsPersonTitle()
    {
        $result = $this->person->getTitle();
        
        $this->assertEquals($this->values['title'], $result);
    }

    public function testItGetsPersonPercentApproval()
    {
        $result = $this->person->getPercentApproval();
        
        $this->assertEquals($this->values['percent_approval'], $result);
    }

    public function testItGetsPersonPercentDisapproval()
    {
        $result = $this->person->getPercentDisapproval();
        
        $this->assertEquals($this->values['percent_disapproval'], $result);
    }

    public function testItGetsPersonImage()
    {   
        $result = $this->person->getImage();
        
        $this->assertEquals('Glassdoor\ResponseObject\Image', get_class($result));
    }
    
}

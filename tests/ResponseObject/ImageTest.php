<?php

namespace Glassdoor\Tests\ResponseObject;

use Glassdoor\ResponseObject\Image;

class ImageTest extends \PHPUnit_Framework_TestCase {
    
    public function setUp()
    {
        $this->values = [
            'src' => uniqid(),
            'height' => uniqid(),
            'width' => uniqid(),
            'weight' => uniqid(),
        ];

        $this->image = new Image($this->values);
    }

    /**
     * @expectedException \Glassdoor\Error\GlassDoorResponseException
     * @expectedExceptionMessage Image requires src, height and width
     */
    public function testItThrowsErrorWhenInvalidInputValues()
    {
        $values = [];
        $image = new Image($values);
    }

    public function testItGetsImageSrc()
    {
        $result = $this->image->getSrc();
        
        $this->assertEquals($this->values['src'], $result);
    }

    public function testItGetsImageHeight()
    {
        $result = $this->image->getHeight();
        
        $this->assertEquals($this->values['height'], $result);
    }

    public function testItGetsImageWeight()
    {
        $result = $this->image->getWeight();
        
        $this->assertEquals($this->values['weight'], $result);
    }
    
}

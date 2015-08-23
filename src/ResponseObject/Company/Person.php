<?php

namespace Glassdoor\ResponseObject\Company;


use Glassdoor\ResponseObject\Image;
use Glassdoor\ResponseObject\ResponseInterface;

class Person implements ResponseInterface {
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $title;
  /**
   * @var float
   */
  public $percent_approval;
  /**
   * @var float
   */
  public $percent_disapproval;
  /**
   * @var \Glassdoor\ResponseObject\Image
   */
  public $image;

  public function __construct(array $values) {
    $this->name = empty($values['name']) ? '' : $values['name'];
    $this->title = empty($values['title']) ? '' : $values['title'];
    $this->percent_approval = empty($values['percent_approval']) ? '' : $values['percent_approval'];
    $this->percent_disapproval = empty($values['percent_disapproval']) ? '' : $values['percent_disapproval'];

    if (!empty($values['image'])) {
      $this->image = new Image($values['image']);
    }
  }
}

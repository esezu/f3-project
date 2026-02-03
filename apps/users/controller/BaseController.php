<?php
namespace users\controller;

use \Base;

class BaseController
{
    protected $f3;

    public function __construct()
    {
        $this->f3 = Base::instance();
    }
}
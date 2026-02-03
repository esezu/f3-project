<?php
namespace admins\controller;

use \Base;

class BaseController
{
    protected $f3;
    protected $web;
    protected $template;

    public function __construct() {
        $this->f3 = \Base::instance();
        $this->web = \Web::instance();
        $this->template = \Template::instance();
    }

    public function beforeRoute() {
    }

}
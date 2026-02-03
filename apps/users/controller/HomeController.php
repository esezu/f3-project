<?php
namespace users\controller;

class HomeController extends BaseController {
    public function index($f3, $params) {
        $name = $params['name'] ?? 'Guest';
        echo 'Hello, ' . $name . '!';
        // $this->f3->render('users/views/home/index.html');
    }
}
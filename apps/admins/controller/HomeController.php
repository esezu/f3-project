<?php
namespace admins\controller;

class HomeController extends BaseController {
    public function index($f3, $params) {
        $name = $params['name'] ?? 'Guest';
        echo 'Hello, ' . $name . '!';
    }
    public function test($f3, $params) {
        echo '<h1>F3框架测试页面</h1>';
        echo '<p>框架版本: ' . $f3->VERSION . '</p>';
        echo '<p>当前时间: ' . date('Y-m-d H:i:s') . '</p>';
        echo '<p>请求方法: ' . $f3->VERB . '</p>';
        echo '<p>请求URI: ' . $f3->URI . '</p>';
        echo '<hr>';
        echo '<a href="/">返回首页</a>';
    }
    // 测试登录
    public function login($f3, $params) {

        echo $this->template->render('admins/view/login.htm');

    }
    // 测试退出
    public function logout($f3, $params) {
        $this->f3->set('SESSION.admin_logged_in', false);
        $this->f3->reroute('/admins/login');
    }
}
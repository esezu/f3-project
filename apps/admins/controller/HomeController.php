<?php
namespace admins\controller;

class HomeController extends BaseController {
    public function index($f3, $params) {
        $name = $params['name'] ?? 'Guest';
        echo 'Hello, ' . $name . '!';
    }
    public function test($f3, $params) {
        // 把测试页面信息封装到F3变量中，供模板调用
        $f3->set('page_title', 'F3框架测试页面');
        $f3->set('f3_version', $f3->VERSION);
        $f3->set('current_time', date('Y-m-d H:i:s'));
        $f3->set('request_method', $f3->VERB);
        $f3->set('request_uri', $f3->URI);

        // 把测试页面信息封装到F3变量中，供模板调用
        $f3->set('content', 'admins/view/home/demo.htm');

        // 把测试页面渲染到布局中
        echo $this->template->render('admins/view/home/index.htm');
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
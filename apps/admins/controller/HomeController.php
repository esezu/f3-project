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
		// 清除会话数据
		$f3->clear('SESSION');
		// 设置 cookie 已发送标记
		$f3->set('COOKIE.sent',TRUE);

		// 设置登录页面模板
		// $f3->set('inc','login.htm');
        echo $this->template->render('admins/view/home/login.htm');

    }

    // 处理登录表单
    public function auth($f3, $params) {
        // 简化验证：用户名和密码都为 admin
        if ($f3->get('POST.user_id') === 'admin' && $f3->get('POST.password') === 'admin') {
            $f3->clear('COOKIE.sent');
            $f3->clear('SESSION.captcha');
            $f3->set('SESSION.admin_id', 'admin');
            $f3->set('SESSION.lastseen', time());
            $f3->reroute('/admins');
        } else {
            $f3->set('message', '用户名或密码错误');
            $this->login($f3, $params);
        }
    }

    // 终止会话
    public function logout($f3, $params) {  
        // 清除会话数据
        $f3->clear('SESSION');
        // 重定向到登录页面
        $f3->reroute('/admins/login');
    }
}
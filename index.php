<?php
require_once __DIR__ . '/../fatfree-core-master/base.php';
$f3 = \Base::instance();

$view = new Template;

$f3->set('AUTOLOAD','apps/');
$f3->set('UI', 'ui/; apps/');
$f3->set('DEBUG', 3);

// 加载配置文件
$f3->config(__DIR__ . '/config.ini');

$f3->route('GET /code', function($f3) {
    $f3->set('user', [
        'email' => 'test@example.com',
        'website' => 'https://www.baidu.com',
        'age' => 25,
        'username' => 'web_dev_123',
        'phone' => '13812345678',
        'loggedin' => true
    ]);
    $f3->set('fruits', ['apple', 'orange ', ' banana']);
    // echo \Template::instance()->render('default/home.htm');
    // echo $f3->render('default/home.htm');
    $f3->output('default/home.htm');
});

// 管理员路由
$f3->route('GET /admins', 'admins\controller\HomeController->index');
$f3->route('GET /admins/test', 'admins\controller\HomeController->test');
$f3->route('GET /admins/@name', 'admins\controller\HomeController->index');
// 测试登录
$f3->route('GET /admins/login', 'admins\controller\HomeController->login');
// 处理登录表单
$f3->route('POST /admins/auth', 'admins\controller\HomeController->auth');

// 测试退出
$f3->route('GET /admins/logout', 'admins\controller\HomeController->logout');


// 用户路由
$f3->route('GET /users', 'users\controller\HomeController->index');
$f3->route('GET /users/@name', 'users\controller\HomeController->index');

$f3->run();
<?php
require_once __DIR__ . '/../fatfree-core-master/base.php';
$f3 = \Base::instance();


$f3->set('AUTOLOAD','apps/');
$f3->set('UI', 'ui/; apps/');
$f3->set('DEBUG', 3);

// 管理员路由
$f3->route('GET /admins', 'admins\controller\HomeController->index');
$f3->route('GET /admins/test', 'admins\controller\HomeController->test');
$f3->route('GET /admins/@name', 'admins\controller\HomeController->index');
// 测试登录
$f3->route('GET /admins/login', 'admins\controller\HomeController->login');
// 测试退出
$f3->route('GET /admins/logout', 'admins\controller\HomeController->logout');

// 用户路由
$f3->route('GET /users', 'users\controller\HomeController->index');
$f3->route('GET /users/@name', 'users\controller\HomeController->index');

$f3->run();
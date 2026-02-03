<?php
namespace admins\controller;

use \Base;

class BaseController
{
    protected $f3;
    protected $template;

    public function __construct() {
        $this->f3 = Base::instance();
        $this->template = \Template::instance();
    }

    public function beforeRoute() {
        //登录验证
        $current_uri = $this->f3->URI;
        $no_auth_routes = [
            '/admins/login',
            '/admins/logout',
        ];
                // 检查是否需要验证
        if (!in_array($current_uri, $no_auth_routes) && 
            strpos($current_uri, '/admins/') === 0) {
            // 登录验证
            if (!$this->f3->get('SESSION.admin_logged_in')) {
                $this->f3->reroute('/admins/login');
                return false; // 终止后续处理
            }
        }
        return true; // 继续执行
    }

    protected function render($view) {
        $template = strval($this->f3->get('template')) ?: 'default';
        $view = !empty($view) ? basename($view) : 'index';
        $template = !empty($template) ? basename($template) : 'default';
        $this->f3->set('content', $template . '/' . $view);
        echo \Template::instance()->render($template . '/layout.htm');
    }

}
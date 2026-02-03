<?php
namespace admins\controller;

use \Base;

class BaseController
{
    protected $f3;
    protected $template;

    public function __construct() {
        $this->f3 = \Base::instance();
        $this->template = \Template::instance();
    }

	/**
	 * HTTP 路由预处理器
	 * 在每个后台路由处理前执行，用于验证会话和准备管理菜单
	 * @param Base $f3 F3 框架实例
	 */
    public function beforeRoute($f3) {
        // 检查是否在登录或认证路由，跳过验证
        $path = $f3->get('PATH');
        if (strpos($path, '/admins/login') === 0 || strpos($path, '/admins/auth') === 0) {
            return;
        }
        
        // 暂时硬编码配置值
        $admin_id = 'admin';
        $expiry = 24;
        
        // 验证会话有效性：检查用户 ID
        if (!$f3->get('SESSION.admin_id') || $f3->get('SESSION.admin_id') != $admin_id) {
            // 无效会话，重定向到登录页面
            $f3->reroute('/admins/login');
        }
        
        // 检查会话是否过期
        if ($f3->get('SESSION.lastseen') + $expiry * 3600 < time()) {
            // 会话已过期，重定向到退出页面
            $f3->reroute('/admins/logout');
        }
        
        // 更新会话时间戳
        $f3->set('SESSION.lastseen', time());
    }

}
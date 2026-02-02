<?php

require_once __DIR__ . '/../fatfree-core-master/base.php';

$f3 = Base::instance();

$f3->route('GET /',
    function() {
        echo 'Hello, world!';
    }
);

$f3->route('GET /test',
    function() use ($f3) {
        echo '<h1>F3框架测试页面</h1>';
        echo '<p>框架版本: ' . $f3->VERSION . '</p>';
        echo '<p>当前时间: ' . date('Y-m-d H:i:s') . '</p>';
        echo '<p>请求方法: ' . $f3->VERB . '</p>';
        echo '<p>请求URI: ' . $f3->URI . '</p>';
        echo '<hr>';
        echo '<a href="/">返回首页</a>';
    }
);

$f3->route('GET /hello/@name',
    function($f3, $params) {
        echo 'Hello, ' . $params['name'] . '!';
    }
);

$f3->error(404, '页面不存在');

# F3 Framework Test Project

基于Fat-Free Framework (F3) 的测试项目。

## 项目简介

本项目使用Fat-Free Framework构建，用于学习和测试F3框架的各种功能。

## 环境要求

- PHP >= 7.4
- Apache (启用mod_rewrite) 或 Nginx
- MySQL (可选，用于数据库功能)

## 安装步骤

1. 克隆项目到本地
```bash
git clone https://github.com/esezu/f3-project.git
cd f3-project
```

2. 安装依赖
```bash
composer install
```

3. 配置环境
```bash
cp config.ini.example config.ini
```

编辑 `config.ini` 文件，配置数据库连接和其他设置。

4. 确保fatfree-core-master目录与项目在同一级目录

## 项目结构

```
f3-project/
├── index.php              # 入口文件
├── composer.json          # Composer配置
├── .htaccess              # Apache URL重写规则
├── config.ini             # 配置文件（不提交到版本控制）
├── config.ini.example     # 配置文件模板
├── .gitignore             # Git忽略规则
└── README.md              # 项目说明文档
```

## 使用方法

### 启动开发服务器

使用PHP内置服务器：
```bash
php -S localhost:8000
```

### 测试路由

- `/` - 首页，显示 "Hello, world!"
- `/test` - 测试页面，显示框架信息
- `/hello/@name` - 动态路由，如 `/hello/john`

## 配置说明

### config.ini 配置项

```ini
[global]
DEBUG=3              # 调试级别: 0=关闭, 1=错误, 2=警告, 3=全部
UI=ui/              # 模板目录
BASEURL=http://localhost:8000  # 基础URL

[database]
DB_DSN=mysql:host=localhost;port=3306;dbname=f3_project
DB_USER=root
DB_PASS=
```

## 开发指南

### 添加新路由

在 `index.php` 中添加路由：

```php
$f3->route('GET /your-route',
    function() {
        echo 'Your content here';
    }
);
```

### 使用模板

在 `ui/` 目录下创建模板文件，然后在路由中使用：

```php
$f3->route('GET /page',
    function($f3) {
        $f3->set('title', 'Page Title');
        echo View::instance()->render('page.html');
    }
);
```

## 许可证

MIT License

## 作者

esezu

## 链接

- [Fat-Free Framework 官方文档](https://fatfreeframework.com/)
- [GitHub仓库](https://github.com/esezu/f3-project)

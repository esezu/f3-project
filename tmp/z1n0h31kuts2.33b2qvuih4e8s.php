<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登录 - F3 后台</title>
    <style>
        /* 全局样式重置 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Microsoft YaHei", sans-serif;
        }

        /* 页面背景 */
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* 登录框容器 */
        .login-box {
            background-color: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 30px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #ebeef5;
        }

        /* 登录标题 */
        .login-title {
            text-align: center;
            font-size: 22px;
            color: #333333;
            margin-bottom: 25px;
            font-weight: 600;
        }

        /* 表单组样式 */
        .form-group {
            margin-bottom: 20px;
        }

        /* 标签样式 */
        .form-group label {
            display: block;
            font-size: 14px;
            color: #666666;
            margin-bottom: 8px;
        }

        /* 输入框样式 */
        .form-group input {
            width: 100%;
            height: 42px;
            padding: 0 15px;
            border: 1px solid #dcdfe6;
            border-radius: 4px;
            font-size: 14px;
            color: #333333;
            outline: none;
            transition: border-color 0.3s ease;
        }

        /* 输入框聚焦样式 */
        .form-group input:focus {
            border-color: #409eff;
            box-shadow: 0 0 0 2px rgba(64, 158, 255, 0.1);
        }

        /* 登录按钮样式 */
        .login-btn {
            width: 100%;
            height: 44px;
            background-color: #409eff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* 按钮hover样式 */
        .login-btn:hover {
            background-color: #337ecc;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 class="login-title">管理员后台登录</h2>
        <!-- 表单action对应F3的登录处理路由，方法为POST -->
        <form action="/admins/home/doLogin" method="post">
            <div class="form-group">
                <label for="adminid">管理员ID</label>
                <input type="text" id="adminid" name="adminid" placeholder="请输入管理员ID" required>
            </div>
            <div class="form-group">
                <label for="password">登录密码</label>
                <input type="password" id="password" name="password" placeholder="请输入登录密码" required>
            </div>
            <button type="submit" class="login-btn">登录</button>
        </form>
    </div>
</body>
</html>
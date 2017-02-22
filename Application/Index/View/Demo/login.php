<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生产数据加密解密</title>
</head>

<style>
    div {
        width: 1000px;
        height: 1000px;
        line-height: 200px;
        vertical-align: middle;
        text-align:center;
    }

</style>

<body>
<div>
    <form action="<?php echo __ROOT__; ?>Index/Demo/index" method="post">
        <div class="row col-xs-3">
            <input type="text" name="username" class="form-control" placeholder="用户名">
            <input type="password" name="password" class="form-control" placeholder="密码">
            <button class="btn btn-primary" type="commit">登录</button>
        </div>

    </form>
</div>

</body>
</html>

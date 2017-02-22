<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生产数据加密解密</title>
</head>

<body>
<?php if(isset($_SESSION['username'])){
    echo "<h1>您好,{$_SESSION['username']}</h1>","<a href=" . __ROOT__ . 'Index/Demo/quit' . ">点击退出</a>";
} else{
    header("Location: " . __ROOT__ . "Index/Demo/index");
}
?>
<div>
    <form action="<?php echo __ROOT__; ?>Index/Demo/encdata" method="post">
        <div>
            <textarea class="form-control" name="data" rows="3" placeholder="可以输入多行文本"></textarea>
            <div class="radio">
                <label>
                    <input type="radio" name="data_type" value="public"> 数据公开
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="data_type" value="private" checked> 数据不公开(加密)
                </label>
            </div>
            <button class="btn btn-primary" type="commit">数据保存</button>
        </div>
    </form>
</div>

<div>
    <a class="btn btn-info" href="<?php echo __ROOT__; ?>Index/Demo/showdata">查看所有数据</a>
</div>

</body>
</html>
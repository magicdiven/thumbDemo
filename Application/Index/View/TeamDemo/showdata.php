<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生产数据加密解密</title>
</head>

<body>
<?php if(isset($_SESSION['username'])){
    echo "<h1>您好,{$_SESSION['username']}</h1>";
    echo "<a href=".__ROOT__.'Index/TeamDemo/quit'.">点击退出</a>";
}else{
    header("Location: ".__ROOT__."Index/TeamDemo/index");
}
?>
<div>
    <table class="table datatable">
        <thead>
        <tr>
            <th>项目列表</th>
            <th>项目创建人</th>
            <th>公开性</th>
            <th>查看(加密数据仅项目成员可正常查看)</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $_data){ ?>
            <tr>
                <td><?php echo $_data['id']; ?></td>
                <td><?php echo $_data['username']; ?></td>
                <td><?php echo $_data['data_type']; ?></td>
                <td><a class="btn btn-info"
                       href="<?php echo __ROOT__; ?>Index/TeamDemo/decdata?id=<?php echo $_data['id']; ?>">查看</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <a class="btn btn-info" href="<?php echo __ROOT__; ?>Index/TeamDemo/index">修改数据</a>
</div>
</body>
</html>
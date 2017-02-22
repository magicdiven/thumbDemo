<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>生产数据加密解密</title>
</head>

<body>
<?php if(isset($_SESSION['username'])){
    echo "<h1>您好,{$_SESSION['username']}</h1>","<a href=".__ROOT__.'Index/TeamDemo/quit'.">点击退出</a>";
}else{
    header("Location: ".__ROOT__."Index/TeamDemo/index");
}
?>
<div>
    <table class="table datatable">
        <thead>
        <tr>
            <th>项目创建人</th>
            <th>公开性</th>
            <th>项目数据</th>
            <th>创建时间</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $data[0]['username']; ?></td>
            <td><?php echo $data[0]['data_type']; ?></td>
            <td><?php echo $data[0]['data']; ?></td>
            <td><?php echo date('Y-m-d H:i:s',$data[0]['add_time']); ?></td>
        </tr>
        </tbody>
    </table>
    <a class="btn btn-info" href="<?php echo __ROOT__; ?>Index/TeamDemo/index">修改数据</a>

</div>
</body>
</html>
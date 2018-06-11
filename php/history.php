<?php
error_reporting(0);
header("content-Type: text/html; charset=utf-8");
session_start();
?>

<script>
var id=<?php echo $_SESSION['id']; ?>
</script>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/easyui/bootstrap/easyui.css">
        <link rel="stylesheet" href="../css/easyui/icon.css">
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../css/easyui/jquery.easyui.min.js"></script>
        <script src="../css/easyui/easyui-lang-zh_CN.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/userlogin.css">
        <title>购物记录</title>
    </head>

<body>
<div class="page-header">
            <h1>反馈页面<small>感谢您的惠顾。</small></h1>
        </div>
        <div class="content">
            <div class="aside">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="login.php">信息</a></li>
                    <li role="presentation"><a href="orderproduct.php">订货</a></li>
                    <li role="presentation" class="active"><a href="history.php">购货记录</a></li>
                    <li role="presentation"><a href="assess.php">评价</a></li>
                </ul>
            </div>
        <div class="list">
        <table id="dg"></table>
            <script>
                $('#dg').datagrid({
                    url:'getsomehis.php?id='+id,
                    height: 500,
                    columns:[[
		                {field:'name',title:'商品名称',width:'20%'},
		                {field:'size',title:'规格',width:'20%'},
		                {field:'amount',title:'数量',width:'20%'},
		                {field:'date',title:'日期',width:'20%'}
                    ]]
                });
            </script>
        </div>
    </div>
</body>

</html>
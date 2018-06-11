<?php
error_reporting(0);
header("content-Type: text/html; charset=utf-8");
session_start();
?>

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
        <title>订购货物</title>
    </head>

    <body>
        <div class="page-header">
            <h1>反馈页面<small>感谢您的惠顾。</small></h1>
        </div>
        <div class="content">
            <div class="aside">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="login.php">信息</a></li>
                    <li role="presentation" class="active"><a href="orderproduct.php">订货</a></li>
                    <li role="presentation"><a href="history.php">购货记录</a></li>
                    <li role="presentation"><a href="#">评价</a></li>
                </ul>
            </div>
            <div class="list">
                <form>
                    <div class="formitem">
                        产品名称：<input id="proname" name="proname">
                    </div>
                    <div class="formitem">
                        规格：<input id="size" name="size">
                    </div>
                    <div class="formitem">
                        购买数量：<input id="amount" name="amount">
                    </div>
                    <div class="formitem">
                        需求日期：<input id="date" type="text" class="easyui-datebox">
                    </div>
                    <div id="subm" class="btn btn-default">提交</div>
                    <script>
                        $('#proname').combobox({
                            url: 'getproduct.php',
                            valueField: 'id',
                            textField: 'name'
                        });

                        function createxhrandsend() {
                            id = null;
                            comid = <?php echo $_SESSION['id']; ?>;
                            prosize = size.value;
                            proid = proname.value;
                            prosize = size.value;
                            proamount = amount.value;
                            price = 0;
                            prodate = $('#date').datebox('getValue');
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // console.log(xhr.response);
                                    // alert(xhr.response);
                                    if (xhr.response == "success") {
                                        $.messager.alert('提示', '订单提交成功！');
                                    } else {
                                        $.messager.alert('提示', '订单提交失败！');
                                    }
                                }
                            }
                            xhr.open("GET", "insert.php?" + `comid=
                            ${comid}&proid=${proid}&prosize=${prosize}&proamount=${proamount}&prodate=${prodate}`, true);
                            toout = `comid=${comid}&proid=${proid}&prosize=${prosize}&proamount=${proamount}&prodate=${prodate}`;
                            xhr.send();
                        }
                        // var toout;
                        subm.addEventListener("click", createxhrandsend, false);
                    </script>
                </form>
            </div>
        </div>

    </body>

    </html>
<?php
error_reporting(0);
header("content-Type: text/html; charset=utf-8");
session_start();
?>

    <script>
        var id = <?php echo $_SESSION['id']; ?>
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
        <link rel="stylesheet" href="../css/index.css">
        <title>评价</title>
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
                    <li role="presentation"><a href="history.php">购货记录</a></li>
                    <li role="presentation" class="active"><a href="assess.php">评价</a></li>
                </ul>
            </div>
            <div class="list">
                <div class="formitem">
                    <form action="">
                        <h3>用户反馈</h3>
                        <div class="inputitem">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <select id="cc" class="easyui-combobox" name="dept" style="width:100px;">
                                        <option value="1" selected>好评</option>
                                        <option value="0">差评</option>
                                    </select>
                                </div>
                                <input type="text" id="assess" class="form-control" placeholder="评论" aria-describedby="basic-addon1">
                            </div>
                        </div>
                    <div id="subm" class="btn btn-default">提交</div>
                        
                    </form>
                    <script>
                    function createxhrandsend() {
                            var grade = $('#cc').combobox('getValue');
                            var xhr = new XMLHttpRequest();
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // console.log(xhr.response);
                                    // alert(xhr.response);
                                    if (xhr.response == "success") {
                                        $.messager.alert('提示', '评价提交成功！');
                                    } else {
                                        $.messager.alert('提示', '评价提交失败！');
                                    }
                                }
                            }
                            xhr.open("GET", `addassess.php?grade=${grade}&assess=${assess.value||""}&id=${id}`, true);
                            xhr.send();
                        }
                        // var toout;
                        subm.addEventListener("click", createxhrandsend, false);
                    </script>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
error_reporting(0);
header("content-Type: text/html; charset=utf-8");
session_start();

$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$company = $_REQUEST['company'];

$server = "localhost";
$dbname = "company";
$username = "root";
$password = "";


    try {
        $link = new PDO("mysql:host=$server;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo '数据库连接失败';
        exit;
    }

    try {
        $stmt = $link->prepare("SELECT * FROM customer WHERE name=? AND phone=? AND company=?");
        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $phone);
        $stmt->bindValue(3, $company);
        $stmt->execute();
        $rowcount = 0;
        $id = 0;
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            if($rowcount == 0){
                $id = $row->id;
                $_SESSION['id']=$row->id;
                $_SESSION['name']=$row->name;
                $_SESSION['phone']=$row->phone;
                $_SESSION['company']=$row->company;
                $_SESSION['grade'] = $row->grade;
            }
            $rowcount++;
        }
        // echo $_SESSION['grade'] || 2;
        // $row = $stmt->fetch(PDO::FETCH_OBJ);
        // echo $row['id'];
        // $rows = count($stmt->fetchAll(PDO::FETCH_ASSOC));
        // echo 1;
        if ($rowcount == 0) {
            echo "请重新登陆。";
            echo "<script>";
            echo "setTimeout(function(){window.location.href='../login.html'},5000)";
            echo "</script>";
            exit;
        }
        if($_SESSION['grade']==1){
            echo "欢迎管理员登陆。";
            echo "<script>";
            echo "setTimeout(function(){window.location.href='../admin.html'},5000)";
            echo "</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "请重新登陆。";
        echo "<script>";
        echo "setTimeout(function(){window.location.href='../login.html'},5000)";
        echo "</script>";
        exit;
    }


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
        <title>Document</title>
    </head>

    <body>
        <div class="page-header">
            <h1>反馈页面<small>感谢您的惠顾。</small></h1>
        </div>
        <div class="content">
            <div class="aside">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="active"><a href="#">信息</a></li>
                    <li role="presentation"><a href="orderproduct.php">订货</a></li>
                    <li role="presentation"><a href="history.php">购货记录</a></li>
                    <li role="presentation"><a href="assess.php">评价</a></li>
                </ul>
            </div>
            <div class="list">
                <div class="formitem">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">联系人：</span>
                        <input type="text" value="<?php echo $_SESSION['name']; ?>" class="form-control" placeholder="联系人" id="name" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="formitem">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">联系方式：</span>
                        <input type="text" value="<?php echo $_SESSION['phone']; ?>" value="<?php echo $name; ?>" class="form-control" id="phone" placeholder="联系方式" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="formitem">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">公司名称：</span>
                        <input type="text" value="<?php echo $_SESSION['company']; ?>" value="<?php echo $name; ?>" class="form-control" id="company" placeholder="公司名称" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="formitem">
                    <button id="submit" class="btn btn-default">更改信息</button>
                    <script>
                            var xhr = new XMLHttpRequest();
                            var username = document.querySelector('#name');
                            var phone = document.querySelector('#phone');
                            var company = document.querySelector('#company');
                            var id = <?php echo $_SESSION['id'];?>;
                        var subm = document.querySelector("#submit");
                        subm.addEventListener("click", function() {
                            xhr.onreadystatechange = function() {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    // console.log(xhr.response);
                                    if(xhr.response == "success"){
                                        $.messager.alert('提示','修改成功！');
                                        window.location.reload();
                                    } else {
                                        $.messager.alert('提示','修改失败！');
                                    }
                                }
                            }
                            xhr.open("GET", "update.php?"+`name=${username.value}&phone=${phone.value}&company=${company.value}&table=costumer&id=${id}`, true);
                            xhr.send();
                            
                        }, false);
                    </script>
                </div>
            </div>
        </div>

    </body>

    </html>
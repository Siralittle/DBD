<?php
    error_reporting(0);
    header("content-Type: text/html; charset=utf-8");

    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $company = $_REQUEST['company'];

    $server="localhost";
    $dbname="company";
    $username="root";
    $password="";

    try{
        $link = new PDO("mysql:host=$server;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo '数据库连接失败';
        exit;
    }

    try{
        $stmt=$link->prepare("INSERT INTO customer(name,phone,company) VALUES (?,?,?)");
    $stmt->bindValue(1,$name);
    $stmt->bindValue(2,$phone);
    $stmt->bindValue(3,$company);
    $stmt->execute();
        echo "注册成功！5秒后跳转登录。";
    } catch(PDOException $e){
        echo "注册失败，请联系管理员。";
    }

    echo "<script>";
    echo "setTimeout(function(){window.location.href='../login.html'},5000)";
    echo "</script>"
?>
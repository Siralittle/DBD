<?php
    // error_reporting(0);
    header("content-Type: text/html; charset=utf-8");
    @$isshow = 1-intval($_REQUEST['state']);
    @$id = $_REQUEST['key'];
    $server = "localhost";
    $dbname = "company";
    $username = "root";
    $password = "";
    try{
        $link = new PDO("mysql:host=$server;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo '数据库连接失败';
        exit;
    }
    try{
        $stmt=$link->prepare("UPDATE feedback SET isshow=? where id=?");
        // $stmt->bingValue(1,$table);
        $stmt->bindValue(1,$isshow);
        $stmt->bindValue(2,$id);
        $stmt->execute();
        echo "success";
    } catch(PDOException $e){
        echo "failed";
    }
    
?>
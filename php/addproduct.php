<?php
    error_reporting(0);
    header("content-Type: text/html; charset=utf-8");

    @$proname = $_GET["proname"];
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
    //insert.php?grade=1&assess=123
    // $arr = array();
    // $page = intval($page);
    try{
        $stmt=$link->prepare("INSERT INTO product VALUES (null,?)");
        $stmt->bindValue(1,$proname);
        $stmt->execute();
        echo "success";
    } catch (PDOException $e){
        echo "failed";
    }
?>
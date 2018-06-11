<?php
    error_reporting(0);
    header("content-Type: text/html; charset=utf-8");

    @$comid = $_GET["comid"];
    @$proid = $_GET['proid'];
    @$size = $_GET['prosize'];
    @$amount = $_GET['proamount'];
    @$date = $_GET['prodate'];
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
    // $arr = array();
    // $page = intval($page);
    try{
        $stmt=$link->prepare("INSERT INTO history VALUES (null,?,?,?,?,0,?)");
        $stmt->bindValue(1,$comid);
        $stmt->bindValue(2,$proid);
        $stmt->bindValue(3,$size);
        $stmt->bindValue(4,$amount);
        $stmt->bindValue(5,$date);
        $stmt->execute();
        echo "success";
    } catch (PDOException $e){
        echo "failed";
    }
?>
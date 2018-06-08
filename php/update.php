<?php
    // error_reporting(0);
    header("content-Type: text/html; charset=utf-8");
    $table = $_REQUEST['table'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $company = $_REQUEST['company'];
    $id = $_REQUEST['id'];
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
        $stmt=$link->prepare("UPDATE customer SET name=? , phone=?, company=? where id=?");
        // $stmt->bingValue(1,$table);
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$phone);
        $stmt->bindValue(3,$company);
        $stmt->bindValue(4,$id);
        $stmt->execute();
        echo "success";
    } catch(PDOException $e){
        echo "failed";
    }
    
?>
<?php
    header("content-Type: text/html; charset=utf-8");

    $server="localhost";
    $dbname="company";
    $username="root";
    $password="";

    $user = "super";
    $pwd = "123456";

    try{
        $link = new PDO("mysql:host=$server;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo '数据库连接失败';
        exit;
    }
    
    $arr = array();
    $stmt=$link->prepare('SELECT content FROM feedback LIMIT 0,10');
    $stmt->bindValue(1,$user);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        array_push($arr,$row);
    }
    
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
?>
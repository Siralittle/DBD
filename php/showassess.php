<?php
    error_reporting(0);
    header("content-Type: text/html; charset=utf-8");

    // @$comid = $_GET["id"];
    // @$grade = $_GET['grade'];
    // @$assess = $_GET['assess'];
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
        $stmt=$link->prepare("SELECT feedback.id,customer.company,content,feedback.grade,isshow FROM feedback,customer WHERE feedback.comid=customer.id");
        $stmt->execute();
        $arr = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($arr,$row);
        }
        // print_r($arr);
        echo json_encode($arr,JSON_UNESCAPED_UNICODE);
        // echo "success";
    } catch (PDOException $e){
        // echo "failed";
    }
?>
<?php
    $username = "super";
    $password = "123456";
    try{
        $link = new PDO('mysql:host=localhost;dbname=company', "root", "");
        echo "Success";
    } catch(PDOException $e){
        echo '数据库连接失败';
        exit;
    }
    // $Stmt = $link->prepare("select * from user where user = ?");
    // $Stmt -> bindParam(1, $username);
    // $Stmt -> execute();
    // if(){
    //     echo "success.";
    //}
?>
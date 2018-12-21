<?php
    $tenmaychu='localhost';
    $tentaikhoan='root';
    $pass='';
    $csdl='web_01';

    $conn = mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl); 
    //$conn = new mysqli($tenmaychu,$tentaikhoan,$pass,$csdl);

    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
        exit();
    }

?>
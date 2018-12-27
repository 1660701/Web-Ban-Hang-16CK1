<?php
    $tenmaychu='localhost';
    $tentaikhoan='root';
    $pass='';
    $csdl='web_1';
    //Kết nối vào CSDL và lưu lại kết nối này dưới dạng 1 biến để sử dụng sau này
    $conn = mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl); 

    if (!$conn->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
        exit();
    }

?>
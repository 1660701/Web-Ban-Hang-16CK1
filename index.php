<?php

    $connection = mysqli_connect('localhost','root','','doanweb');

    $strSQL = "SELECT * FROM nhasanxuat";
    $result = mysqli_query($connection,$strSQL);

    // while($row = mysqli_fetch_array($result)){
    //     for($i=0;$i<my_fetch_array();$i++){
    //         echo $row[$i] . " ";
    //     }
    // }

    while ($row = mysqli_fetch_assoc($result)){
        var_dump($row.);
    }

    mysqli_close($connection);
?>

<a ></a>


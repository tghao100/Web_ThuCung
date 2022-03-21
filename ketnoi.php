<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'web_banthucung');
    if($conn){
        mysqli_query($conn, "SET NAMES 'UTF8'");
    }else{
        echo 'Ket noi that bai';
    }
?>
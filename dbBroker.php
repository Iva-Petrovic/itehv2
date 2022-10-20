<?php
#default vrednosti za konekciju:
    $host="localhost";
    $db="kolokvijumi";
    $user="root";
    $pass="";

    $conn = new mysqli($host, $user, $pass, $db);

    #u slucaju greske
    if($conn->connect_errno){
        exit("Neuspecna konekcija: $conn->connect_error; kod: $conn->connect_errno");
    }
?>
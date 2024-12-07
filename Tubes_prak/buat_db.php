<?php

$conn = mysqli_connect("localhost", "root", "");
if(!$conn){
    die("gagal connect".mysqli_connect_error());
}

$sql_tubes = "CREATE DATABASE IF NOT EXISTS Tubes_prak";

if(mysqli_query($conn, $sql_tubes)){
    echo"Database Berhasil Dibuat";
}else{
    echo"Database tidak berhasil dibuat(error)".mysqli_error($conn);
}

mysqli_select_db($conn,"Tubes_prak");

$sql_create_table = "CREATE TABLE Registrasi(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
    )";

if(mysqli_query($conn, $sql_create_table)){
    echo"anda Berhasil Membuat table registrasi";
}else{
    echo"gagal membuat table".mysqli_error($conn);
}
mysqli_close($conn);
?>
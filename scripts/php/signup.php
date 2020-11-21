<?php

include_once "exists.php";
/*
@usrnm: regisztrálandó felhasználónév (unique, TODO: check in reg.php)
@email: regisztrálandó email (unique TODO: check in reg.php)
*/

function SaveToDB($usrnm,$email,$pwd,$brth){
    $servername = "localhost";
    $username = "root";
    $server_password = "";
    $database = "projekt";
    $connection = new mysqli($servername,$username,$server_password,$database);

    if(!$connection){
        header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
    }
    $final_birth = new DateTime($brth);
    $fin = $final_birth->format('Y-m-d');
    $sql_msg = "INSERT INTO users (username,email,pwd,birth) VALUES ('$usrnm','$email','$pwd','$fin')"; 

    if(mysqli_query($connection,$sql_msg)){
        #echo "Regisztrálva!";
        unset($_POST);
        header("Location: /succes_reg.php?srnm=$username");
    }else{
        unset($_POST);
        #TODO: itt felhasználni az exists.php-t úgy hogy mi létezik már, ha csak egy akk azt írni, ha mindkettő akk azt
        header("Location: /errorpage.php?hiba=Már létezik a felhasználóneve/jelszava");
    }
    mysqli_close($connection);
    
}
?>
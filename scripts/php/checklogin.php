<?php

function valid_login($usrnm,$pwd){
    
    $servername = "localhost";
    $username = "root";
    $server_password = "";
    $database = "projekt";
    $connection = new mysqli($servername,$username,$server_password,$database);


    if(!$connection){
        header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
    }

    $hashed_pwd = password_hash($pwd,PASSWORD_DEFAULT);

    $query = "SELECT * FROM users WHERE  username='$usrnm' OR email='$usrnm'  AND pwd='$hashed_pwd';";

    return mysqli_num_rows(mysqli_query($connection,$query)) >0;

}


?>
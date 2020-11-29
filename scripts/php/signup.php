<?php

include_once "exists.php";
/*
@usrnm: regisztrálandó felhasználónév 
@email: regisztrálandó email 
@pwd: jelszó
@brth: felhasználó születési éve (ha a mai dátum akkor 0000-00-00 lesz az adatbázisban)
@gender: regisztráló neme
*/

function SaveToDB($usrnm,$email,$pwd,$brth,$gender){
    $servername = "localhost";
    $username = "root";
    $server_password = "";
    $database = "projekt";
    $connection = new mysqli($servername,$username,$server_password,$database);
    if(!$connection){
        header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
    }

    if(mysqli_fetch_row($connection->query("SELECT EXISTS(SELECT * FROM users WHERE username='$usrnm' OR email='$email')"))[0]){
        header("Location:   /errorpage.php?hiba=A felhasználónév vagy email cím már regisztrálva van!");
    }
    $final_birth = new DateTime($brth);
    $fin = $final_birth->format('Y-m-d');
    if($fin == date_format(new DateTime('now',),'Y-m-d')){
        $fin = null;
    }
    //if($fin==new DateTime())
    $sql_msg = "INSERT INTO users (username,email,pwd,birth,gender) VALUES ('$usrnm','$email','$pwd','$fin','$gender')"; 

    if(mysqli_query($connection,$sql_msg)){
        #echo "Regisztrálva!";
        unset($_POST);
        header("Location: /succes_reg.php?srnm=$usrnm");
        session_start();
        session_name($usrnm);
        session_id($usrnm);
        //$_COOKIE['logged_in'] = true;
        setcookie('logged_in','true');
        $user_id =  mysqli_fetch_array(mysqli_query($connection,'SELECT user_id FROM users WHERE username="$usrnm"'));
        setcookie('user_id',$user_id[0]);
        setcookie('username',$usrnm);
        //echo "<script>Sikeres bejelentkezés</script>";
        $asd= $_POST['usrnm_to_login'];
    }else{
        unset($_POST);
        setcookie('logged_in','false');
        setcookie('username','');

    mysqli_close($connection);
    }
}


?>
<?php

/* 
if((!isset($_GET['id']))  || (!isset($_COOKIE['username'])) || ($_GET['id'] == "")){
    header("Location: /errorpage.php?hiba=Nincs megadva meghívó ID");
}

$servername = "localhost";
    $username = "root";
    $server_password = "";
    $database = "projekt";
    $connection = new mysqli($servername,$username,$server_password,$database);

    if(!$connection){
        header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
    }
    $inv_id = $_GET['id'];
    $query = "SELECT EXISTS(SELECT * FROM invites WHERE invite_id='$inv_id' AND user_id IS NULL)";
    if($connection->query($query)){
        $srnm = $_COOKIE['username'];
        $user_id = mysqli_fetch_assoc( mysqli_query($connection,"SELECT user_id FROM users WHERE users.username='$srnm' LIMIT 1"));
        $user_id = $user_id['user_id'];

        $query = "SELECT EXISTS(SELECT * FROM invites WHERE user_id=$user_id AND poll_id=(SELECT poll_id FROM invites WHERE invite_id='$inv_id' ))";

        if(!$connection->query($query)){
            $query= "UPDATE invites SET user_id='$user_id' WHERE invite_id='$inv_id'";
            if($connection->query($query)){
                $query = "SELECT poll_id FROM invites WHERE invite_id='$inv_id'";
                $res = mysqli_fetch_assoc(mysqli_query($connection,$query));
                header("Location: vote.php?id=".$res['poll_id']);
            }
        }else{
            header("Location: /errorpage.php?hiba=Sajnos ezt a meghívót már felhasználták!");
        }

        
    }else{
        
        header("Location: /errorpage.php?hiba=Sajnos ezt a meghívót már felhasználták! " . $connection->error);
    }

    $connection->close(); */
?> 
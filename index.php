<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/global.css" rel="stylesheet">
    <title>Szavazós</title>
</head>
<body>
    <?php
    if(isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == 'true'){
        echo  "WELCOME ".$_COOKIE['username'];
        echo "<br><a href='reg.php'>Kilépni itt tudsz</a>";
        echo "<br><a href='create_poll.php'>Szavazás létrehozása</a>";
    }else{
        echo "<h1>Hello Idegen!</h1>";
        echo "<a href='reg.php'> Regisztrálj vagy lépj be!</a>"; 
        //header("Location: /reg.php");
    }
    ?>

    

    <?php
     $servername = "localhost";
     $username = "root";
     $server_password = "";
     $database = "projekt";
     $connection = new mysqli($servername,$username,$server_password,$database);
 
 
     if(!$connection){
         header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
     }

    $srnm =""; 
    $user_id = "" ; 
    if(isset($_COOKIE['username'])){
        $srnm = $_COOKIE['username'];
        $user_id = mysqli_fetch_assoc( mysqli_query($connection,"SELECT user_id FROM users WHERE users.username='$srnm' LIMIT 1"));
        $user_id=$user_id['user_id']; 

    }
    echo "<h2>Aktív szavazások: </h2>";
    $query = "SELECT * FROM polls ";

    $res = mysqli_query($connection,$query);
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            $poll_id = $row['poll_id'];
            $name = $row['poll_name'];
            echo "<div><a style='background-color:green; border-radius:10px'href='vote.php?id=$poll_id'>$name</a></div>";
                       
            echo "<div><a style='background-color:red; border-radius:10px'href='stats.php?id=$poll_id'>Hozzá tartozó statisztika</a></div>";
            
            echo "<br>";

        }
    }
    
    
   /*  $query = "SELECT polls.poll_id, polls.poll_name ,nr AS (SELECT COUNT(SELECT * FROM invites WHERE invites.poll_id=polls.poll_id)) FROM polls WHERE public='1' AND creator_id='$user_id'";

    $res = mysqli_query($connection,$query);
    if(mysqli_num_rows($res)>0){
        echo "<h1>Meghívás alapú szavazásaid: </h1>";
        while($row = mysqli_fetch_assoc($res)){
            echo "<a style='background-color:green; border-radius:10px'href='vote.php?id=" . $row['poll_id']. "'> ". $row['poll_name'] ."</a>";
            echo "<a style='background-color:red; border-radius:10px'href='stats.php?id=" . $row['poll_id']. "'>  Hozzá tartozó statisztika</a>";
            $id=$row['poll_id'];
            $query = "SELECT invite_id FROM invites WHERE user_id IS NULL AND poll_id='$id'";
            $invs = mysqli_query($connection,$query);
            if(mysqli_num_rows($invs)>0){
                echo "<h2>Meghívók: </h2><br>";
                while($asd = mysqli_fetch_assoc($invs)){
                    echo "<div>localhost/scripts/php/inv.php?id=".$asd['invite_id'] . "</div><br>";
                }
            }else{
                echo "<br><div>Nincsenek felhasználatlan meghívóid</div>";
            }
            echo "<a href='scripts/php/generate_inv.php?id=$id'>Meghívó generálása</a> <br>";
            echo "<br>";
        }
    }else{

    } */

    if(isset($_COOKIE['username'])){
    

    $query = "SELECT COUNT(poll_name) FROM polls WHERE creator_id='$user_id'";

    $count  = mysqli_fetch_array(mysqli_query($connection,$query));

    echo "<p>Ön eddig $count[0] szavazot készített</p>";
    
    
    $query  = "SELECT poll_id , poll_name FROM polls  WHERE creator_id='$user_id'";
    
    $res = mysqli_query($connection,$query);

    if(mysqli_num_rows($res)>0){
        echo "<h3>Az ön szavazásai: </h3><br>";

        while($row=mysqli_fetch_assoc($res)){
            echo "<p>Szavazás id-je: ". $row['poll_id']  . " Szavazás neve: ". $row['poll_name'] . "</p>";
        }
    }

    }

    

    mysqli_close($connection);


    ?>
</body>
</html>
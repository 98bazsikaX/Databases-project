<!-- <!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/global.css" rel="stylesheet">
<?php
/* $name='meghívó generálása';
    if(isset($_GET['id']) && isset($_COOKIE['username']) && ($_GET['id'] != "")){
        $servername = "localhost";
        $username = "root";
        $server_password = "";
        $database = "projekt";
        $connection = new mysqli($servername,$username,$server_password,$database);

        
        if(!$connection){
            header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
        }
        $poll_id = $_GET['id'];
        $srnm = $_COOKIE['username'];
        $query = "SELECT poll_name FROM polls,users WHERE poll_id='$poll_id' AND users.username='$srnm'";

        $name = mysqli_query($connection,$query);
        if(!$name){
            //header("Location: /errorpage.php?hiba=hibás id lol");
            echo mysqli_error($connection);
        }
        $nameasd= mysqli_fetch_array($name);
        echo "<title>$nameasd[0] meghívó generálás</title>";       
    }else{
        header("Location: /errorpage.php?hiba=hogy jutottál el idáig? lol");
    } */
    ?>

    <title>Document</title>
</head>
<body>


<?php

/* $servername = "localhost";
$username = "root";
$server_password = "";
$database = "projekt";
$connection = new mysqli($servername,$username,$server_password,$database);
if(!$connection){
    header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
}
$poll_id = $_GET['id'];

$sqlmsg = "INSERT INTO invites(poll_id,user_id) VALUES('$poll_id',NULL)";
echo "itt vagyok lol";
if($connection->query($sqlmsg)){
    echo "Az ön meghívó linkje amit kimásolhat és elküldhet másnak:  localhost/scripts/php/inv.php?id=".$connection->insert_id;
}else{
    echo "<br>". mysqli_error($connection);
} */
?>

    
</body>
</html> -->
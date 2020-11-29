<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/global.css" rel="stylesheet">
<?php
$name='statisztika';
    if(isset($_GET['id']) && isset($_COOKIE['username'])){
        //echo $_GET['id'];
        $servername = "localhost";
        $username = "root";
        $server_password = "";
        $database = "projekt";
        $connection = new mysqli($servername,$username,$server_password,$database);

        
        if(!$connection){
            header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
        }
        //$poll_id = $_GET['id'];
        $srnm = $_COOKIE['username'];
        $query = "SELECT poll_name FROM polls,users WHERE poll_id='".$_GET['id']."' AND users.username='$srnm'";

        $name = mysqli_fetch_array(mysqli_query($connection,$query));
        if(!$name){
            header("Location: /errorpage.php?hiba=hibás id lol");
        }

        echo "<title>$name[0] statisztikája</title>";



        
    }else{
        header("Location: /errorpage.php?hiba=hogy jutottál el idáig? lol");
    }
    ?>

</head>
<body>
 <br>   TODO: IMPLEMENTÁLNNI A FONTOS FUNCKIÓKAT!
</body>
</html>
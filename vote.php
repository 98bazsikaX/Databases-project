<!DOCTYPE html>
<html lang="en">
<head>
<?php
    if(isset($_GET['id']) && isset($_COOKIE['username'])){
        echo $_GET['id'];
        $servername = "localhost";
        $username = "root";
        $server_password = "";
        $database = "projekt";
        $connection = new mysqli($servername,$username,$server_password,$database);

        
        if(!$connection){
            header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
        }
        //$poll_id = $_GET['id'];
        $query = "SELECT poll_name FROM polls WHERE poll_id='".$_GET['id']."'";

        $name = mysqli_fetch_array(mysqli_query($connection,$query));
        if(!$name){
            header("Location: /errorpage.php?hiba=hibás id lol");
        }
        $vote_id = $_GET['id'];
        $srnm = $_COOKIE['username'];
        $exists = "SELECT EXISTS(SELECT * FROM votes INNER JOIN options ON votes.option_id = options.option_id INNER JOIN users ON users.user_id=votes.user_id WHERE options.poll_id='$vote_id' AND users.username='$srnm')";

        if( mysqli_fetch_row($connection->query($exists))[0] ){
            header("Location: /errorpage.php?hiba=Ön már szavazott");
        }
        echo "<title>$name[0]</title>";



        
    }else{
        header("Location: /errorpage.php?hiba=hogy jutottál el idáig? lol");
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style/global.css" rel="stylesheet">
    <!-- <title></title> -->
</head>
<body>

<div id="votediv">

<form action="vote.php" id="vote" method="post" enctype="multipart/form-data">

<label for="options">Szavazati opciók: </label>
<select id="options" name="options" form="vote">

<?php
echo $_GET['id'];
$servername = "localhost";
$username = "root";
$server_password = "";
$database = "projekt";
$connection = new mysqli($servername,$username,$server_password,$database);


if(!$connection){
    header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
}
$id = $_GET['id'];
$query = "SELECT options.option_id ,options.option_name FROM options WHERE options.poll_id='$id';";
//$res = mysqli_query($connection,$query);
$res = mysqli_query($connection,$query);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        echo "<option value='".$row['option_id']."'>".$row['option_name']."</option>";
    }
}else{
    header("Location: /errorpage.php?hiba=wow valami hiba wow");
}



?>

</select>
<input type="submit" name="votee">
</form>
<?php

if(isset($_POST['votee'])){
$servername = "localhost";
$username = "root";
$server_password = "";
$database = "projekt";
$connection = new mysqli($servername,$username,$server_password,$database);


if(!$connection){
    header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
}
$answer=$_POST['options'];
$usernamestuff = $_COOKIE['username'];
$user_id= "SELECT users.user_id FROM users WHERE username='$usernamestuff'";

$res_id = mysqli_fetch_array(mysqli_query($connection,$user_id));

$insert_query = "INSERT INTO votes (user_id,option_id) VALUES($res_id[0],$answer)";


if(mysqli_query($connection,$insert_query)){
    header("Location: /succes_reg.php?srnm=Sikeresen felvitte szavazatát!");
}

mysqli_close($connection);
}


?>


</div>
    
</body>
</html>
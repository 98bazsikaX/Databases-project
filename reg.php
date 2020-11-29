<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/global.css" rel="stylesheet">
    <link href='style/reg.css' rel="stylesheet">
    <?php
    session_start();
    if(session_status() == PHP_SESSION_NONE || (!isset($_COOKIE['logged_in'])  || $_COOKIE['logged_in'] == 'false' )){
        echo "<meta name='session' id='is_session' content='false' value='false'>";
    }else if($_COOKIE['logged_in'] == 'true'){
        echo "<meta name='session' id='is_session' content='true' value='true'>";
    }
?>
    <title>Regisztráció</title>
    <script>

       //document.getElementById('regform').disabled = true;
    </script>
</head>
<body>
<?php
include_once "scripts/php/header.php";
name("Regisztráció");
?>

<div id='regform' class="log">
<h1>Regisztráció</h1>
<form action="reg.php" method="post" enctype="multiplatform/data" class="log"> <!-- reg form kezdete -->

    <label>Felhasználónév: (kötelező)</label>  
    <input type="text" name="usrnm" autocomplete="username" minlength="3" maxlength="16" required><br>
    <label>Email: (kötelező)</label>
    <input type="email" name="email" autocomplete="username" required><br>
    <label>Jelszó: (kötelező)</label>
    <input type="password" id="pwd_to_check" minlength="3" name="pwd" autocomplete="new-password" maxlength="16" onkeypress="metre()" required>
    <meter min="0" max="10" value="0" id="check">password</meter>
    <br>
    <label>Jelszó megerősítése: (kötelező)</label>
    <input type="password" name="pwda" autocomplete="new-password" required><br>
    <label>Születés dátum: (nem kötelező)</label>
    <input type="date" name="brth" value='null'><br>
    <label>Az ön neme: </label>
    <select name="gender" required default="o">
        <option value="m">Férfi</option>
        <option value="f">Nő</option>
        <option value="o">Egyéb</option>
    </select><br>
    <input type="reset" name="rst">
    <input type="submit" name="signup">
</form>   <!-- reg form vége -->
    <?php
    include_once "scripts/php/signup.php";

    if (isset($_POST['signup'])){
        SaveToDB($_POST['usrnm'],$_POST['email'],password_hash($_POST['pwd'],PASSWORD_DEFAULT),$_POST['brth'],$_POST['gender']);
    }


    ?>

<!-- Belépés div -->

<div id="login" class="log">
    <form action="reg.php" method="post" enctype="multipart/form-data">
    <h1>Bejelentkezés</h1>
    <label>Felhasználónév/Email: </label> 
    <input type="text" name="usrnm_to_login" autocomplete="username"  required><br>
    <label>Jelszó: </label>
    <input type="password" id="pwd_to_compare" required name="pwd_to_compare" autocomplete="new-password">
    <input type="submit" name="login">
    </form>
</div>
<!-- Bejelentkezés div vége -->

<?php

if(isset($_POST['login'])){
    require_once('scripts/php/checklogin.php');
    if(valid_login($_POST['usrnm_to_login'],$_POST['pwd_to_compare'])){
        session_start();
        session_name($_POST['usrnm_to_login']);
        session_id($_POST['usrnm_to_login']);
        setcookie('logged_in','true');
        setcookie('username',$_POST['usrnm_to_login']);
        
        $asd= $_POST['usrnm_to_login'];
        header("Location: /succes_reg.php?srnm=$asd Sikeresen bejelentkezett!");
    }else{
        setcookie('logged_in','false');
        setcookie('username',null);
        header("Location: /errorpage.php?hiba=Hibás belépési azonosító testvérem!");
    }
    
}


?>
</div>


<!--   ---Kijelentkezés---   -->
<div id="logout">
<a href="create_poll.php">Szavazás létrehozása!</a>
<h1>Kijelentkezés</h1>
<form action="reg.php" method="post" enctype="multipart/form-data">
<input type="submit" name="logout" value="Kijelentkezés">
</form>
</div><!--   Kijelentkezés vége   -->
<?php
if(isset($_POST["logout"])){
    //session_unset();
    session_destroy();
    setcookie('logged_in','false');
    setcookie('username','');
    //echo "<script>alert('Sikeres kijelentkezés!');</script>";
    header("Location: /errorpage.php?hiba=Sikeresen kijelentkezett!");
}
?>


<script>

async function disp(id,how){
    document.getElementById(id).style.display = how;
}

var is_session = 'true' == (document.getElementById('is_session').getAttribute('content'));
if(is_session){
    console.log("asd     "+document.getElementById('is_session').getAttribute('content'));
    console.log("session!");
    disp('regform','none');
    disp('login','none');
    disp('logout','block');
}else{
    console.log("foo "+document.getElementById('is_session').getAttribute('content'));
    console.log("Not session!");
    disp('regform','block');
    disp('login','block');
    disp('logout','none');
}


function metre(){
    let asd = document.getElementById("pwd_to_check").value;

    let strength = asd.length;
    if(strength>10){
        strength = 10;
    }
    let meter = document.getElementById("check");
    meter.value = strength;

}
</script>



<?php
include_once "scripts/php/footer.php"
?>
</body>
</html>

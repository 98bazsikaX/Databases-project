<html lang="HU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/global.css" rel="stylesheet">
    <link href='style/reg.css' rel="stylesheet">

    <title>Regisztráció</title>
</head>
<body>
<?php
include_once "scripts/php/header.php";
name("Regisztráció");
?>

<div id='regform'>
<h1>Regisztrációs mező</h1>
<form action="reg.php" method="post" enctype="multiplatform/data">
<!-- TODO:
    Len username == (5<=len<=15)
    len pwd == (5<=len<=15)
-->
    <label>Felhasználónév: (kötelező)</label> <input type="text" name="usrnm" autocomplete="username" required><br>
    <label>Email: (kötelező)</label><input type="email" name="email" autocomplete="username" required><br>
    <label>Jelszó: (kötelező)</label><input type="password" id="pwd_to_check" name="pwd" autocomplete="new-password" onkeypress="metre()" required>
    <meter min="0" max="10" value="0" id="check">password</meter>
    <br>
    <label>Jelszó megerősítése: (kötelező)</label><input type="password" name="pwda" autocomplete="new-password" required><br>
    <label>Születés dátum: (nem kötelező)</label><input type="date" name="brth"><br>
    <input type="reset" name="rst">
    <input type="submit" name="signup">
    <?php
    include_once "scripts/php/signup.php";

    if (isset($_POST['signup'])){
        SaveToDB($_POST['usrnm'],$_POST['email'],password_hash($_POST['pwd'],PASSWORD_DEFAULT),$_POST['brth']);
    }


    ?>


<script>
function metre(){
    let asd = document.getElementById("pwd_to_check").value;
    //console.log(asd);
    let strength = asd.length;
    if(strength>10){
        strength = 10;
    }
    let meter = document.getElementById("check");
    meter.value = strength;

}
</script>
</form>
</div>

<?php
include_once "scripts/php/footer.php"
?>
</body>
</html>

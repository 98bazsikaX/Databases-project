<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/javascript/redirect.js"></script>
    <title>Sikeres regisztráció!</title>
    <link href="/style/global.css" rel="stylesheet">
    <style>
        h1{
            color:#FCBA04;
            text-align: center;
        }
    </style>
</head>
<body>
<?php
    include_once("scripts/php/header.php");
    echo "<h1> ". $_GET['srnm']."</h1>";
?>
    <a href="index.php">Főoldal</a>
<script>
    //redirect(new Number(420));
</script>
<?php
    include_once("scripts/php/footer.php");
?>
</body>
</html>
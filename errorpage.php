<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/javascript/redirect.js"></script>
    <link href="style/global.css" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            color:red;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>HIBA! <br> </h1>";
    echo "<p>".$_GET['hiba']."</p>"
    ?>
    <a href="index.php">Főoldal</a>

</body>
</html>
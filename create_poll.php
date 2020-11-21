<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/global.css" rel="stylesheet">
    <script src="scripts/javascript/create_poll.js"></script>
    <title>Szavazás létrehozása</title>
</head>
<body>
<?php
require_once("scripts/php/header.php");
name("Szavazás létrehozása");
?>
<div id="basic_details">
<label>A szavazás neve:</label>
<input type="text" id="name">
<button onclick="createForm()" id="make_button">Forma létrehozása</button>
</div>







<?php
require_once("scripts/php/footer.php");
?>
</body>
</html>
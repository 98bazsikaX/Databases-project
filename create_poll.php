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
    <!-- Első php include-->
<?php
require_once("scripts/php/header.php");
name("Szavazás létrehozása");
?><!-- Első php include vége-->
<div>
    <form id="options" action="create_poll.php" method="post" enctype="multiplatform/data">
        <div id="basic_details">
            <label id="label_for_name">A szavazás neve:</label>
            <input type="text" id="name" name="name" maxlength="16">
            <br>
            <label id="label_for_nr">Opciók száma</label>
            <input type="number" id="nr_of_options" name="nr_of_options" value="0">
            <br>
            <button onclick="createForm()" id="make_button">Forma létrehozása</button>
            <!-- <button onclick="add_option()" class="add_button" disabled>Opció hozzáadása</button> TODO: Megcsinálni h a többinél is legyen törlés (ha lehet ilyet) -->
        </div>
    <div id="geninputs">
        <!-- Generált inputok jönnek ide-->
    </div>
   <!--  <button onclick="add_option()" class="add_button" disabled>Opció hozzáadása</button>  TODO: Ugyanaz mint fent-->
   <div id="settings">
   <label>Privát szavazás:</label>
    <input type="radio" name="private" id="true">
    <label for="true">Igen</label>
    <br>
    <input type="radio" name="private" id="false">
    <label for="false">Nem</label>
   </div>
    <input type="reset" name="rst" id="reset" disabled>
    <input type="submit" name="submit_poll" id="submitbutton" value="Szavazás létrehozása" disabled>
    
    </form>
</div>
<!-- TODO: MEGCSINÁLNI AZT H ELKÜLDJE A FORMOT!!!!!!!!!!!!!-->

<?php

if(isset($_POST['submit_poll'])){
    $asd = $_POST['name'] . "   Első opció: " . $_POST['option_1'] . " Opciók száma: " . $_POST['nr_of_options'];
    header("Location: /errorpage.php?hiba=Sikeresen létrehozta az adatbázist! $asd ");
}



?>




<!-- Második php include footernek-->
<?php
require_once("scripts/php/footer.php");
?>
<!-- Második php include vége-->
</body>
</html>
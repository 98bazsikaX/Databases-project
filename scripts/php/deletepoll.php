<?php
if(!isset($_GET['del'])){
    header("Location:   errorpage.php?hiba=NOPE");
}

$poll_id_to_del = $_GET['del'];


?>
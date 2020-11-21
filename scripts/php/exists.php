<?php
/*
@conn: $servername,$username,$server_password,$database
@table: melyik tábla
@to_find: mi van a táblában
@in_what: tábla melyik adatából
@visszatérít: igaz/hamis
*/

function exists($conn,$table,$to_find,$in_what){
    if(!$conn){
        return false;
    }
    $retval = mysqli_fetch_row(mysqli_query($conn,"SELECT 1 FROM $table WHERE $in_what='$to_find' LIMIT 1"));
    return $retval;

}
?>
<?php
/*
$name: Szavazás neve
$auth: Szavazás szerzője
$opt_num: opciók száma:
$is_private: látható-e hogy ki mire szavazott
$invite_only: meghívós-e a szavazás
$multi: lehet-e több választ megadni
*/
function save_poll($name,$auth,$opts){
    $invite_only=false;
    $servername = "localhost";
    $username = "root";
    $server_password = "";
    $database = "projekt";
    $connection = new mysqli($servername,$username,$server_password,$database);

    if(!$connection){
        header("Location: /errorpage.php?hiba=Jelenleg nem elérhető az adatbázis, próbálja meg később");
    }

    $auth_id_query = "SELECT users.user_id FROM users WHERE username='$auth' LIMIT 1";

    $auth_id = intval( mysqli_fetch_row($connection->query($auth_id_query))[0]);
    
    $poll_database_query = "INSERT INTO polls (poll_name,creator_id) VALUES ('$name','$auth_id')";
    $id = 0;
    
    if($connection->query($poll_database_query) === TRUE ){
        $id = $connection->insert_id;
        foreach($opts as $opt){
            $query_for_options = "INSERT INTO options (poll_id,option_name) VALUES('$id','$opt')";
            if($connection->query($query_for_options) === TRUE){

            }else{
                header("Location: /errorpage.php?hiba=Hiba az opciók tábla feltöltésében!");
            }
        }
        if($invite_only){
            if($connection->query("INSERT INTO invites(poll_id,user_id) VALUES('$id','$auth_id')")){

            }else{
                header("Location: /errorpage.php?hiba=Hiba egy adat megadásánál!");
            }
        }
    }else{
        header("Location: /errorpage.php?hiba=Hiba a szavazat tábla felvételében!");
    }
    
    $connection->close();
    header("Location: /errorpage.php?hiba=Sikeresen felvette a szavazást!".array_values($opts));
}



?>
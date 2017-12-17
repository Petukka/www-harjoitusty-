<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file searches the person from the database and errors if persons not found.
-->
<?php

function  in($name, $pass) {
    require_once("utils.php");
    $servername = getenv('C9_USER');

    $db = new PDO('mysql:host=localhost;dbname=www;charset=utf8', $servername, '');

    $pw = sha1($pass . RANDOMISER);

    $sql = $db->prepare("SELECT userid, username FROM users WHERE username=:username AND pass_hash=:pass");

    $sql->execute(array(":username" => $name, ":pass" => $pw));

    $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(count($rows) === 1){
        $_SESSION["userID"] = $rows[0]["userid"];
        $_SESSION["username"] = $rows[0]["username"];

        header("location:/index.php?p=logged");
    } else {
        logError1();
    }
}


?>

<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file puts username and password hash to database.
-->

<?php
require_once("utils.php");

function reg($name, $pass) {

    $servername = getenv('C9_USER');

    $db = new PDO('mysql:host=localhost;dbname=www;charset=utf8', $servername, '');

    $pw = sha1($pass . RANDOMISER);

    $sql = $db->prepare("INSERT INTO users(username, pass_hash) VALUES(:v1, :v2)");

    $sql->execute(array(":v1" => $name, ":v2" => $pw));


    regSuccess();
}
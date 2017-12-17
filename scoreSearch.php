<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<?php

function search() {

    require_once("index.php");
    $servername = getenv('C9_USER');

    $db = new PDO('mysql:host=localhost;dbname=www;charset=utf8', $servername, '');

    $sql = $db->prepare("SELECT * FROM highscores ORDER BY score DESC");
    $sql->execute();

    foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $v) {
        echo "<tr><td>" . $v["username"] . "</td><td>" . $v["score"] . "</td></tr>";
    }

}


?>

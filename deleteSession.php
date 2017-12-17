<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file deletes two variables so that SESSION is empty.
-->

<?php

require_once("index.php");

$_SESSION["userID"] = null;
$_SESSION["username"] = null;

?>
<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file checks if the name, password and password2 are valid to event try to insert to database.
-->

<?php

require_once("utils.php");
require_once("register.php");

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["username"]) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"]) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password2"]) && strlen($_POST["password"]) >= 4 && strlen($_POST["username"] >= 0)) {
        if($_POST["password"] === $_POST["password2"]) {
            reg($_POST["username"], $_POST["password"]);
        
        } else {
            regError1();
        }
    } else {
        regError2();
    }
} else {
    regError3();
}

?>
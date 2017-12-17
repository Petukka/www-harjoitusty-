<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file checks if the name and password are valid to event try to search from database.
-->
<?php
require_once("utils.php");
require_once("login.php");

if(isset($_POST["username"]) && isset($_POST["password"])) {
    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["username"]) && !preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
        in($_POST["username"], $_POST["password"]);

    } else {
        logError2();
    }
    
} else {
    logError1();
}





?>
<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file works as front controller and shows user the right files
-->


<?php
    session_start();
    require_once("utils.php");
    if(!isset($_GET["p"])) {
        header("location:/index.php?p=");
    }

    siteHeader();

    if ($_GET["p"] === "login") {
        loginPage();
    } else if ($_GET["p"] === "register") {
        registerPage();
    } else if($_GET["p"] === "highscores") {
        require("highscore.php");
    } else if($_GET["p"] === "logged") {
        require("logged.php");
    } else if($_GET["p"] === "onePlay") {
        require("onePlay.php");
    } else if($_GET["p"] === "twoPlay") {
        require("twoPlay.php");
    } else if($_GET["p"] === "instructions") {
        require("instructions.php");
    } else if($_GET["p"] === "Logcheck") {
        require("logCheck.php");
    } else if($_GET["p"] === "Regcheck") {
        require("regCheck.php");
    } else {
        defaultPage();
    }

    siteFooter();

?>
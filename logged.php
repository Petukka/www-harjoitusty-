<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file shows the interface after the user has logged in. It also checks that someone has logged in.
-->

<?php
    require_once("index.php");

    if(!isset($_SESSION["username"]) || !isset($_SESSION["userID"])) {
        header("location:/index.php?p=");
    }

    echo "<p>Logged in as " . $_SESSION["username"];


?>



<div class="row">
<form action="index.php?p=onePlay" method="post">
    <div class="col l3 s12"><button class="waves-effect waves-light btn red" type="submit" id="onePlay">Singleplayer<i class="material-icons left">person</i></button></div>
</form>
<form action="index.php?p=twoPlay" method="post">
    <div class="col l3 s12"><button class="waves-effect waves-light btn red" type="submit" id="twoPlay">Multiplayer<i class="material-icons left">people</i></button></div>
</form>
<form action="index.php?p=highscores" method="post">
    <div class="col l3 s12"><button class="waves-effect waves-light btn red" type="submit" id="highscores">Highscores<i class="material-icons left">view_headline</i></button></div>
</form>
<form action="index.php?p=instructions" method="post">
    <div class="col l3 s12"><button class="waves-effect waves-light btn red" type="submit" id="instructions">Instructions<i class="material-icons left">info_outline</i></button></div>
</form>
</div>
<div class="row">
<form action="index.php?p=" method="post">
    <div class="col l12 s12"><button class="waves-effect waves-light btn red" type="submit" id="logOut">Log Out<i class="material-icons left">lock_outline</i></button></div>
</form>
</div>
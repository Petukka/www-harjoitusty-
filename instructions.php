<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file is the instruction page to the game.
-->

<?php
    if(!isset($_SESSION["username"]) || !isset($_SESSION["userID"])) {
        header("location:/index.php?p=");
    }
?>

<h2>Singleplayer</h2>
<p class="flow-text">In singleplayer the player, Gondola, tries to avoid the boxes that fall from the sky. At the same
     time they try to catch keys that fall from the sky too. Keys destroy when they hit ground. Player
      does this until one of the boxes hits him. Every secound player gets one point and if player catches
       he/she gets ten points. Player controls gondola with keyboards arrow keys.<p>
<h2>Multiplayer</h2>
<p class="flow-text">In multiplayer there are two players: Gondola and Inverted Gondola. It's a survival to the death
     and the one who gets hit by boxes first dies. There are no points and the only thing that counts is survival.
      Gondola is controlled with keyboards arrow keys and Inverted Gondola with WASD keys. Let the games begin!<p>


<form action="index.php?p=logged" method="post">
    <div class="col s12"><button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button></div>
</form>
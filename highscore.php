<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file prints the highscore list to the user. User can also generate pdf file of it in this page.
-->

<?php

    require_once("scoreSearch.php");
    if(!isset($_SESSION["username"]) || !isset($_SESSION["userID"])) {
        header("location:/index.php?p=");
    }
?>

<div id="PDF">
    <h2>TOP 10 Highscores</h2>
    <table class="centered responsive-table highlight" id="highscoreList">
        <thead>
            <tr>
                <th>Player</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>

<?php
        search();
?>
        </tbody>
    </table>

</div>

<div class="row">
    <form action="index.php?p=logged" method="post">
        <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button></div>
    </form>


    <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="HTMLtoPDF" onclick="toPDF()">Generate PDF<i class="material-icons left">file_download</i></button></div>
</div>


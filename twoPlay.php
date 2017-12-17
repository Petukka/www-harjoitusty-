<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file is the multiplayer page and lauches the twoPlay.js file which is needed for this. It also has back buttton and reset button.
-->

<?php
    if(!isset($_SESSION["username"]) || !isset($_SESSION["userID"])) {
        header("location:/index.php?p=");
    }
?>

<script src="/js/twoPlay.js"></script>

<div class="row">
<form action="index.php?p=twoPlay" method="post">
    <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="reset">Reset<i class="material-icons left">replay</i></button></div>
</form>

<form action="index.php?p=logged" method="post">
    <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button></div>
</form>
</div>
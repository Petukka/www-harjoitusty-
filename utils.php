<!--
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
-->

<!--
    This file works as defining of the website like initializes html and has the default page and some error messages and one success message.
-->

<?php

define("RANDOMISER", "ioasjdgijajrhiojiofdjkhijfipasjdf");

function siteHeader() {
?>

    
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/phaser.min.js"></script>
        <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/style.css" />
        <script src="/js/jq.js"></script>
        <script src="/js/pdfFromHTML.js"></script>
        <title>MOVE GONDOLA</title>

    </head>
    <body class="teal">

    <div class="center-align" id="page">

        <h1>MOVE GONDOLA</h1>



<?php
}


function defaultPage() {
    ?>
        <div class="row">
        <div class="col l6 s12">
        <form action="index.php?p=login" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="login">Login<i class="material-icons left">vpn_key</i></button>
        </form>
        </div>
        <div class="col l6 s12">
        <form action="index.php?p=register" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="register">Register<i class="material-icons left">add_box</i></button>
        </form>
        </div>
        </div>
    
<?php
}

function loginPage() {
?>
    <div id="loginPage">

    <form action="index.php?p=Logcheck" method="post">
        <input type="text" name="username" placeholder="Nickname"/>
        <input type="password" name="password" placeholder="Password"/>
        <div class="row"><div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="logIN">Login<i class="material-icons left">vpn_key</i></button></div>
    </form>

    <form action="index.php?p=" method="post">
        <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button></div></div>
    </form>
    </div>

<?php

}

function registerPage() {
?>
    <div id="registerPage">

        <form action="index.php?p=Regcheck" method="post">
            <input type="text" name="username" placeholder="Nickname"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="password" name="password2" placeholder="Password again"/>
            <div class="row"><div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" name="registerIN">Register<i class="material-icons left">add_box</i></button></div>
        </form>
        
        <form action="index.php?p=" method="post">
            <div class="col l6 s12"><button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button></div></div>
        </form>
    </div>

<?php
}

function logError1() {
?>
    <div id="upper">
        <p>Nickname or password is wrong</p>

        <form action="index.php?p=login" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>


<?php
}

function logError2() {
?>
    <div id="upper">
        <p>Nickname or password can only contain letters and/or numbers</p>

        <form action="index.php?p=login" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>
    
    
<?php
}

function regError1() {
?>
    <div id="upper">
        <p>Passwords don't match<p>
        <form action="index.php?p=register" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>
    
<?php
}

function regError2() {
?> 
    <div id="upper">
        <p>Nickname and password can only contain letters and numbers, and password has to be atleast 4 character long<p>
        <form action="index.php?p=register" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>
        
<?php
}

function regError3() {
?> 
    <div id="upper">
        <p>You must put give nickname and password<p>
        <form action="index.php?p=register" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>
        
<?php

}

function regSuccess() {
?> 
    <div id="upper">
        <p>User created</p>

        <form action="index.php?p=register" method="post">
            <button class="waves-effect waves-light btn red" type="submit" id="back">Back<i class="material-icons left">arrow_back</i></button>
        </form>
    </div>

            
<?php
}
    
function siteFooter() {
?>

</div>

</body>
</div>
    
</html>

<?php
}
?>
    
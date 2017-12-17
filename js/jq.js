/*
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
*/

/* This file contains jquery that uses deleteSession.php to delete all from SESSION variable.
*/

"use strict";

$(document).ready(function() {

    $("#logOut").click(function(event) {
        var request = $.ajax({
            url: "deleteSession.php",
            type: "POST",
            data: {"data": "1"},
            dataType: "html",
        });
    });

});
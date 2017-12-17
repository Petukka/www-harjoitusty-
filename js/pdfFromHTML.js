/*
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
*/

/* This file created pdf out of the highscore list. It uses jspdf.min.js library to do this.
*/

"use strict";

function toPDF() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    var source = $('#PDF')[0];

    pdf.fromHTML(
        source,
        70,
        40,
        {
            'width': 545
        }
    );
    pdf.save('highscores.pdf');
}
/*
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
*/

/* This is the singleplayer game file which creates the game. It uses phaser.min.js library.
It also sends with ajax the score to addhi.php to be stored. The data is send using json.
*/

"use strict";

$(document).ready(function() {

    var game = new Phaser.Game(1000, 700, Phaser.AUTO, '', {preload: preload, create: create, update:update});
    
    var platforms;
    var player;
    var cursor;

    var gameEnder = 0;
    var gravityChanger;
    var out;
    var blockGravity = 1000;
    var blocks;
    var keys;
    var score = 0;
    var jsonScore;
    var scoreText;


    function preload() {
        game.load.image("block", "assets/block.png");
        game.load.image("key", "assets/key.png");
        game.load.image("bg", "assets/background.png");
        game.load.image("pf", "assets/platform.png");

        game.load.spritesheet("guy", "assets/guy.png", 23, 53);

        cursor = game.input.keyboard.createCursorKeys();


    }

    function create() {
        game.physics.startSystem(Phaser.Physics.ARCADE);

        game.add.tileSprite(0,0, 1000, 700, "bg");

        platforms = game.add.group();

        platforms.enableBody = true;

        var ground = platforms.create(0, 636, "pf");
        ground.scale.setTo(34,2);
        ground.body.immovable = true;

        player = game.add.sprite(510, 550, 'guy');
        game.physics.arcade.enable(player);
        player.body.bounce.y = 0.1;
        player.body.gravity.y = 2000;
        player.body.collideWorldBounds = true;
        player.animations.add("left", [0,1,2], 10, true);
        player.animations.add("right", [4,5,6], 10, true);
        player.scale.setTo(1.5, 1.5);

        blocks = game.add.group();
        blocks.enableBody = true;

        for (var i = 0; i < 9; i++) {

            gravityChanger = Math.floor((Math.random() * 20) + 5);

            blockDrop();
        }

        keys = game.add.group();
        keys.enableBody = true;
        

        keyDrop();

        scoreCount();

        scoreText = game.add.text(5,5, "Score: 0", {fontSize: "64px;", fill: "#fff"});
    }

    function update() {
        game.physics.arcade.collide(player, platforms);
        game.physics.arcade.overlap(blocks, platforms, blockHide, null, this);
        game.physics.arcade.overlap(keys, platforms, keyHide, null, this);
        game.physics.arcade.overlap(player, keys, keyTake, null, this);
        game.physics.arcade.overlap(player, blocks, gameOver, null, this);

        player.body.velocity.x = 0;

        if (cursor.left.isDown) {
            player.body.velocity.x = -400;
            player.animations.play("left");
        } else if (cursor.right.isDown) {
            player.body.velocity.x = 400;
            player.animations.play("right");
        } else {
            player.animations.stop();
            player.frame = 3;
        }

        if (cursor.up.isDown && player.body.touching.down) {
            player.body.velocity.y = -1000;
        }



    }

    function blockHide(block, platforms) {
        block.destroy();
    }

    function keyHide(key, platforms) {
        key.destroy();
    }

    function keyTake(player, key) {
        key.destroy();

        score+=10;
        scoreText.text = 'Score: ' + score;
    }

    function gameOver(player, block) {
        gameEnder = 1;
        blocks.destroy();
        keys.destroy();

        jsonScore = JSON.stringify({
            "score":score
        });
        
        var request = $.ajax({
            url: "addhi.php",
            type: "POST",
            data: {
                "jsonScore": jsonScore
            },
            dataType: "html"
        });

        Materialize.toast('You got ' + score + ' points', 4000);
    }

    function blockDrop() {

        setTimeout(function() {

            if (gameEnder === 0) {
                var block = blocks.create(Math.floor((Math.random() * 999) + 1), 0, 'block');
                blockGravity = blockGravity + gravityChanger;
                block.body.gravity.y = blockGravity;
                blockDrop();
            }
        }, Math.floor((Math.random() * 2000) + 500));
                
    }

    function keyDrop() {

        setTimeout(function() {

            if (gameEnder === 0) {
                var key = keys.create(Math.floor((Math.random() * 999) + 1), 0, 'key');
                key.body.gravity.y = 1000;
                    keyDrop();
            }
        }, Math.floor((Math.random() * 10000) + 4000));
                
    }

    function scoreCount() {
        score+=1;
        setTimeout(function() {
            scoreText.text = 'Score: ' + score;
            if (gameEnder === 0) {
                scoreCount();
            }
        }, 1000);
    }

});

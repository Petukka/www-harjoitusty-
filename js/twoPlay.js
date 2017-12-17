/*
Tekijä: Petri Rämö
Opiskelijanro:0438578
Pvm: 17.12.2017
*/

/* This is the multiplayer game file which creates the game. It uses phaser.min.js library.
*/

"use strict";

$(document).ready(function() {

    var game = new Phaser.Game(1000, 700, Phaser.AUTO, '', {preload: preload, create: create, update:update});
    
    var platforms;
    var player1;
    var player2;
    var cursor;
    var upKey;
    var downKey;
    var leftKey;
    var rightKey;

    var gameEnder = 0;
    var gravityChanger;
    var out;
    var blockGravity = 1000;
    var blocks;
    var score = 0;
    var scoreText;


    function preload() {
        game.load.image("block", "assets/block.png");
        game.load.image("bg", "assets/background.png");
        game.load.image("pf", "assets/platform.png");

        game.load.spritesheet("guy", "assets/guy.png", 23, 53);
        game.load.spritesheet("invguy", "assets/invguy.png", 23, 53);

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

        player1 = game.add.sprite(990, 550, 'guy');
        game.physics.arcade.enable(player1);
        player1.body.bounce.y = 0.1;
        player1.body.gravity.y = 2000;
        player1.body.collideWorldBounds = true;
        player1.animations.add("left1", [0,1,2], 10, true);
        player1.animations.add("right1", [4,5,6], 10, true);
        player1.scale.setTo(1.5, 1.5);

        player2 = game.add.sprite(10, 550, 'invguy');
        game.physics.arcade.enable(player2);
        player2.body.bounce.y = 0.1;
        player2.body.gravity.y = 2000;
        player2.body.collideWorldBounds = true;
        player2.animations.add("left2", [0,1,2], 10, true);
        player2.animations.add("right2", [4,5,6], 10, true);
        player2.scale.setTo(1.5, 1.5);

        upKey = game.input.keyboard.addKey(Phaser.Keyboard.W);
        downKey = game.input.keyboard.addKey(Phaser.Keyboard.S);
        leftKey = game.input.keyboard.addKey(Phaser.Keyboard.A);
        rightKey = game.input.keyboard.addKey(Phaser.Keyboard.D);

        blocks = game.add.group();
        blocks.enableBody = true;

        for (var i = 0; i < 9; i++) {

            gravityChanger = Math.floor((Math.random() * 20) + 5);

            blockDrop();
        }

    }

    function update() {
        game.physics.arcade.collide(player1, platforms);
        game.physics.arcade.collide(player2, platforms);
        game.physics.arcade.overlap(blocks, platforms, blockHide, null, this);
        game.physics.arcade.overlap(player1, blocks, gameOver1, null, this);
        game.physics.arcade.overlap(player2, blocks, gameOver2, null, this);



        player1.body.velocity.x = 0;
        player2.body.velocity.x = 0;

        if (cursor.left.isDown) {
            player1.body.velocity.x = -400;
            player1.animations.play("left1");
        } else if (cursor.right.isDown) {
            player1.body.velocity.x = 400;
            player1.animations.play("right1");
        } else {
            player1.animations.stop();
            player1.frame = 3;
        }

        if (cursor.up.isDown && player1.body.touching.down) {
            player1.body.velocity.y = -1000;
        }

        if (leftKey.isDown) {
            player2.body.velocity.x = -400;
            player2.animations.play("left2");
        } else if (rightKey.isDown) {
            player2.body.velocity.x = 400;
            player2.animations.play("right2");
        } else {
            player2.animations.stop();
            player2.frame = 3;
        }

        if (upKey.isDown && player2.body.touching.down) {
            player2.body.velocity.y = -1000;
        }



    }

    function blockHide(block, platforms) {
        block.destroy();
    }

    function gameOver1(player1, block) {
        gameEnder = 1;
        blocks.destroy();
        player1.kill();

        Materialize.toast('GONDOLA DIED! INVERTED GONDOLA WON!', 4000);

        
    }

    function gameOver2(player2, block) {
        gameEnder = 1;
        blocks.destroy();
        player2.kill();

        Materialize.toast('INVERTED GONDOLA DIED! GONDOLA WON!', 4000);


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

});

<?php 

include 'Player.php';
include 'Game.php';

$player1 = new Player('first', 20);

$player2 = new Player('second', 10);

$game = new Game($player1, $player2);

$game->start();
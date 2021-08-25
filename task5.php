<?php

$board = [
    [" ", " ", " "],
    [" ", " ", " "],
    [" ", " ", " "]
];

function displayBoard(array $board)
{
    echo " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} \n";
    echo "---+---+---\n";
    echo " {$board[1][0]} | {$board[1][1]} | {$board[1][2]} \n";
    echo "---+---+---\n";
    echo " {$board[2][0]} | {$board[2][1]} | {$board[2][2]} \n";
}

$isOccupied = function(int $row, int $column) use (&$board): bool {
    return $board[$row][$column]  !== " ";
};

$isTie = function () use (&$board): bool{
    for ($r = 0; $r < 3; $r++){
        for ($c = 0; $c < 3; $c++){
            if ($board[$r][$c] === " "){
                return false;
            }
        }
    }
    return true;
};

displayBoard($board);

$gameIsGoing = true;

$playerX = "X";
$playerO = "O";

$currentPlayer = $playerX;

while ($gameIsGoing) {
    $input = explode(" ", readline("'{$currentPlayer}', choose your location: "));
    [$row, $column] = $input;

    if ($isOccupied($row, $column)){
        echo "That slot is taken!" . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $currentPlayer;

    displayBoard($board);

    // horizontal
    for ($i = 0; $i < 3; $i++){
        if ($board[$i][0] == $currentPlayer && $board[$i][1] === $currentPlayer && $board[$i][2] === $currentPlayer){
            echo "The winner is $currentPlayer" . PHP_EOL;
            exit;
        }
    }

    // vertical
    for ($i = 0; $i < 3; $i++){
        if ($board[0][$i] == $currentPlayer && $board[1][$i] === $currentPlayer && $board[2][$i] === $currentPlayer){
            echo "The winner is $currentPlayer" . PHP_EOL;
            exit;
        }
    }

    // diagonal 1

    for ($i = 0; $i < 3; $i++){
        if ($board[0][0] == $currentPlayer && $board[1][1] === $currentPlayer && $board[2][2] === $currentPlayer){
            echo "The winner is $currentPlayer" . PHP_EOL;
            exit;
        }
    }

    // diagonal 2
    for ($i = 0; $i < 3; $i++){
        if ($board[0][2] == $currentPlayer && $board[1][1] === $currentPlayer && $board[2][0] === $currentPlayer){
            echo "The winner is $currentPlayer" . PHP_EOL;
            exit;
        }
    }

    $currentPlayer = $currentPlayer === $playerX ? $playerO : $playerX;

}



























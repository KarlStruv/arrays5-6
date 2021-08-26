<?php
//Write a program to play a word-guessing game like Hangman.
//
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed (either only the incorrect guesses or all guesses).

$words = [
    1 => "hello",
    2 => "dankness",

];

$wordToGuess = $words[rand(1, count($words))];
$letterAmount = strlen($wordToGuess);
$chosenWordArray = str_split($wordToGuess);
$hangmanDisplay = [];

for ($i = 0; $i < count($chosenWordArray); $i++){
    $hangmanDisplay[] = "_ ";
}

$gameIsGoing = true;
$lives = 10;
$wrongGuessArray = [];

$display = function () use (&$hangmanDisplay, &$lives, &$wrongGuessArray) {
   echo "+--------HANGMAN-GAME---------+" . PHP_EOL;
   echo implode(" ", $hangmanDisplay) . PHP_EOL;
   echo "Wrong guesses:" . implode(" ", $wrongGuessArray) . PHP_EOL;
   echo "Lives left: " . $lives . PHP_EOL;
};

$display();

while($gameIsGoing){
    $input = readline("Enter a letter: ");

    if(strlen($input) > 1){
        echo "You must enter only one letter at a time!" . PHP_EOL;
        continue;
    }

    if(is_numeric($input)){
        echo "You must only use letters!" . PHP_EOL;
        continue;
    }

    if (!in_array($input, $chosenWordArray)){

        if (in_array($input, $wrongGuessArray)){
            echo "You already entered this letter!" . PHP_EOL;
            continue;
        }
        $wrongGuessArray[] = $input;
        $lives--;
    } else {
        $positions = array_keys($chosenWordArray, $input);

        foreach ($positions as $position){
            $hangmanDisplay[$position] = $input;
        }

        if (implode("", $hangmanDisplay) === $wordToGuess){
            echo "You win! " . PHP_EOL;
            echo "The word was: $wordToGuess" . PHP_EOL;
            $gameIsGoing = false;
            exit;
        }

    }

    $display();

    if ($lives < 1){
        $gameIsGoing = false;
        echo "You ran out of lives! The word you needed to guess was: $wordToGuess" . PHP_EOL;
    }
}









<?php
//Write a program to play a word-guessing game like Hangman.
//
//It must randomly choose a word from a list of words.
//It must stop when all the letters are guessed.
//It must give them limited tries and stop after they run out.
//It must display letters they have already guessed (either only the incorrect guesses or all guesses).

$words = [
    1 => "python",
    2 => "cobra"

];

$randomNumber = rand(1, count($words));
$chosenWord = $words[$randomNumber];
$letterAmount = strlen($chosenWord);
$wordToArray = str_split($chosenWord);

echo PHP_EOL;
$gameIsGoing = true;

$hangmanArray = [];

for ($i = 0; $i < count($wordToArray); $i++) {
    array_push($hangmanArray, "_ ");
    echo $hangmanArray[$i];
}

$turns = 10;

while ($gameIsGoing) {


    $turns--;



//    var_dump($index);
  //  $multipleLetters =  (array_keys($wordToArray, $guess));

  //      foreach ($multipleLetters as $key => $letter){
    //            echo $hangmanArray[$key] = $guess . " ";
    //    }
    if(in_array("_ ", $hangmanArray)) {
        $guess = readline("Guess a letter: ");

        $index = array_search($guess, $wordToArray, true);

        if ($turns > 0) {
            echo "Turns left: $turns" . PHP_EOL;
            if ($index !== false) {

                for ($i = 0; $i < count($wordToArray); $i++) {

                    if ($i === $index) {
                        echo $hangmanArray[$i] = $guess . " ";
                    } else {
                        echo $hangmanArray[$i];
                    }
                }
            } else {
                echo "Guess again!" . PHP_EOL;
                for ($i = 0; $i < count($wordToArray); $i++) {


                    if ($i === $index) {
                        echo $hangmanArray[$i] = $guess . " ";
                    } else {
                        echo $hangmanArray[$i];
                    }
                }
            }
        } else {
            echo "You are out of turns!" . PHP_EOL;
            exit;
        }
    }
    else{
        echo "You won the hangman!" . PHP_EOL;
    }
}



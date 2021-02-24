<?php

declare(strict_types=1);

require_once 'Player.php';
require_once 'Blackjack.php';
require_once 'Deck.php';
require_once 'Card.php';
require_once 'Suit.php';

session_start();

if (!isset($_SESSION['Blackjack'])) {

    $Blackjack = new Blackjack();
    $_SESSION['Blackjack'] = $Blackjack;
} else{

    $Blackjack = $_SESSION['Blackjack'];

    $deck = $Blackjack->getDeck();
    $Player = $Blackjack->getPlayer();
    $Dealer = $Blackjack->getDealer();

    if (isset($_POST['hit'])) {

        $Player->hit($deck);

        echo "Player's total: " . $Player->getScore(). "<br>";

        echo "Dealer's total: " . $Dealer->getScore();

        if ($Player->hasLost()){
            echo 'YOU LOSE';
            session_destroy();
        }
    }

    if (isset($_POST['stand'])){
        $Dealer->hit($deck);

        if($Dealer->hasLost()){
            echo 'DEALER LOSES';
            session_destroy();
        }else {
            if($Player->getScore() > $Dealer->getScore()){
                echo 'YOU WIN';
                session_destroy();
            }else if ($Player->getScore() < $Dealer->getScore()){
                echo 'DEALER WINS';
                session_destroy();
            }else {
                echo 'DEALER WINS';
                session_destroy();
            }
        }
    }

    if (isset($_POST['surrender'])){
        echo 'DEALER WINS';
        session_destroy();
    }

}






//check what's in the Post
//var_dump($_POST);







?>

<form method="post" action="index.php">

      <button type="submit" name="hit" value="hit">hit</button> <br>
      <button type="submit" name="stand" value="stand">stand</button> <br>
      <button type="submit" name="surrender" value="surrender">surrender</button>

</form>





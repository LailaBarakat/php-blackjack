<?php

declare(strict_types=1);

require_once 'Deck.php';
require_once 'Player.php';
require_once 'Dealer.php';

class Blackjack{
    private Player $player;
    private Dealer $dealer;
    private Deck $deck;

    /**
     * Blackjack constructor.
     */
    public function __construct()
    {
        $this->deck = new Deck();

        $this->player= new Player($this->deck);
        $this->dealer= new Dealer($this->deck);

        $this->deck->shuffle();
        foreach ($this->deck->getCards() as $card) {
            echo $card->getUnicodeCharacter(true);
            echo '<br>';
        }

    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @return Player
     */
    public function getDealer(): Player
    {
        return $this->dealer;
    }

    /**
     * @return Deck
     */
    public function getDeck(): Deck
    {
        return $this->deck;
    }

}
<?php

declare(strict_types=1);

require_once 'Card.php';
require_once 'Deck.php';

class Player{
    const maxValue = 21;

    protected array $cards = [];
    private bool $lost = false;
    //private Deck $deck;


    public function __construct(Deck $deck)
    {
        $this->deck=$deck;

        array_push($this->cards,$deck->drawCard());
        array_push($this->cards,$deck->drawCard());

    }

    public function hit(Deck $deck) {
        array_push($this->cards,$deck->drawCard());

        if ($this->getScore() > self::maxValue){
            $this->lost= true;
        }
    }

    public function surrender() {
        $this->lost=true;
    }

    public function getScore() {
        $score=0;
        foreach ($this->cards AS $card){
            $value = $card->getValue();
            $score += $value;
        }

        return $score;
    }

    public function hasLost() {
            return $this->lost;
    }
}

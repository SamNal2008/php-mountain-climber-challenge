<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * Check if Bobby can pay and if yes remove the money he paid
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        if ($price > $this->total) {
            return false;
        }
        $sum = 0;
        $ordered_wallet = rsort($this->wallet);
        $closest = 0;
        foreach($this->wallet as $element) {
            if ($sum >= $price) {
                break;
            }
            if (is_numeric($element)) {
                if ($element === $this->findBestBill($price - $sum)) {
                    $index = array_search($element, $this->wallet);
                    array_splice($this->wallet, $index, 1);
                }
            }
            if ($sum >= $price) {
                break;
            }
        }
        $this->computeTotal();
        return true;
    }

    private function findBestBill($moneyLeft) {
        $min = 1000;
        foreach($this->wallet as $element) {
            if (is_numeric($element)) {
                if (($moneyLeft - $element) < $min) {
                    $min = $element;
                } 
            }
        }
        return $min;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}

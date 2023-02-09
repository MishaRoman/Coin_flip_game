<?php

namespace App;

class Game
{
	public Player $player1;
	public Player $player2;
	public int $totalFlips = 0;

	public function __construct(Player $player1, Player $player2)
	{
		$this->player1 = $player1;
		$this->player2 = $player2;
	}

	public function start()
	{
		$player1Chance = $this->player1->chanceToWin($this->player2);
		$player2Chance = $this->player2->chanceToWin($this->player1);

		echo <<<EOT
			{$this->player1->getName()} chance: {$player1Chance}%
			{$this->player2->getName()} chance: {$player2Chance}%
			
		EOT;

		$this->play();
	}

	private function play()
	{
		while (true) {
			if ($this->player1->isBancrupt() || $this->player2->isBancrupt()) {
				return $this->end();
			}

			$result = $this->flip();
			if ($result === 1) {
				$this->player2->decrementMoney();
				$this->player1->incrementMoney();	
			}
			if ($result === 2) {
				$this->player1->decrementMoney();
				$this->player2->incrementMoney();
			}
		}
	}

	private function flip(): int
	{
		$result = random_int(1, 2);
		$this->totalFlips += 1;

		return $result;
	}

	private function winner(): Player
	{
		if ($this->player1->isBancrupt()) {
			return $this->player2;
		} else {
			return $this->player1;
		}
	}

	private function end()
	{
		echo <<<EOT
			Total flips: {$this->totalFlips}
			Winner: {$this->winner()->getName()}
		EOT;
	}

	

}
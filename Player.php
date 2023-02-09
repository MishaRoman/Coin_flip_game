<?php 

class Player
{
	private string $name;
	private int $money;

	public function __construct(string $name, int $money)
	{
		$this->name = $name;
		$this->money = $money;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getMoney(): int
	{
		return $this->money;
	}

	public function incrementMoney()
	{
		$this->money += 1;
	}

	public function decrementMoney(): bool
	{
		if(!$this->isBancrupt()) {
			$this->money -= 1;
			return true;
		}
		return false;
	}

	public function isBancrupt(): bool
	{
		return $this->getMoney() === 0;
	}

	public function chanceToWin(Player $player): float
	{
		$сhanceToWin = $this->getMoney() / ($this->getMoney() + $player->getMoney()) * 100;

		return round($сhanceToWin, 2);
	}
}
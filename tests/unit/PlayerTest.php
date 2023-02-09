<?php 

use App\Player;

class PlayerTest extends \PHPUnit\Framework\TestCase
{
	public function testGetNameMethodReturnsCorrectValue()
	{
		$player_name = 'Bob';
		$player = new Player($player_name, 10);

		$this->assertEquals($player->getName(), $player_name);
	}

	public function testGetMoneyMethodReturnsCorrectValue()
	{
		$money = 12;
		$player = new Player('Bob', $money);

		$this->assertEquals($player->getMoney(), $money);
	}

	public function testIncrementMoneyMethod()
	{
		$money = 12;
		$player = new Player('Bob', $money);

		$player->incrementMoney();

		$this->assertEquals($player->getMoney(), ++$money);
	}

	public function testDecrementMoneyIsNotAvailable()
	{
		$money = 0;
		$player = new Player('Bob', $money);

		$this->assertFalse($player->decrementMoney());
	}

	public function testDecrementMoneyMethod()
	{
		$money = 12;
		$player = new Player('Bob', $money);

		$result = $player->decrementMoney();

		$this->assertTrue($result);
		$this->assertEquals($player->getMoney(), --$money);
	}

	public function testPlayerIsBancrupt()
	{
		$money = 0;
		$player = new Player('Bob', $money);

		$this->assertTrue($player->isBancrupt());
	}

	public function testPlayerIsNotBancrupt()
	{
		$money = 10;
		$player = new Player('Bob', $money);

		$this->assertFalse($player->isBancrupt());
	}

	public function testIsBancruptHasZeroChanceToWin()
	{
		$player1 = new Player('Player1', 10);
		$player2 = new Player('Player2', 0);

		$this->assertEquals($player2->chanceToWin($player1), 0);
	}

	public function testIsPlayersHaveEqualsChanceWithSameMoneyAmount()
	{
		$player1 = new Player('Player1', 20);
		$player2 = new Player('Player2', 20);

		$this->assertEquals($player2->chanceToWin($player1), 50);
		$this->assertEquals($player1->chanceToWin($player2), 50);
	}
}
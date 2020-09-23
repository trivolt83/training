<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GameOfLifeTest extends TestCase
{
    private $gameOfLife;
    private $deadCell = '1.1';
    private $livingCell = '10.10';

    protected function setUp(): void
    {
        $this->gameOfLife = new GameOfLife();
        $this->gameOfLife->giveLifeTo($this->livingCell);
    }

    private function giveLifeTo(array $cells): void
    {
        foreach ($cells as $cell) {
            $this->gameOfLife->giveLifeTo($cell);
        }
    }

    public function testCanCreateInstanceOfGameOfLife(): void
    {
        $this->assertInstanceOf(
           GameOfLife::class,
           $this->gameOfLife
       );
    }

    public function testGetEmptyPopulation(): void
    {
        $gameOfLife = new GameOfLife();
        $this->assertEquals([], $gameOfLife->getPopulation());
    }

    public function testGetLivingPopulation(): void
    {
        $this->assertEquals(
            [$this->livingCell => 1],
            $this->gameOfLife->getPopulation()
        );
    }

    public function testIsDeadCellDead(): void
    {
        $this->assertFalse($this->gameOfLife->isAlive($this->deadCell));
    }

    public function testIsLivingCellAlive(): void
    {
        $this->assertTrue($this->gameOfLife->isAlive($this->livingCell));
    }

    public function testIsDeadCellAliveAfterGivingLife(): void
    {
        $this->gameOfLife->giveLifeTo($this->deadCell);
        $this->assertTrue($this->gameOfLife->isAlive($this->deadCell));
    }

    public function testIsLivingCellDeadAfterTakingLife(): void
    {
        $this->gameOfLife->takeLifeFrom($this->livingCell);
        $this->assertFalse($this->gameOfLife->isAlive($this->livingCell));
    }

    public function testGetNeighboursFromEmptyCellException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->gameOfLife->getNeighboursFrom('');
    }

    public function testGetNeighboursFromInvalidCellException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->gameOfLife->getNeighboursFrom('foo.bar');
    }

    public function testGetNeighboursFromDeadCell(): void
    {
        $this->assertEquals(
            [
                '0.0' => 0, '0.1' => 0, '0.2' => 0,
                '1.0' => 0,             '1.2' => 0,
                '2.0' => 0, '2.1' => 0, '2.2' => 0
            ],
            $this->gameOfLife->getNeighboursFrom($this->deadCell)
        );
    }

    public function testGetNeighboursFromLivingCell(): void
    {
        $this->assertEquals(
            [
                 '9.9' => 0,  '9.10' => 0,  '9.11' => 0,
                '10.9' => 0,               '10.11' => 0,
                '11.9' => 0, '11.10' => 0, '11.11' => 0
            ],
            $this->gameOfLife->getNeighboursFrom($this->livingCell)
        );
    }

    public function testWillLivingCellDieIfNoNeighboursAlive(): void
    {
        $this->assertFalse($this->gameOfLife->willLive($this->livingCell));
    }

    public function testWillCellNotDieIfTwoNeighboursAlive(): void
    {
        $this->giveLifeTo(['9.9', '9.10']);
        $this->assertTrue($this->gameOfLife->willLive($this->livingCell));
    }

    public function testWillLivingCellNotDieIfThreeNeighboursAlive(): void
    {
        $this->giveLifeTo(['9.9', '9.10', '9.11']);
        $this->assertTrue($this->gameOfLife->willLive($this->livingCell));
    }

    public function testWillLivingCellDieIfFourNeighboursAlive(): void
    {
        $this->giveLifeTo(['9.9', '9.10', '9.11', '10.9']);
        $this->assertFalse($this->gameOfLife->willLive($this->livingCell));
    }

    public function testWillDeadCellStayDeadIfNoNeighboursAlive(): void
    {
        $this->assertFalse($this->gameOfLife->willLive($this->deadCell));
    }

    public function testWillDeadCellBecomeAliveIfThreeNeighboursAlive(): void
    {
        $this->giveLifeTo(['0.0', '0.1', '0.2']);
        $this->assertTrue($this->gameOfLife->willLive($this->deadCell));
    }

    public function testWillDeadCellStayDeadIfFourNeighboursAlive(): void
    {
        $this->giveLifeTo(['0.0', '0.1', '0.2', '1.0']);
        $this->assertFalse($this->gameOfLife->willLive($this->deadCell));
    }

    public function testIsLivingCellDeadInNextGenIfNoNeighboursAlive(): void
    {
        $this->gameOfLife->generateNextGeneration();
        $this->assertFalse($this->gameOfLife->isAlive($this->livingCell));
    }

    public function testIsLivingCellAliveInNextGenIfTwoNeighboursAlive(): void
    {
        $this->giveLifeTo(['9.9', '9.10']);
        $this->gameOfLife->generateNextGeneration();
        $this->assertTrue($this->gameOfLife->isAlive($this->livingCell));
    }

    public function testIsLivingCellDeadInNextGenIfFourNeighboursAlive(): void
    {
        $this->giveLifeTo(['9.9', '9.10', '9.11', '10.9']);
        $this->gameOfLife->generateNextGeneration();
        $this->assertFalse($this->gameOfLife->isAlive($this->livingCell));
    }

    public function testAreTwoLivingCellsDeadInNextIfFourNeighboursAlive(): void
    {
        $newCell = '20.20';
        $this->giveLifeTo(['9.9', '9.10', '9.11', '10.9']);
        $this->giveLifeTo(['19.19', '19.20', '19.21', '20.19', $newCell]);
        $this->gameOfLife->generateNextGeneration();

        $this->assertFalse($this->gameOfLife->isAlive($this->livingCell));
        $this->assertFalse($this->gameOfLife->isAlive($newCell));
    }

    public function testIsDeadCellAliveInNextGenIfThreeNeighboursAlive(): void
    {
        $this->giveLifeTo(['0.0', '0.1', '0.2']);
        $this->gameOfLife->generateNextGeneration();
        $this->assertTrue($this->gameOfLife->isAlive($this->deadCell));
    }

}

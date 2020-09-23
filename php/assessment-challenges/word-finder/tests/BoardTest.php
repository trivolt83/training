<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BoardTest extends TestCase
{
    protected $board;

    protected function setUp(): void
    {
        $this->board = new Board(
            [
                ['A','B','C','E'],
                ['S','F','C','S'],
                ['A','D','E','E'],
                ['D','A','G','T'],
            ]
        );
    }

    /**
     * @dataProvider boardValueProvider
     */
    public function testExistsOnGrid($word, $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->board->ExistsOnGrid($word)
        );
    }

    public function boardValueProvider()
    {
        return [
            ['ABCCED', true],
            ['SEE', true],
            ['ABCB', false],
            ['XAAA', false],
            ['SEEF', false],
            ['ABCCEDAD', true],
            ['ASADFBA', false]
        ];
    }
}

<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PascalsTriangleTest extends TestCase
{
    protected $triangle;

    protected function setUp(): void
    {
        $this->triangle = new PascalsTriangle;
    }

    /**
     * @dataProvider factorialNumberProvider
     */
    public function testGetFactorialNumber($input, $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->triangle->getFactorialNumber($input)
        );
    }

    public function factorialNumberProvider()
    {
        return [
            [0, 1],
            [5, 120],
            [10, 3628800]
        ];
    }

    /**
     * @dataProvider pascalNumberProvider
     */
    public function testGetPascalNumber($row, $col, $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->triangle->getPascalNumber($row, $col)
        );
    }

    public function pascalNumberProvider()
    {
        return [
            [0, 0, 1],
            [4, 2, 6],
            [10, 5, 252]
        ];
    }

    public function testGetTriangle(): void
    {
        $expected = [];
        $this->assertEquals($expected, $this->triangle->getTriangle(0));

        $expected = [
                  [1],
                 [1,1],
                [1,2,1],
               [1,3,3,1],
              [1,4,6,4,1],
            [1,5,10,10,5,1]
        ];
        $this->assertEquals($expected, $this->triangle->getTriangle(6));
    }
}

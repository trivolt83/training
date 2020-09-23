<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FizzBuzzerTest extends TestCase
{
    protected $fizzBuzzer;

    protected function setUp(): void
    {
        $this->fizzBuzzer = new FizzBuzzer;
    }

    /**
     * @dataProvider fizzBuzzValueProvider
     */
    public function testGetFizzBuzzValue($input, $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->fizzBuzzer->getFizzBuzzValue($input)
        );
    }

    public function fizzBuzzValueProvider()
    {
        return [
            [ 1, '1'],
            [ 2, '2'],
            [ 3, FizzBuzzer::FIZZ],
            [ 4, '4'],
            [ 5, FizzBuzzer::BUZZ],
            [ 6, FizzBuzzer::FIZZ],
            [ 7, '7'],
            [ 8, '8'],
            [ 9, FizzBuzzer::FIZZ],
            [10, FizzBuzzer::BUZZ],
            [11, '11'],
            [12, FizzBuzzer::FIZZ],
            [13, '13'],
            [14, '14'],
            [15, FizzBuzzer::FIZZ.FizzBuzzer::BUZZ],
            [16, '16']
        ];
    }
}

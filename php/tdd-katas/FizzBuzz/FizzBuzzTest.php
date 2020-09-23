<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    private $fizzBuzz;

    protected function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz;
    }

    public function testCanCreateInstanceOfFizzBuzz(): void
    {
        $this->assertInstanceOf(
           FizzBuzz::class,
           $this->fizzBuzz
       );
    }

    public function testCanGetEmptyListOfValues(): void
    {
        $this->assertEquals([], $this->fizzBuzz->getvalues(0));
    }

    public function testCanGetListOfValues(): void
    {
        $this->assertEquals([1,2,3], $this->fizzBuzz->getvalues(3));
        $this->assertEquals([1,2,3,4], $this->fizzBuzz->getvalues(4));
    }

    public function testIsCommaSeparatedString(): void
    {
        $this->assertEquals('1,2,3', $this->fizzBuzz->getFormattedValues([1,2,3]));
        $this->assertEquals('1,2,3,4', $this->fizzBuzz->getFormattedValues([1,2,3,4]));
    }

    public function testIsNotFizz(): void
    {
        $this->assertNotEquals('Fizz', $this->fizzBuzz->getFizzBuzz(1));
    }

    public function testIsFizz(): void
    {
        $this->assertEquals('Fizz', $this->fizzBuzz->getFizzBuzz(3));
    }

    public function testIsBuzz(): void
    {
        $this->assertEquals('Buzz', $this->fizzBuzz->getFizzBuzz(5));
    }

    public function testIsFizzBuzz(): void
    {
        $this->assertEquals('FizzBuzz', $this->fizzBuzz->getFizzBuzz(15));
    }

    public function testIsFizzBuzzString(): void
    {
        $this->assertEquals('1,2,Fizz,4,Buzz,Fizz,7,8,Fizz,Buzz,11,Fizz,13,14,FizzBuzz', $this->fizzBuzz->getFizzBuzzString(15));
    }

    public function testIsOneNotDivisbleByTree(): void
    {
        $this->assertFalse($this->fizzBuzz->NumberDivisbleBy(1,3));
    }

    public function testIsTreeDivisbleByTree(): void
    {
        $this->assertTrue($this->fizzBuzz->NumberDivisbleBy(3,3));
    }

    public function testIsFiveNotDivisbleByFive(): void
    {
        $this->assertTrue($this->fizzBuzz->NumberDivisbleBy(5,5));
    }

    public function testIsFifteenDivisbleByThree(): void
    {
        $this->assertTrue($this->fizzBuzz->NumberDivisbleBy(15,3));
    }

    public function testIsFifteenDivisbleByFive(): void
    {
        $this->assertTrue($this->fizzBuzz->NumberDivisbleBy(15,5));
    }


}

<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FizzBuzzOCPTest extends TestCase
{
    private $fizzBuzzOCP;

    protected function setUp(): void
    {
        $rules = [
            new BuzzBazzRule(),
            new FizzBazzRule(),
            new FizzBuzzRule(),
            new BazzRule(),
            new BuzzRule(),
            new FizzRule(),
        ];
        $this->fizzBuzzOCP = new FizzBuzzOCP($rules);
    }

    public function testCanCreateInstanceOfFizzBuzzOCP(): void
    {
        $this->assertInstanceOf(
           FizzBuzzOCP::class,
           $this->fizzBuzzOCP
       );
    }

    public function testCanGenerateEmptyString(): void
    {
        $this->assertEquals('', $this->fizzBuzzOCP->generateString(0));
    }

    public function testCanGenerateStringOf100(): void
    {
        $this->assertEquals(
            100,
            count(explode(",", $this->fizzBuzzOCP->generateString(100)))
        );
    }

    public function testIsOneSubstitutedWithOne(): void
    {
        $this->assertEquals(1, $this->fizzBuzzOCP->getSubstitute(1));
    }

    public function testIsThreeSubstitutedWithFizz(): void
    {
        $this->assertEquals('Fizz', $this->fizzBuzzOCP->getSubstitute(3));
    }

    public function testIsStringOfThreeCorrect(): void
    {
        $this->assertEquals(
            '1,2,Fizz',
            $this->fizzBuzzOCP->generateString(3)
        );
    }

    public function testIsFiveSubstitutedWithBuzz(): void
    {
        $this->assertEquals('Buzz', $this->fizzBuzzOCP->getSubstitute(5));
    }

    public function testIsStringOfFiveCorrect(): void
    {
        $this->assertEquals(
            '1,2,Fizz,4,Buzz',
            $this->fizzBuzzOCP->generateString(5)
        );
    }

    public function testIsSixSubstitutedWithFizz(): void
    {
        $this->assertEquals('Fizz', $this->fizzBuzzOCP->getSubstitute(6));
    }

    public function testIsTenSubstitutedWithBuzz(): void
    {
        $this->assertEquals('Buzz', $this->fizzBuzzOCP->getSubstitute(10));
    }

    public function testIsFivTeenSubstitutedWithFizzBuzz(): void
    {
        $this->assertEquals('FizzBuzz', $this->fizzBuzzOCP->getSubstitute(15));
    }

    public function testIsSevenSubstitutedWithBazz(): void
    {
        $this->assertEquals('Bazz', $this->fizzBuzzOCP->getSubstitute(7));
    }

    public function testIsTwentyOneSubstitutedWithFizzBazz(): void
    {
        $this->assertEquals('FizzBazz', $this->fizzBuzzOCP->getSubstitute(21));
    }

    public function testIsThiryFiveSubstitutedWithBuzzBazz(): void
    {
        $this->assertEquals('BuzzBazz', $this->fizzBuzzOCP->getSubstitute(35));
    }
}

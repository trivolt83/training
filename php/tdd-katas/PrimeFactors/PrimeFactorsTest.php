<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    private $primeFactors;

    protected function setUp(): void
    {
        $this->primeFactors = new PrimeFactors();
    }

    public function testCanCreateInstanceOfPrimeFactors(): void
    {
        $this->assertInstanceOf(
           PrimeFactors::class,
           $this->primeFactors
       );
    }

    public function testOne(): void
    {
        $this->assertEquals([], $this->primeFactors->getPrimeFactors(1));
    }

    public function testTwo(): void
    {
        $this->assertEquals([2], $this->primeFactors->getPrimeFactors (2));
    }

    public function testThree(): void
    {
        $this->assertEquals([3], $this->primeFactors->getPrimeFactors (3));
    }

    public function testFour(): void
    {
        $this->assertEquals([2, 2], $this->primeFactors->getPrimeFactors (4));
    }

    public function testEight(): void
    {
        $this->assertEquals([2, 2, 2], $this->primeFactors->getPrimeFactors (8));
    }

    public function testNine(): void
    {
        $this->assertEquals([3, 3], $this->primeFactors->getPrimeFactors (9));
    }

    public function testSixty(): void
    {
        $this->assertEquals([2, 2, 3, 5], $this->primeFactors->getPrimeFactors (60));
    }
}

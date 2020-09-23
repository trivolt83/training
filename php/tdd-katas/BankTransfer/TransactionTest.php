<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TransactionTest extends TestCase
{
    private $sourceAccountNumber = 1;
    private $targetAccountNumber = 2;
    private $firstTransaction;
    private $secondTransaction;

    public function setUp(): void
    {
        $this->firstTransaction = new Transaction(
            $this->sourceAccountNumber,
            $this->targetAccountNumber,
            100
        );
        $this->secondTransaction = new Transaction(
            $this->targetAccountNumber,
            $this->sourceAccountNumber,
            200
        );
    }

    public function testCanCreateInstance(): void
    {
        $this->assertInstanceOf(
            Transaction::class,
            $this->firstTransaction
       );
    }

    public function testZeroAmount(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Transaction(
            $this->sourceAccountNumber,
            $this->targetAccountNumber,
            0
        );
    }

    public function testGetAmountFromFirstTransaction(): void
    {
        $this->assertEquals(100, $this->firstTransaction->getAmount());
    }

    public function testGetAmountFromSecondTransaction(): void
    {
        $this->assertEquals(200, $this->secondTransaction->getAmount());
    }

    public function testZeroPayerAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Transaction(
            0,
            $this->targetAccountNumber,
            100
        );
    }

    public function testNegativePayerAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Transaction(
            -1,
            $this->targetAccountNumber,
            100
        );
    }

    public function testZeroPayeeAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Transaction(
            $this->sourceAccountNumber,
            0,
            100
        );
    }

    public function testNegativePayeeAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Transaction(
            $this->sourceAccountNumber,
            -1,
            100
        );
    }

    public function testGetPayerAccountNumberFromFirstTransaction(): void
    {
        $this->assertEquals(
            $this->sourceAccountNumber,
            $this->firstTransaction->getSourceAccountNumber()
        );
    }

    public function testGetPayerAccountNumberFromSecondTransaction(): void
    {
        $this->assertEquals(
            $this->targetAccountNumber,
            $this->secondTransaction->getSourceAccountNumber()
        );
    }

    public function testGetPayeeAccountNumberFromFirstTransaction(): void
    {
        $this->assertEquals(
            $this->targetAccountNumber,
            $this->firstTransaction->getTargetAccountNumber()
        );
    }

    public function testGetPayeeAccountNumberFromSecondTransaction(): void
    {
        $this->assertEquals(
            $this->sourceAccountNumber,
            $this->secondTransaction->getTargetAccountNumber()
        );
    }

}

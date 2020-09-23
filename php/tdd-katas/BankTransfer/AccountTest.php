<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AccountTest extends TestCase
{
    private $payerAccount;
    private $payerAccountNumber = 1;
    private $payeeAccount;
    private $payeeAccountNumber = 2;
    private $thirdAccount;
    private $firstTransactionToPayee;
    private $firstTransactionFromPayer;
    private $secondTransactionToPayee;
    private $secondTransactionFromPayer;

    public function setUp(): void
    {
        $transactionFilters = [
            FromAccountFilter::getCode() => new FromAccountFilter(),
            ToAccountFilter::getCode() => new ToAccountFilter(),
            AmountFilter::getCode() => new AmountFilter(),
        ];

        $this->payerAccount = new Account(
            $this->payerAccountNumber,
            $transactionFilters
        );
        $this->payeeAccount = new Account(
            $this->payeeAccountNumber,
            $transactionFilters
        );
        $this->thirdAccount = new Account(3, $transactionFilters);

        $this->firstTransactionToPayee = $this->createTransaction(-100);
        $this->firstTransactionFromPayer = $this->createTransaction(100);
        $this->secondTransactionToPayee = $this->createTransaction(-200);
        $this->secondTransactionFromPayer = $this->createTransaction(200);
    }

    private function createTransaction(int $amount): Transaction
    {
        return new Transaction(
            $this->payerAccountNumber,
            $this->payeeAccountNumber,
            $amount
        );
    }

    public function testCanCreateInstance(): void
    {
        $this->assertInstanceOf(
           Account::class,
           $this->payerAccount
       );
    }

    public function testZeroPayerAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Account(0, []);
    }

    public function testNegativePayerAccountNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $transaction = new Account(-1, []);
    }

    public function testGetEmptyBalance(): void
    {
        $this->assertEquals(0, $this->payerAccount->getBalance());
    }

    public function testAdddingAmountToBalance(): void
    {
        $this->payeeAccount->addToBalance(100, $this->payerAccount);
        $this->assertEquals(100, $this->payeeAccount->getBalance());
    }

    public function testRemovingAmountFromBalance(): void
    {
        $this->payerAccount->RemoveFromBalance(100, $this->payeeAccount);
        $this->assertEquals(-100, $this->payerAccount->getBalance());
    }

    public function testTransferAmount(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->assertEquals(-100, $this->payerAccount->getBalance());
        $this->assertEquals(100, $this->payeeAccount->getBalance());
    }

    public function testGetAccountNumberFromPayerAccount(): void
    {
        $this->assertEquals(
            $this->payerAccountNumber,
            $this->payerAccount->getAccountNumber()
        );
    }

    public function testGetAccountNumberFromPayeeAccount(): void
    {
        $this->assertEquals(
            $this->payeeAccountNumber,
            $this->payeeAccount->getAccountNumber()
        );
    }

    public function testGetEmptyTransactionHistory(): void
    {
        $this->assertEquals([], $this->payerAccount->getTransactions());
    }

    public function testGetOneTransactionFromPayer(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);

        $this->assertEquals(
            [$this->firstTransactionToPayee],
            $this->payerAccount->getTransactions()
        );
    }

    public function testGetTwoTransactionsFromPayer(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(200, $this->payeeAccount);

        $this->assertEquals(
            [$this->firstTransactionToPayee, $this->secondTransactionToPayee],
            $this->payerAccount->getTransactions()
        );
    }

    public function testGetOneTransactionFromPayee(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);

        $this->assertEquals(
            [$this->firstTransactionFromPayer],
            $this->payeeAccount->getTransactions()
        );
    }

    public function testGetTwoTransactionsFromPayee(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(200, $this->payeeAccount);

        $this->assertEquals(
            [$this->firstTransactionFromPayer, $this->secondTransactionFromPayer],
            $this->payeeAccount->getTransactions()
        );
    }

    public function testGetEmptyTransactionHistoryUsingInvalidFilter(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->getTransactions(['foobar' => 1]);
    }


    public function testGetOneTransactionToSpecificAccount(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(100, $this->thirdAccount);

        $this->assertEquals(
            [$this->firstTransactionToPayee],
            $this->payerAccount->getTransactions(
                ['to' => $this->payeeAccountNumber]
            )
        );
    }

    public function testGetTwoTransactionsToSpecificAccount(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(200, $this->payeeAccount);
        $this->payerAccount->transferTo(100, $this->thirdAccount);

        $this->assertEquals(
            [$this->firstTransactionToPayee, $this->secondTransactionToPayee],
            $this->payerAccount->getTransactions(
                ['to' => $this->payeeAccountNumber]
            )
        );
    }

    public function testGetOneTransactionFromSpecificAccount(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(100, $this->thirdAccount);

        $this->assertEquals(
            [$this->firstTransactionFromPayer],
            $this->payeeAccount->getTransactions(
                ['from' => $this->payerAccountNumber]
            )
        );
    }

    public function testGetTransactionWithSpecificAmount(): void
    {
        $this->payerAccount->transferTo(100, $this->payeeAccount);
        $this->payerAccount->transferTo(100, $this->thirdAccount);

        $this->assertEquals(
            [$this->firstTransactionFromPayer],
            $this->payeeAccount->getTransactions(
                ['amount' => 100]
            )
        );
    }
}

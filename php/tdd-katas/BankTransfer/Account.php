<?php
declare(strict_types=1);

class Account
{
    private $accountNumber;
    private $amount = 0;
    private $transactions = [];
    private $transactionFilters;

    public function __construct(int $accountNumber, array $filters)
    {
        if ($accountNumber < 1) {
            throw new InvalidArgumentException(
                "Invalid accountNumber: '$accountNumber'"
            );
        }
        $this->accountNumber = $accountNumber;
        $this->transactionFilters = $filters;
    }

    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    public function getBalance(): int
    {
        return $this->amount;
    }

    public function getTransactions(array $conditions = []): array
    {
        if ($conditions) {
            if (!$filters = array_intersect_key(
                $this->transactionFilters,
                $conditions)) {
                throw new InvalidArgumentException(
                    "Invalid filter(s): '"
                     . implode(",", array_keys($conditions))
                     . "'"
                );
            }

            $transactions = [];
            foreach ($this->transactions as $transaction) {
                foreach ($filters as $key => $filter) {
                    if ($filter->matches($transaction, $conditions[$key])) {
                        array_push($transactions, $transaction);
                    }
                }
            }

            return $transactions;
        }

        return $this->transactions;
    }

    public function addToBalance(int $amount, Account $from): void
    {
        $this->amount += $amount;
        $this->addTransaction($from, $this, $amount);
    }

    public function removeFromBalance(int $amount, Account $to): void
    {
        $this->amount -= $amount;
        $this->addTransaction($this, $to, (-1 * $amount));
    }

    public function transferTo(int $amount, Account $toAccount): void
    {
        $this->removeFromBalance($amount, $toAccount);
        $toAccount->addToBalance($amount, $this);
    }

    public function addTransaction(
        Account $fromAccount,
        Account $toAccount,
        int $amount
    ): void {
        $transaction = new Transaction(
            $fromAccount->getAccountNumber(),
            $toAccount->getAccountNumber(),
            $amount
        );
        array_push($this->transactions, $transaction);
    }
}

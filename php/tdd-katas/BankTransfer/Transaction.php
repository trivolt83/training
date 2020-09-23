<?php
declare(strict_types=1);

class Transaction
{
    private $sourceAccountNumber;
    private $targetAccountNumber;
    private $amount;

    public function __construct(
        int $sourceAccountNumber,
        int $targetAccountNumber,
        int $amount
    ) {
        $input = array($sourceAccountNumber, $targetAccountNumber);
        foreach($input as $key => $value) {
            if ($value < 1 ) {
                throw new InvalidArgumentException("Invalid $key: '$value'");
            }
        }
        if ($amount === 0 ) {
            throw new InvalidArgumentException("Invalid amount: '$amount'");
        }

        $this->sourceAccountNumber = $sourceAccountNumber;
        $this->targetAccountNumber = $targetAccountNumber;
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getSourceAccountNumber(): int
    {
        return $this->sourceAccountNumber;
    }

    public function getTargetAccountNumber(): int
    {
        return $this->targetAccountNumber;
    }
}

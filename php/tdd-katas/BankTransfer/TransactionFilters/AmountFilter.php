<?php
declare(strict_types=1);

class AmountFilter implements FilterInterface
{
    public static function getCode(): string
    {
        return 'amount';
    }

    public function matches(Transaction $transaction, int $value): bool
    {
        return ($transaction->getAmount() === $value);
    }
}

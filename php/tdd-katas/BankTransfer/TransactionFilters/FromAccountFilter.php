<?php
declare(strict_types=1);

class FromAccountFilter implements FilterInterface
{
    public static function getCode(): string
    {
        return 'from';
    }

    public function matches(Transaction $transaction, int $value): bool
    {
        return ($transaction->getSourceAccountNumber() === $value);
    }
}

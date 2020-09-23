<?php
declare(strict_types=1);

class ToAccountFilter implements FilterInterface
{
    public static function getCode(): string
    {
        return 'to';
    }

    public function matches(Transaction $transaction, int $value): bool
    {
        return ($transaction->getTargetAccountNumber() === $value);
    }
}

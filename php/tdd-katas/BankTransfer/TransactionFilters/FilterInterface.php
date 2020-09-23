<?php
interface FilterInterface
{
    public static function getCode(): string;
    public function matches(Transaction $transaction, int $value): bool;
}

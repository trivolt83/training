<?php
declare(strict_types=1);

class FizzBazzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 3 === 0 && $number % 7 === 0);
    }
    public function getReplacement(): string
    {
        return 'FizzBazz';
    }
}

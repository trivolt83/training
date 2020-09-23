<?php
declare(strict_types=1);

class FizzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 3 === 0);
    }
    public function getReplacement(): string
    {
        return 'Fizz';
    }
}

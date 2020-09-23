<?php
declare(strict_types=1);

class FizzBuzzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 3 === 0 && $number % 5 === 0);
    }
    public function getReplacement(): string
    {
        return 'FizzBuzz';
    }
}

<?php
declare(strict_types=1);

class BuzzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 5 === 0);
    }
    public function getReplacement(): string
    {
        return 'Buzz';
    }
}

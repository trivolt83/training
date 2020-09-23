<?php
declare(strict_types=1);

class BuzzBazzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 5 === 0 && $number % 7 === 0);
    }
    public function getReplacement(): string
    {
        return 'BuzzBazz';
    }
}

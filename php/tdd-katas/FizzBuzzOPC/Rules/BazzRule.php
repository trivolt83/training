<?php
declare(strict_types=1);

class BazzRule implements RuleInterface
{
    public function matches(int $number): bool
    {
        return ($number % 7 === 0);
    }
    public function getReplacement(): string
    {
        return 'Bazz';
    }
}

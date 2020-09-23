<?php
declare(strict_types=1);

class FizzBuzzOCP
{
    private $rules;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
    }

    public function generateString(int $limit): string
    {
        $out = [];
        for ($i = 1; $i <= $limit; $i++) {
            array_push($out, $this->getSubstitute($i));
        }
        return implode(',', $out);
    }

    public function getSubstitute(int $number): string
    {
        foreach ($this->rules as $rule) {
            if ($rule->matches($number)) {
                return $rule->getReplacement();
            }
        }

        return strval($number);
    }
}

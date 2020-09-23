<?php
declare(strict_types=1);

class FizzBuzz
{
    public function getValues(int $amount): array
    {
        $list = [];
        for ($i=1; $i <= $amount; $i++) {
            array_push($list, $i);
        }
        return $list;
    }

    public function getFormattedValues(array $values): string
    {
        return implode (",", $values);
    }

    public function getFizzBuzz(int $number): string
    {
        $res = strval($number);
        if ($this->numberDivisbleBy($number, 3)) {
            $res = 'Fizz';
        }
        if ($this->numberDivisbleBy($number, 5)) {
            $res = 'Buzz';
        }
        if ($this->numberDivisbleBy($number, 15)) {
            $res = 'FizzBuzz';
        }
        return $res;
    }

    public function getFizzBuzzString(int $amount): string
    {
        $values = [];
        foreach ($this->getValues($amount) as $value) {
             array_push ($values, $this->getFizzBuzz($value));
        }
        return $this->getFormattedValues($values);
    }

    public function numberDivisbleBy(int $number, $divisor): bool
    {
        return $number % $divisor === 0;
    }
}

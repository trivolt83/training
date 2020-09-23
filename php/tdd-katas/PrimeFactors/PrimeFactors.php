<?php
declare(strict_types=1);

class PrimeFactors
{
    public function getPrimeFactors(int $n): array
    {
        $primes = [];
        for ($candidate = 2; $n > 1; $candidate++) {
            for (; $n % $candidate === 0; $n /= $candidate) {
                array_push($primes, $candidate);
            }
        }
        return $primes;
    }
}

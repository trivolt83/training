<?php
declare(strict_types=1);

/**
 * FizzBuzzer is a simple class for getting the 'FizzBuzz' value
 */
class FizzBuzzer
{
    const FIZZ = 'Fizz';
    const BUZZ = 'Buzz';

    /**
     * Get the 'FizzBuzz' value for $number
     *
     * If $number can be devided into 3, 'Fizz' will be returned.
     * If $number can be devided into 5, 'Buzz' will be returned.
     * If $number can be devided into 3 and 5, 'FizzBuzz' will be returned.
     * If $number cannot be devided in either 3 or 5,
     * $number (as string) will be returned
     *
     * @param  int $rows
     * @return string
     */
    public function getFizzBuzzValue(int $number): string
    {
        $output = '';
        if ($number %3 === 0) {
            $output = self::FIZZ;
        }
        if ($number %5 === 0) {
            $output .= self::BUZZ;
        }
        if (!$output) {
            $output = (string)$number;
        }

        return $output;
    }
}

<?php
declare(strict_types=1);

/**
 * PascalsTriangle is a simple class for calculation Pascals Triangle
 *
 */
class PascalsTriangle
{
    /**
     * Get Pascals triangle for given rows
     *
     * @param  int $rows
     * @return array
     */
    public function getTriangle(int $rows): array
    {
        $triangle = [];
        for ($row = 0; $row < $rows; $row++) {
            for ($col = 0; $col <= $row; $col++) {
                $triangle[$row][$col] = $this->getPascalNumber($row, $col);
            }
        }
        return $triangle;
    }

    /**
     * Calculate value for a given row and column in Pascals triangle
     *
     * n! / k!(n − k)!
     * See also http://www.geometer.org/mathcircles/pascal.pdf
     *
     * @param  int $row
     * @param  int $col
     * @return int
     */
    public function getPascalNumber (int $row, int $col): int
    {
        return $this->getFactorialNumber($row) / ($this->getFactorialNumber($col) * $this->getFactorialNumber($row - $col));
    }

    /**
     * Calculate factorial (number!) of number.
     *
     * Uses a simple loop, as GMP support is not installed.
     * Also according to https://www.php.net/manual/en/function.gmp-fact.php
     * the simple loop is faster
     *
     * @param  int $number
     * @return int
     */
    public function getFactorialNumber(int $number): int
    {
        $fact = 1;
        while ($number >= 1) {
            $fact = $number * $fact;
            $number--;
        }
        return $fact;
    }
}

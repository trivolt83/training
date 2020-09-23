<?php

declare(strict_types=1);

/**
 * Simple formatter for Pascal's Triangle
 *
 */
class Formatter
{
    /**
     * Format the given triangle for output
     *
     * Will calculate the number of spaces between the values to keep output
     * as a triangle when printed
     *
     * @param  array  $triangle
     * @return string
     */
    public function formatTriangle(array $triangle): string
    {
        if (empty($triangle) || empty($triangle[0])) {
            return '';
        }

        $output = '';
        $maxChars = strlen((string)max(max($triangle)));
        $tabSpace = str_repeat(' ', $maxChars);
        $totalRows = count($triangle);

        foreach ($triangle as $rowNum => $row) {
            $output .= str_repeat($tabSpace, ($totalRows - $rowNum - 1));

            foreach ($row as $key => $value) {
                if ($key !== array_key_first($row)) {
                    $output .= $tabSpace;
                    $output .= str_repeat(' ', $maxChars - strlen((string)$value));
                }

                $output .= $value;
            }
            $output .= "\n";
        }

        return $output;
    }
}

<?php

declare(strict_types=1);

/**
 * Board class, containing a 2D grid with letters
 */
class Board
{
    public $grid;
    public $cells;

    /**
     * class constructor
     * @param array $grid
     */
    public function __construct(array $grid) {
        $this->grid = $grid;

        // build a lookup array with 'starting' characters
        foreach ($grid as $row => $line) {
            foreach ($line as $col => $value) {
                $this->cells[$value][] = array($row, $col);
            }
        }
    }

    /**
     * Check if given word exists on the grid
     * @param  string $word [description]
     * @return bool         [description]
     */
    public function ExistsOnGrid(string $word): bool
    {
        $chars = str_split($word);
        $nextChar = array_shift($chars);

        if (array_key_exists($nextChar, $this->cells)) {
            foreach ($this->cells[$nextChar] as $cell) {
                if ($this->charsAreAdjacent(
                    $cell[0],
                    $cell[1],
                    $chars,
                    []
                )){
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check recursively if all chars are adjacent to given $row and $col
     * @param  int   $row
     * @param  int   $col
     * @param  array $chars
     * @param  array $path
     * @return bool
     */
    public function charsAreAdjacent(
        int $row,
        int $col,
        array $chars,
        array $path
    ): bool {
        if (empty($chars)) {
            return true;
        }

        $path[] = "$row-$col";
        $nextChar = array_shift($chars);

        foreach ($this->getAdjacentCoords($row, $col) as $coords) {
            if ($this->isAdjacentCellValid(
                $coords[0],
                $coords[1],
                $nextChar,
                $path
            )) {
                return $this->charsAreAdjacent(
                    $coords[0],
                    $coords[1],
                    $chars,
                    $path
                );
            }
        }

        return false;
    }

    /**
     * Check if adjacent cell is valid
     * @param  int   $row
     * @param  int   $col
     * @param  string $char
     * @param  array $path
     * @return bool
     */
    public function isAdjacentCellValid(
        int $row,
        int $col,
        string $char,
        array $path
    ): bool {
        if ($row >= 0
            && $col >= 0 
            && $row < count($this->grid)
            && $col < count($this->grid[$row])
            && $this->grid[$row][$col] === $char
            && (!in_array("$row-$col", $path))
        ){
            return true;
        }
        return false;
    }

    /**
     * Get the 4 coordinates arount given $row and $col
     * @param  int   $row
     * @param  int   $col
     * @return array
     */
    public function getAdjacentCoords(int $row, int $col): array
    {
        return [
            [$row, $col+1], // right
            [$row+1, $col], // down
            [$row, $col-1], // left
            [$row-1, $col]  // up
        ];
    }
}

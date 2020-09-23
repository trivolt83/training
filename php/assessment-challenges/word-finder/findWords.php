<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

$board = new Board(
    [
        ['A','B','C','E'],
        ['S','F','C','S'],
        ['A','D','E','E']
    ]
);

$words = array(
    'ABCCED', // true
    'SEE', // true
    'ABCB' // false
);

foreach ($words as $word) {
    echo "$word is "
        . ($board->ExistsOnGrid($word) ? "" : "not ")
        . "on the board\n";
}

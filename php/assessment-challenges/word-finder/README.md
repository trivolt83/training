# Word finder

Given a 2D board and a word, find if the word exists in the grid.

The word can be constructed from letters of sequentially adjacent cell, where "adjacent" cells are those horizontally or vertically neighboring. The same letter cell may not be used more than once.

Example:

board =
[
  ['A','B','C','E'],
  ['S','F','C','S'],
  ['A','D','E','E']
]

Given word = "ABCCED", return true.
Given word = "SEE", return true.
Given word = "ABCB", return false.

## Usage

Print list using the following command:

```bash
php assessment-challenges/word-finder/findWords.php
```

## Tests

Run unit tests without code coverage using the following command:

```bash
./vendor/bin/phpunit --no-coverage
```

If you want code coverage, enable xdebug first and then run the unit tests:

```bash
enable_xdebug
./vendor/bin/phpunit
disable_xdebug
```

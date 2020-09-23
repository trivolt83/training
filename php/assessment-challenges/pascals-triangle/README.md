# Pascal's Triangle

In Pascal's Triangle each number is computed by adding the numbers
to the right and left of the current position in the previous row.

              1
            1   1
          1   2   1
        1   3   3   1
      1   4   6   4   1
    1   5  10  10   5   1

## Task

* Create a program that prints Pascal's triangle up to a given number of rows.
* Use a function for calculating the value for a given row and column.

## Usage

Print triangle of [rows] using the following command:

```bash
php assessment-challenges/pascals-triangle/printTriangle.php [rows]
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

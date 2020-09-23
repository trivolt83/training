# Fizz Buzz

Write a program that prints the numbers from 1 to a given number. But for multiples of three print "Fizz" instead of the number and for the multiples of five print "Buzz". For numbers which are multiples of both three and five print "FizzBuzz".

## Usage

Print numbers up to [rows] using the following command:

```bash
php assessment-challenges/fizzbuzz/fizzbuzz.php [rows]
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

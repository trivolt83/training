# FizzBuzz OCP Kata #

Write some code that will generate a string of integers, starting at 1 and going up to 100, all separated by commas.
* Substitute any integer which is divisible by 3 with "Fizz".
* Substitute any integer which is divisible by 5 with "Buzz".
* Substitute any integer divisible by 3 and 5 with "FizzBuzz".

Once the code is complete, add a new requirement:
* If a number is a multiple of 7, output Bazz.

Use 'Open/Closed principle' (OCP), the 'O' in the SOLID principle acronym

Using OCP, it should be rather easy to just add new requirements:
* For a multiple of 7 and 3, output FizzBazz.
* And for a multiple of 7 and 5, output BuzzBazz.

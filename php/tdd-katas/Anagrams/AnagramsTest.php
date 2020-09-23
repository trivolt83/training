<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class AnagramsTest extends TestCase
{
    private $anagrams;

    protected function setUp(): void
    {
        $this->anagrams = new Anagrams();
    }

    public function testCanCreateInstanceOfAnagrams(): void
    {
        $this->assertInstanceOf(
           Anagrams::class,
           $this->anagrams
       );
    }

    public function testIsEmptyAnagramOfEmpty(): void
    {
        $this->assertEquals([''], $this->anagrams->getAnagrams(''));
    }

    public function testIsOneLetterWordAnagramOfOneLetterWord(): void
    {
        $this->assertEquals(['a'], $this->anagrams->getAnagrams('a'));
    }

    public function testAreTwoWordsAnagramsOfTwoLetterWord(): void
    {
        $this->assertEquals(['ab', 'ba'], $this->anagrams->getAnagrams('ab'));
    }

    public function testAreThreeWordsAnagramsOfThreeLetterWord(): void
    {
        $this->assertEquals(
            ['abc', 'acb', 'bac', 'bca', 'cab', 'cba'],
            $this->anagrams->getAnagrams('abc')
        );
    }

    public function testAmountOfAnagrams(): void
    {
        $this->assertEquals(24, count($this->anagrams->getAnagrams('abcd')));
    }

}

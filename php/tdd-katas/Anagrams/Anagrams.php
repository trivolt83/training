<?php
declare(strict_types=1);

class Anagrams
{
    public function getAnagrams(string $word): array
    {
        if (($wordLength = strlen($word)) <= 1) {
            return [$word];
        }

        $anagrams = [];
        for ($x=0; $x < $wordLength; $x++) {
            $droppedCharacter = substr($word, $x, 1);
            $restAnagrams = $this->getAnagrams($this->dropCharacter($word, $x));
            foreach ($restAnagrams as $anagram) {
                array_push($anagrams, $droppedCharacter . $anagram);
            }
        }

        return $anagrams;
    }

    public function dropCharacter(string $word, int $index): string
    {
        $before = substr($word, 0, $index);
        $after = substr($word, $index + 1);
        return $before . $after;
    }
}

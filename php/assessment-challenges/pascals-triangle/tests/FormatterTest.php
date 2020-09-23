<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FormatterTest extends TestCase
{
    protected $formatter;

    protected function setUp(): void
    {
        $this->formatter = new Formatter;
    }

    public function testFormatTriangleWithoutTriangle(): void
    {
        $this->assertEquals('', $this->formatter->formatTriangle([]));
        $this->assertEquals('', $this->formatter->formatTriangle([[]]));
    }

    public function testFormatTriangleWithTriangle(): void
    {
        $triangle = [
               [1],
              [1,1],
             [1,2,1],
            [1,3,3,1]
        ];
        $expected =
            "   1\n" .
            "  1 1\n" .
            " 1 2 1\n" .
            "1 3 3 1\n";
        $this->assertEquals($expected, $this->formatter->formatTriangle($triangle));
    }
}

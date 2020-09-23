<?php
interface RuleInterface
{
  public function matches(int $number): bool;
  public function getReplacement(): string;
}

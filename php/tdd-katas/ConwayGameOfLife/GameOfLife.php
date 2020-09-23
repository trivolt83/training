<?php
declare(strict_types=1);

class GameOfLife
{
    private $population = [];

    public function getPopulation(): array
    {
        return $this->population;
    }

    public function isAlive(string $cell): bool
    {
        if (array_key_exists($cell, $this->population)) {
            return $this->population[$cell];
        }
        return false;
    }

    public function giveLifeTo(string $cell): self
    {
        $this->population[$cell] = true;
        return $this;
    }

    public function takeLifeFrom(string $cell): self
    {
        $this->population[$cell] = false;
        return $this;
    }

    public function getNeighboursFrom(string $cell): array
    {
        if (!preg_match("/^-?\d+\.-?\d+$/", $cell)) {
            throw new InvalidArgumentException("Invalid cell index: '$cell'");
        }

        $neighbours = [];
        list($iX, $iY) = array_map('intval', explode('.', $cell));

        for ($x = $iX-1; $x <= $iX+1; $x++) {
            for ($y = $iY-1; $y <= $iY+1; $y++) {
                if ($x === $iX && $y === $iY) {
                    continue;
                }

                $key = $x . '.' . $y;
                $neighbours[$key] = $this->isAlive($key);
            }
        }

        return $neighbours;
    }

    public function willLive(string $cell): bool
    {
        $livingNeighbours = array_sum($this->getNeighboursFrom($cell));

        if ($this->isAlive($cell)) {
            if ($livingNeighbours === 2 || $livingNeighbours === 3 ) {
                return true;
            }
        } elseif ($livingNeighbours === 3) {
            return true;
        }
        return false;
    }

    public function generateNextGeneration(): self
    {
        $next = [];

        foreach (array_keys($this->population) as $cell) {
            if ($this->willLive($cell)) {
                $next[$cell] = true;
            }

            foreach (array_keys($this->getNeighboursFrom($cell)) as $neighbour) {
                if ($this->willLive($neighbour)) {
                    $next[$neighbour] = true;
                }
            }
        }

        $this->population = $next;
        return $this;
    }
}

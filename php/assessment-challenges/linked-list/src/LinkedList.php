<?php

declare(strict_types=1);

// Linked list data structure
class LinkedList
{
    public $val;
    public $next = null;
    public function __construct($val) {
        $this->val = $val;
    }
}

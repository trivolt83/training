<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

// Current list: 1 -> 2 -> 3 -> null
$head = new LinkedList(1);
$head->next = new LinkedList(2);
$head->next->next = new LinkedList(3);

// Reversed to: 3 -> 2 -> 1 -> null
$reversedHead = Helper::reverse($head);
var_dump($reversedHead->val); // 3
var_dump($reversedHead->next->val); // 2
var_dump($reversedHead->next->next->val); // 1

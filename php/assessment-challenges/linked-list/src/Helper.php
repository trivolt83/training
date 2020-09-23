<?php

declare(strict_types=1);

/**
 * Helper class
 */
class Helper
{
    /**
     * Reverse linked list
     * @param  LinkedList $list
     * @return LinkedList
     */
    public static function reverse(LinkedList $list): LinkedList {
        $prev = null;
        $current = $list;
        $next = null;

        while ($current) {
            // store next
            $next = $current->next;

            // reverse pointer of current (point to previous)
            $current->next = $prev;

            // move to next
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }
}

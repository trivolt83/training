<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{
    protected $list;
    protected $helper;

    protected function setUp(): void
    {
        $this->list = new LinkedList(1);
        $this->helper = new Helper;
    }

    public function testListCanBeCreated(): void
    {
        $this->assertInstanceOf(
            LinkedList::class,
            $this->list
        );
        $this->assertEquals(
            1,
            $this->list->val
        );
    }

    public function testHelperCanBeCreated(): void
    {
        $this->assertInstanceOf(
            Helper::class,
            $this->helper
        );
    }

    /**
     * @dataProvider linkedListValueProvider
     */
    public function testReverse($list, $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->helper->reverse($list)
        );
    }

    public function linkedListValueProvider()
    {
        $list1 = new LinkedList(1);
        $reversed1 = new LinkedList(1);

        $list2 = new LinkedList(1);
        $list2->next = new LinkedList(2);
        $reversed2 = new LinkedList(2);
        $reversed2->next = new LinkedList(1);

        $list3 = new LinkedList(1);
        $list3->next = new LinkedList(2);
        $list3->next->next = new LinkedList(3);
        $reversed3 = new LinkedList(3);
        $reversed3->next = new LinkedList(2);
        $reversed3->next->next = new LinkedList(1);

        return [
            [$list1, $reversed1],
            [$list2, $reversed2],
            [$list3, $reversed3]
        ];
    }
}

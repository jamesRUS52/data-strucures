<?php


use MyDataStructure\MyStack;
use PHPUnit\Framework\TestCase;

class MyStackTest extends TestCase
{


    public function testPushPop()
    {
        $stack = new MyStack();
        $stack->push(1);
        $this->assertEquals(1, $stack->pop());
        $stack->push(2);
        $stack->push(3);
        $stack->push(4);
        $this->assertEquals(4, $stack->pop());
        $this->assertEquals(3, $stack->pop());
        $this->assertEquals(2, $stack->pop());
    }
}

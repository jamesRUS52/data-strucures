<?php


use MyDataStructure\MyQueue;
use PHPUnit\Framework\TestCase;

class MyQueueTest extends TestCase
{

    public function testPushPop()
    {
        $queue = new MyQueue();
        $queue->push(1);
        $this->assertEquals(1, $queue->pop());
        $queue->push(2);
        $queue->push(3);
        $queue->push(4);
        $this->assertEquals(2, $queue->pop());
        $this->assertEquals(3, $queue->pop());
        $this->assertEquals(4, $queue->pop());
    }
}

<?php

require_once 'vendor/autoload.php';

use MyDataStructure\MyList;
use MyDataStructure\MyListNode;
use MyDataStructure\MyQueue;
use MyDataStructure\MyStack;

$queue = new MyQueue();
print "Queue ".$queue.PHP_EOL;
print "Queue push 1".PHP_EOL;
$queue->push(1);
print "Queue push 2".PHP_EOL;
$queue->push(2);
print "Queue push 3".PHP_EOL;
$queue->push(3);
print "Queue push 4".PHP_EOL;
$queue->push(4);
print "Queue push 5".PHP_EOL;
$queue->push(5);
print "Queue ".$queue.PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue ".$queue.PHP_EOL;
print "Queue push 6".PHP_EOL;
$queue->push(6);
print "Queue push 7".PHP_EOL;
$queue->push(7);
print "Queue ".$queue.PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue ".$queue.PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue pop ".$queue->pop().PHP_EOL;
print "Queue ".$queue.PHP_EOL;

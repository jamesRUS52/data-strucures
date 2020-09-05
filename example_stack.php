<?php
require_once 'vendor/autoload.php';

use MyDataStructure\MyStack;

$stack = new MyStack();
print "Stack ".$stack.PHP_EOL;
print "Stack push 1".PHP_EOL;
$stack->push(1);
print "Stack push 2".PHP_EOL;
$stack->push(2);
print "Stack push 3".PHP_EOL;
$stack->push(3);
print "Stack push 4".PHP_EOL;
$stack->push(4);
print "Stack push 5".PHP_EOL;
$stack->push(5);
print "Stack ".$stack.PHP_EOL;
print "Stack pop ".$stack->pop().PHP_EOL;
print "Stack pop ".$stack->pop().PHP_EOL;
print "Stack ".$stack.PHP_EOL;
print "Stack push 6".PHP_EOL;
$stack->push(6);
print "Stack push 7".PHP_EOL;
$stack->push(7);
print "Stack ".$stack.PHP_EOL;
print "Stack pop ".$stack->pop().PHP_EOL;
print "Stack pop ".$stack->pop().PHP_EOL;
print "Stack pop ".$stack->pop().PHP_EOL;
print "Stack ".$stack.PHP_EOL;


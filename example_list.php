<?php
require_once 'vendor/autoload.php';


use MyDataStructure\MyList;

$list = new MyList();
print "List ".$list.PHP_EOL;
print "List push 1".PHP_EOL;
$list->push(1);
print "List push 2".PHP_EOL;
$list->push(2);
print "List push 3".PHP_EOL;
$list->push(3);
print "List ".$list.PHP_EOL;
print "List push 4".PHP_EOL;
$list->push(4);
print "List push 5".PHP_EOL;
$list->push(5);
print "List ".$list.PHP_EOL;
<?php
require 'vendor/autoload.php';

use MyDataStructure\MyBinaryTree;

$tree = new MyBinaryTree();
$three = $tree->add(3);
$nine = $tree->add(9, $three, MyBinaryTree::LEFT);
$twenty = $tree->add(20, $three, MyBinaryTree::RIGHT);
$fifteen = $tree->add(15, $twenty, MyBinaryTree::LEFT);
$seven = $tree->add(7, $twenty, MyBinaryTree::RIGHT);

print $tree.PHP_EOL;

$preorder = [3, 9, 20, 15, 7];
$inorder = [9, 3, 15, 20, 7];


$tree = MyBinaryTree::restoreTree($preorder, $inorder);
print $tree.PHP_EOL;
<?php


namespace MyDataStructure;


class MyBinarySearchTree extends MyTree
{
    /**
     * Добавление узла в дерево
     * @param $data
     * @param MyBinaryTreeNode|null $parent
     * @param string|null $direction
     */
    public function add($data, ?MyBinaryTreeNode $parent = null, ?string $direction = null) {
        $new_node = new MyBinaryTreeNode($data);
        if ($this->root === null) {
            $this->root = $new_node;
        } else {
            $this->insert($this->root, $new_node);
        }
    }

    /**
     * Поиск места для вставки узла в дерево
     * @param MyBinaryTreeNode $start_node
     * @param MyBinaryTreeNode $new_node
     */
    private function insert(MyBinaryTreeNode $start_node, MyBinaryTreeNode $new_node) {
        if ($new_node->getData() < $start_node->getData()) {
            if ($start_node->getLeft() === null) {
                $start_node->setLeft($new_node);
            } else {
                if ($new_node->getData() < $start_node->getLeft()->getData()) {
                    $this->insert($start_node->getLeft(), $new_node);
                } else {
                    if ($start_node->getLeft()->getRight() === null) {
                        $start_node->getLeft()->setRight($new_node);
                    } else {
                        $this->insert($start_node->getLeft()->getRight(), $new_node);
                    }
                }
            }
        } else {
            if ($start_node->getRight() === null) {
                $start_node->setRight($new_node);
            } else {
                if ($new_node->getData() >= $start_node->getRight()->getData()) {
                    $this->insert($start_node->getRight(), $new_node);
                } else {
                    if ($start_node->getRight()->getLeft() === null) {
                        $start_node->getRight()->setLeft($new_node);
                    } else {
                        $this->insert($start_node->getRight()->getLeft(), $new_node);
                    }
                }
            }
        }
    }




}
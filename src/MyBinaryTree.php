<?php


namespace MyDataStructure;


class MyBinaryTree
{
    private ?MyBinaryTreeNode $root = null;

    /**
     * Добавление узла в дерево
     * @param $data
     */
    public function add($data) {
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

    /**
     * Симметричный обход дерева
     * @return string
     */
    public function SymmetricOrder() : string {
        $output = "";
        $stack = new MyStack();
        $node = $this->root;
        while ($node !== null) {
            if ($node->getLeft() !== null) {
                $stack->push($node);
                $node = $node->getLeft();
            } else {
                $output .= $node->getData()." ";
                if ($stack->isEmpty() === false) {
                    $node = $stack->pop();
                    $output .= $node->getData()." ";
                    $node = $node->getRight();
                } else {
                    $node = $node->getRight();
                }
            }
        }
        return $output;
    }


    /**
     * Строковое отображение дерева
     * @return string
     */
    public function __toString():string {
        return $this->look($this->root, 0);
    }

    /**
     * Рекурсивная функция для печати дерева
     * @param MyBinaryTreeNode $node
     * @param int $level
     * @return string
     */
    private function look(MyBinaryTreeNode $node, int $level) {
        $output = "level ".$level.": ".$node->getData()." [parent = ".($node->getParent() !== null ? $node->getParent()->getData() : "")."]".PHP_EOL;
        $level++;
        if ($node->getLeft() !== null) {
            $output .= "left ".$this->look($node->getLeft(), $level);
        }
        if ($node->getRight() !== null) {
            $output .= "right ".$this->look($node->getRight(), $level);
        }
        return $output;
    }
}
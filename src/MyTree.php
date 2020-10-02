<?php


namespace MyDataStructure;


abstract class MyTree
{
    protected ?MyBinaryTreeNode $root = null;

    abstract public function add($data, ?MyBinaryTreeNode $parent, ?string $direction);

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
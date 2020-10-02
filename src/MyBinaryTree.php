<?php


namespace MyDataStructure;


class MyBinaryTree extends MyTree
{
    const LEFT = 'left';
    const RIGHT = 'right';

    /**
     * Добавление узла в дерево
     * @param $data
     * @param MyBinaryTreeNode|null $parent
     * @param string|null $direction
     * @return MyBinaryTreeNode
     */
    public function add($data, ?MyBinaryTreeNode $parent = null, ?string $direction = self::LEFT) : MyBinaryTreeNode {
        $new_node = new MyBinaryTreeNode($data);
        if ($this->root === null) {
            $this->root = $new_node;
        } else {
            $this->insert($parent, $new_node, $direction);
        }
        return $new_node;
    }

    /**
     * Поиск места для вставки узла в дерево
     * @param MyBinaryTreeNode $parent_node
     * @param MyBinaryTreeNode $new_node
     * @param $direction
     */
    private function insert(MyBinaryTreeNode $parent_node, MyBinaryTreeNode $new_node, $direction) {
        $stack = new MyStack();
        $node = $this->root;
        while ($node !== null) {
            if ($node->getLeft() !== null) {
                $stack->push($node);
                $node = $node->getLeft();
            } else {
                if ($node->getData() == $parent_node->getData()) {
                    if ($direction === self::LEFT) {
                        $parent_node->setLeft($new_node);
                    } else {
                        $parent_node->setRight($new_node);
                    }
                    $new_node->setParent($parent_node);
                }
                if ($stack->isEmpty() === false) {
                    $node = $stack->pop();
                    if ($node->getData() == $parent_node->getData()) {
                        if ($direction === self::LEFT) {
                            $parent_node->setLeft($new_node);
                        } else {
                            $parent_node->setRight($new_node);
                        }
                        $new_node->setParent($parent_node);
                    }
                    $node = $node->getRight();
                } else {
                    $node = $node->getRight();
                }
            }
        }
    }


    public static function restoreTree(array $preorder, array $inorder) : self {
        $tree = new self();
        $root = $tree->add($preorder[0]);

        $tree->splitInorder($root, $preorder, $inorder);

        return $tree;

    }

    private function splitInorder(MyBinaryTreeNode $root, array $preorder, array $inorder) {
        $root_idx = array_search($root->getData(), $inorder);
        $left_sub_tree = array_slice($inorder, 0, $root_idx);
        $right_sub_tree = array_slice($inorder, $root_idx+1, count($inorder)-$root_idx);

        if (count($left_sub_tree) === 1) {
            $this->add($left_sub_tree[0], $root, self::LEFT);
        } else {
            for ($i=$root_idx+1; $i < count($preorder); $i++) {
                if (in_array($preorder[$i], $left_sub_tree)) {
                    $new_root = $this->add($preorder[$i], $root, self::LEFT);
                    $this->splitInorder($new_root, $preorder, $left_sub_tree);
                    break;
                }
            }
        }

        if (count($right_sub_tree) === 1) {
            $this->add($right_sub_tree[0], $root, self::RIGHT);
        } else {
            for ($i=$root_idx+1; $i < count($preorder); $i++) {
                if (in_array($preorder[$i], $right_sub_tree)) {
                    $new_root = $this->add($preorder[$i], $root, self::RIGHT);
                    $this->splitInorder($new_root, $preorder, $right_sub_tree);
                    break;
                }
            }
        }
    }


}
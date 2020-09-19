<?php


namespace MyDataStructure;


class MyBinaryTreeNode
{
    private $data = null;
    private ?MyBinaryTreeNode $left = null;
    private ?MyBinaryTreeNode $right = null;
    private ?MyBinaryTreeNode $parent = null;

    /**
     * MyBinaryTreeNode constructor.
     * @param null $data
     * @param MyBinaryTreeNode|null $left
     * @param MyBinaryTreeNode|null $right
     */
    public function __construct($data, ?MyBinaryTreeNode $left = null, ?MyBinaryTreeNode $right = null)
    {
        $this->data = $data;
        $this->left = $left;
        $this->right = $right;
    }

    public function __toString():string {
        return $this->data;
    }

    /**
     * @return MyBinaryTreeNode|null
     */
    public function getLeft(): ?MyBinaryTreeNode
    {
        return $this->left;
    }

    /**
     * @param MyBinaryTreeNode|null $left
     */
    public function setLeft(?MyBinaryTreeNode $left): void
    {
        $this->left = $left;
        $this->left->setParent($this);
    }

    /**
     * @return MyBinaryTreeNode|null
     */
    public function getRight(): ?MyBinaryTreeNode
    {
        return $this->right;
    }

    /**
     * @param MyBinaryTreeNode|null $right
     */
    public function setRight(?MyBinaryTreeNode $right): void
    {
        $this->right = $right;
        $this->right->setParent($this);
    }

    /**
     * @return null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return MyBinaryTreeNode|null
     */
    public function getParent(): ?MyBinaryTreeNode
    {
        return $this->parent;
    }

    /**
     * @param MyBinaryTreeNode|null $parent
     */
    public function setParent(?MyBinaryTreeNode $parent): void
    {
        $this->parent = $parent;
    }


}
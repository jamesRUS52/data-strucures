<?php


namespace MyDataStructure;


class MyListNode
{
    private $data;
    private ?MylistNode $next_node = null;

    /**
     * MyListNode constructor.
     */
    public function __construct($data)
    {
        $this->data = $data;

    }

    public function getNext(): ?MyListNode {
        return $this->next_node;
    }

    public function getData() {
        return $this->data;
    }

    public function setNext(?MyListNode $node)
    {
        $this->next_node = $node;
    }

    public function __toString()
    {
        $class_path = explode("\\", get_called_class());
        //return $class_path[count($class_path)-1].'_'.spl_object_id($this).':'. $this->data;
        return "Cell_".spl_object_id($this).':'. $this->data;
    }
}
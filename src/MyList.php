<?php


namespace MyDataStructure;

use MyDataStructure\MyListNode;
class MyList
{
    private ?MyListNode $head = null;

    public function push($data) {
        $this->addNode(new MyListNode($data));
    }

    private function addNode(MyListNode $node, ?MyListNode $prev_node = null) {
        if ($prev_node === null) {
            if ($this->head === null) {
                $this->head = $node;
            } else {
                $this->getLast()->setNext($node);
            }
        } else {
            $prev_node->setNext($node);
        }
        return $this;
    }

    public function __toString(){
        if ($this->head === null) {
            return "";
        }
        return strval($this->getNext($this->head));
    }

    private function getNext(MyListNode $listNode) {
        $next = $listNode->getNext();
        $output = strval($listNode);
        if ($next !== null) {
            $output .= ' -> ';
            $output .= $this->getNext($next);
        }
        return $output;
    }

    public function getLast() : ?MyListNode {
        if ($this->head === null) {
            return null;
        }
        $node = $this->head;
        while ($node->getNext() !== null) {
            $node = $node->getNext();
        }
        return $node;
    }

    public function dropNode(MyListNode $last)
    {
        $node = $this->head;
        if ($node === null) {
            return;
        }
        if ($node === $last) {
            unset($node);
            $this->head = null;
            return;
        }
        while ($node->getNext() !== null) {
            $next = $node->getNext();
            if ($next === $last) {
                unset($next);
                $node->setNext(null);
                return;
            }
            $node = $next;
        }

    }
}
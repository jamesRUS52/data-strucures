<?php


namespace MyDataStructure;

class MyStack
{
    private MyList $list;
    public function __construct()
    {
        $this->list = new MyList();
    }

    public function push($data) {
        $this->list->push($data);
    }

    public function pop() {
        $last = $this->list->getLast();
        if ($last === null) {
            return null;
        }
        $this->list->dropNode($last);
        return $last->getData();
    }

    public function __toString()
    {
        return strval($this->list);
    }

    public function isEmpty() : bool {
        return $this->getCount() === 0;
    }

    public function getCount() : int {
        return $this->list->getCount();
    }
}
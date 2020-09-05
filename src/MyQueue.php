<?php


namespace MyDataStructure;

use MyDataStructure\MyStack;

class MyQueue
{
    private $first_stack;
    private $second_stack;
    private $active_stack;
    private $last_operation;
    const OPER_POP = 0;
    const OPER_PUSH = 1;
    public function __construct()
    {
        $this->first_stack = new MyStack();
        $this->second_stack = new MyStack();
        $this->active_stack = $this->first_stack;
        $this->last_operation = self::OPER_PUSH;
    }

    public function push($data) {
        if ($this->last_operation == self::OPER_PUSH) {
            $this->active_stack->push($data);
        } else {
            $this->exchange();
            $this->last_operation = self::OPER_PUSH;
            $this->active_stack->push($data);
        }
    }

    public function pop() {
        if ($this->last_operation == self::OPER_POP) {
            return $this->active_stack->pop();
        } else {
            $this->exchange();
            $this->last_operation = self::OPER_POP;
            return $this->active_stack->pop();
        }
    }

    private function exchange() {
        if ($this->active_stack === $this->first_stack) {
            while ($data = $this->first_stack->pop()) {
                $this->second_stack->push($data);
            }
            $this->active_stack = $this->second_stack;
        } else {
            while ($data = $this->second_stack->pop()) {
                $this->first_stack->push($data);
            }
            $this->active_stack = $this->first_stack;
        }
    }

    public function __toString()
    {
        // Exhange queues to display items in correct order
        if ($this->last_operation === self::OPER_POP) {
            $this->exchange();
            $this->last_operation = self::OPER_PUSH;
        }
        return strval($this->active_stack);
    }
}
<?php


namespace MyDataStructure;


class MyGraphRoute
{
    private int $weight;
    private MyGraphNode $destination;

    /**
     * MyGraphRoute constructor.
     * @param int $weight
     * @param MyGraphNode $destination
     */
    public function __construct(MyGraphNode $destination, int $weight)
    {
        $this->weight = $weight;
        $this->destination = $destination;
    }

    public function getDestination() : MyGraphNode {
        return $this->destination;
    }

    public function getWeight() : int {
        return $this->weight;
    }

    public function __toString() : string {
        return $this->destination->getName()." [{$this->weight}]";
    }
}
<?php


namespace MyDataStructure;


class MyGraph
{
    /**
     * @var MyGraphNode[]
     */
    private $nodes = [];
    /**
     * MyGraph constructor.
     */
    public function __construct()
    {
    }

    public function addNode(string $name) {
        $this->nodes[] = new MyGraphNode($name);
    }

    public function addRoute(string $from_node_name, string $to_node_name, int $weight, bool $two_way = true) {
        $from_node = $this->findNode($from_node_name);
        $to_node = $this->findNode($to_node_name);
        $from_node->addRoute($to_node, $weight);
        if ($two_way) {
            $to_node->addRoute($from_node, $weight);
        }
    }

    public function findNode(string $node_name) : MyGraphNode {
        foreach ($this->nodes as $node) {
            if ($node->getName() === $node_name) {
                return $node;
            }
        }
        throw new \Exception("Node with name {$node_name} not found in graph");
    }

    public function __toString() : string {
        $output = "";
        foreach ($this->nodes as $node) {
            //$output .= "Node ".$node->getName()." has routes: ({$node->isSeen()}) [{$node->getCurrentRouteWeigh()}]".PHP_EOL;
            $output .= "Node ".$node->getName()." has routes: ".PHP_EOL;
            foreach ($node->getRoutes() as $route) {
                $output .= "\t-> ".$route.PHP_EOL;
            }
            $output .= PHP_EOL;
        }
        return $output;
    }

    public function findFastestRoute(string $from_node_name, string $to_node_name): ?string {
        foreach ($this->nodes as $node) {
            $node->setSeen(false);
            $node->setCurrentRouteWeigh(null);
            $node->setCurrentRoutePath("");
        }
        $start_node = $this->findNode($from_node_name);
        $start_node->setCurrentRouteWeigh(0);
        $start_node->setCurrentRoutePath($from_node_name);
        $this->calcNearestNodes($start_node);

        $to_node = $this->findNode($to_node_name);

        return $to_node->getCurrentRoutePath().' ['.$to_node->getCurrentRouteWeigh().']';
    }

    private function calcNearestNodes(MyGraphNode $current_node) {
        $this->sortRoutes($current_node);
        $this->calcRoutes($current_node);
        foreach ($current_node->getRoutes() as $route) {
            if (!$route->getDestination()->isSeen()) {
                $this->calcNearestNodes($route->getDestination());
            }

        }

    }

    private function calcRoutes(MyGraphNode $current_node) {
        foreach ($current_node->getRoutes() as $route) {
            if (!$route->getDestination()->getSeen()) {
                $new_weight = $current_node->getCurrentRouteWeigh() + $route->getWeight();
                if ($route->getDestination()->getCurrentRouteWeigh() === null || $new_weight < $route->getDestination()->getCurrentRouteWeigh()) {
                    $route->getDestination()->setCurrentRouteWeigh($new_weight);
                    $route->getDestination()->setCurrentRoutePath($current_node->getCurrentRoutePath().' ('.$route->getWeight().') '.$route->getDestination()->getName());
                }
            }
        }
        $current_node->setSeen(true);
    }

    private function sortRoutes(MyGraphNode $node) {
        $routes = $node->getRoutes();
        for ($i = 0; $i < count($routes); $i++) {
            $min_weight = null;
            $min_route = null;
            for ($j = $i; $j < count($routes); $j++) {
                if ($min_weight === null || $routes[$j]->getWeight() < $min_weight) {
                    $min_weight = $routes[$j]->getWeight();
                    $min_route = $j;
                }
            }
            $buffer = $routes[$i];
            $routes[$i] = $routes[$min_route];
            $routes[$min_route] = $buffer;
        }
        $node->setRoutes($routes);
    }
}
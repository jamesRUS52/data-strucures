<?php


namespace MyDataStructure;


class MyGraphNode
{
    private string $name;
    /**
     * @var MyGraphRoute[]
     */
    private array $routes = [];

    /**
     * MyGraphNode constructor.
     * @param string $name
     */

    private ?int $current_route_weigh = null;
    private bool $seen = false;
    private string $current_route_path = "";

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRoute (MyGraphNode $next_node, int $weight) {
        $this->routes[] = new MyGraphRoute($next_node, $weight);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return MyGraphRoute[]
     */
    public function getRoutes() : array {
        return $this->routes;
    }

    /**
     * @return int|null
     */
    public function getCurrentRouteWeigh(): ?int
    {
        return $this->current_route_weigh;
    }

    /**
     * @param int|null $current_route_weigh
     */
    public function setCurrentRouteWeigh(?int $current_route_weigh): void
    {
        $this->current_route_weigh = $current_route_weigh;
    }

    /**
     * @return bool
     */
    public function isSeen(): bool
    {
        return $this->seen;
    }

    /**
     * @param bool $seen
     */
    public function setSeen(bool $seen): void
    {
        $this->seen = $seen;
    }

    public function getSeen()
    {
        return $this->seen;
    }

    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * @return string
     */
    public function getCurrentRoutePath(): string
    {
        return $this->current_route_path;
    }

    /**
     * @param string $current_route_path
     */
    public function setCurrentRoutePath(string $current_route_path): void
    {
        $this->current_route_path = $current_route_path;
    }


}
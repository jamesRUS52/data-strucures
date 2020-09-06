<?php

require 'vendor/autoload.php';

use MyDataStructure\MyGraph;

$graph = new MyGraph();

$graph->addNode("MSK");
$graph->addNode("SPB");
$graph->addNode("VLD");
$graph->addNode("YRSL");
$graph->addNode("NN");

$graph->addRoute("NN","VLD",6);
$graph->addRoute("VLD","MSK",4);
$graph->addRoute("MSK","SPB",11);
$graph->addRoute("NN","YRSL",9);
$graph->addRoute("YRSL","MSK",4);

print $graph;
print $graph->findFastestRoute("NN","SPB").PHP_EOL;
print $graph->findFastestRoute("VLD","MSK").PHP_EOL;
print $graph->findFastestRoute("NN","MSK").PHP_EOL;

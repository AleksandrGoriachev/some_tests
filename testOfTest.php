<?php

include 'LinkedList.php';

$list = new LinkedList();

$list->push(1);
$list->push(2);
$list->push(3);
$list->push(4);
$list->push(5);

//$list->showList();
print_r("\n");
print_r($list->pop()."\n");
print_r($list->peek() . "\n");
$list->showList();

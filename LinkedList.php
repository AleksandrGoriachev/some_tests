<?php

include "Bucket.php";

/**
 * Class LinkedList
 */
class LinkedList
{
    public $first;

    /**
     * LinkedList constructor.
     */
    public function __construct()
    {
        $this->first = null;
    }

    public function push($data): void
    {
        $bucket = new Bucket($data);
        $bucket->setNext($this->first);
        $this->first = &$bucket;
    }

    public function showList()
    {
        $current = $this->first;
        while (!is_null($current)) {
            print "\n" . $current->getData();
            $current = $current->getNext();
        }
    }

    public function pop()
    {
        $current = $this->first;
        $this->first = $current->getNext();
        return $current->getData();
    }

    public function peek()
    {
        return $this->first->getData();
    }
}
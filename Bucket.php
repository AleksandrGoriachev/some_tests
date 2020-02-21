<?php

/**
 * Class Bucket
 */
class Bucket
{
    private $data;
    private $next;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getNext()
    {
        return $this->next;
    }
}
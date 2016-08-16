<?php

namespace SearchBundle\Model;

class ResultCollection
{
    /** @var array */
    private $results;

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Result
     */
    public function addResult(Result $result)
    {
        $this->results[] = $result;
    }
}
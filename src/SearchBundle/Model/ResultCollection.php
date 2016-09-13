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

    public function setResults($results)
    {
        $this->results = $results;
    }

    /**
     * @param Result
     */
    public function addResult(Result $result)
    {
        $this->results[] = $result;
    }

    public function sortByRate()
    {
        $results = $this->getResults();
        usort($results, function ($a, $b) {
            return ($a->getRate() > $b->getRate()) ? -1 : 1;
        });

        $this->setResults($results);
    }
}

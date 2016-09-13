<?php

namespace SearchBundle\Search;

use SearchBundle\Model\ResultCollection;

interface SearchStrategy
{
    /**
     * @param $query
     * @return ResultCollection
     */
    public function get($query);

    /**
     * @param $query
     * @return mixed
     */
    public function fetch($query);

    /**
     * @param $data
     * @return ResultCollection
     */
    public function transformToResultCollection($data);
}

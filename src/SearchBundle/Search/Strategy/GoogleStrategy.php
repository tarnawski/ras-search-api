<?php

namespace SearchBundle\Search\Strategy;

use GuzzleHttp\Client;
use SearchBundle\Model\Result;
use SearchBundle\Model\ResultCollection;
use SearchBundle\Search\SearchStrategy;

class GoogleStrategy implements SearchStrategy
{
    /** @var string */
    private $url;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $searchId;

    /** @var Client */
    private $client;

    public function __construct($url, $apiKey, $searchId, Client $client)
    {
        $this->url = $url;
        $this->apiKey = $apiKey;
        $this->searchId = $searchId;
        $this->client = $client;
    }

    /**
     * @param string $query
     * @return ResultCollection
     */
    public function get($query)
    {
        $query = $this->prepareQuery($query);
        $data = $this->fetch($query);
        $resultCollection = $this->transformToResultCollection($data);

        return $resultCollection;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function prepareQuery($query)
    {
        return str_replace(' ','+',$query);
    }

    /**
     * @param $query
     * @return bool|string
     */
    public function fetch($query)
    {
        $res = $this->client->get($this->url, [
            'query' => [
                'key' => $this->apiKey,
                'cx' => $this->searchId,
                'fields' => 'items(title,snippet,link)',
                'q' => $query
            ]
        ]);

        if($res->getStatusCode() != 200){
            return false;
        }

        $contents = $res->getBody()->getContents();

        return $contents;
    }

    /**
     * @param $data
     * @return ResultCollection
     */
    public function transformToResultCollection($data)
    {
        $data = json_decode($data, true);
        $items = isset($data['items']) ? $data['items'] : [];
        $resultCollection = new ResultCollection();

        foreach ($items as $item){
            $result = new Result(
                isset($item['link']) ? $item['link'] : '',
                isset($item['title']) ? $item['title'] : '',
                isset($item['snippet']) ? $item['snippet'] : ''
            );

            $resultCollection->addResult($result);
        }

        return $resultCollection;
    }
}
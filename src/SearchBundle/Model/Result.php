<?php

namespace SearchBundle\Model;

class Result
{
    /** @var string */
    private $url;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var integer */
    private $rate;

    public function __construct($url, $title, $description, $rate)
    {
        $this->url = $url;
        $this->title = $title;
        $this->description = $description;
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }
}

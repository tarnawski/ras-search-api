<?php

namespace SearchBundle\Entity;

use Ramsey\Uuid\Uuid;

class Site
{
    /** @var  integer */
    private $id;

    /** @var  Uuid */
    private $uuid;

    /** @var  string */
    private $url;

    /** @var string */
    private $domain;

    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var  integer */
    private $rate;

    /** @var string */
    private $language;

    /** @var \DateTime */
    private $createDate;

    /** @var \DateTime */
    private $modifyDate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Uuid
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param Uuid $uuid
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param \DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return \DateTime
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * @param \DateTime $modifyDate
     */
    public function setModifyDate($modifyDate)
    {
        $this->modifyDate = $modifyDate;
    }
}
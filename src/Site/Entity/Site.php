<?php

namespace Convelio\Site\Entity;

/**
 * Class Site
 * @package Convelio\Site\Entity
 */
class Site
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $url;

    /**
     * Site constructor.
     * @param int $id
     * @param string $url
     */
    public function __construct(int $id, string $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): Site
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Site
    {
        $this->url = $url;
        return $this;
    }
}

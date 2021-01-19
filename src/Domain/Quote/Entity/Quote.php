<?php

namespace Convelio\Domain\Quote\Entity;

use DateTime;

/**
 * Class Quote
 * @package Convelio\Quote\Entity
 */
class Quote
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $siteId;

    /**
     * @var int
     */
    protected $destinationId;

    /**
     * @var DateTime
     */
    protected $dateQuoted;

    /**
     * Quote constructor.
     * @param int $id
     * @param int $siteId
     * @param int $destinationId
     * @param string $dateQuoted
     */
    public function __construct(int $id, int $siteId, int $destinationId, DateTime $dateQuoted)
    {
        $this->id = $id;
        $this->siteId = $siteId;
        $this->destinationId = $destinationId;
        $this->dateQuoted = $dateQuoted;
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
    public function setId(int $id): Quote
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSiteId(): int
    {
        return $this->siteId;
    }

    /**
     * @param int $siteId
     * @return $this
     */
    public function setSiteId(int $siteId): Quote
    {
        $this->siteId = $siteId;
        return $this;
    }

    /**
     * @return int
     */
    public function getDestinationId(): int
    {
        return $this->destinationId;
    }

    /**
     * @param int $destinationId
     * @return $this
     */
    public function setDestinationId(int $destinationId): Quote
    {
        $this->destinationId = $destinationId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateQuoted(): DateTime
    {
        return $this->dateQuoted;
    }

    /**
     * @param DateTime $dateQuoted
     * @return $this
     */
    public function setDateQuoted(DateTime $dateQuoted): Quote
    {
        $this->dateQuoted = $dateQuoted;
        return $this;
    }

    /**
     * @return string
     */
    public function renderHtml()
    {
        return '<p>' . $this->getId() . '</p>';
    }

    /**
     * @return string
     */
    public function renderText()
    {
        return (string) $this->getId();
    }
}

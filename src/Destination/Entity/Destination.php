<?php

namespace Convelio\Destination\Entity;

/**
 * Class Destination
 * @package Convelio\Destination\Entity
 */
class Destination
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $countryName;

    /**
     * @var string
     */
    protected $conjunction;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $computerName;

    /**
     * Destination constructor.
     * @param int $id
     * @param string $countryName
     * @param string $conjunction
     * @param string $computerName
     */
    public function __construct(int $id, string $countryName, string $conjunction, string $computerName)
    {
        $this->id = $id;
        $this->countryName = $countryName;
        $this->conjunction = $conjunction;
        $this->computerName = $computerName;
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
    public function setId(int $id): Destination
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryName(): string
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     * @return $this
     */
    public function setCountryName(string $countryName): Destination
    {
        $this->countryName = $countryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getConjunction(): string
    {
        return $this->conjunction;
    }

    /**
     * @param string $conjunction
     * @return $this
     */
    public function setConjunction(string $conjunction): Destination
    {
        $this->conjunction = $conjunction;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Destination
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getComputerName(): string
    {
        return $this->computerName;
    }

    /**
     * @param string $computerName
     * @return $this
     */
    public function setComputerName(string $computerName): Destination
    {
        $this->computerName = $computerName;
        return $this;
    }
}

<?php

namespace Convelio\Domain\Destination\Repository;

use Convelio\Domain\Destination\Entity\Destination;

/**
 * Interface DestinationRepositoryInterface
 * @package Convelio\Domain\Destination\Repository
 */
interface DestinationRepositoryInterface
{
    /**
     * @param int $id
     * @return Destination
     */
    public function getById(int $id): Destination;
}

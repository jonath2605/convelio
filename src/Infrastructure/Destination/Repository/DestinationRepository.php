<?php

namespace  Convelio\Infrastructure\Destination\Repository;

use Convelio\Domain\Destination\Entity\Destination;
use Convelio\Domain\Helper\SingletonTrait;
use Convelio\Domain\Destination\Repository\DestinationRepositoryInterface;
use Faker;

/**
 * Class DestinationRepository
 * @package Convelio\Infrastructure\Destination\Repository
 */
class DestinationRepository implements DestinationRepositoryInterface
{
    use SingletonTrait;

    /**
     * @param int $id
     *
     * @return Destination
     */
    public function getById(int $id): Destination
    {
        // DO NOT MODIFY THIS METHOD
        $generator    = Faker\Factory::create();
        $generator->seed($id);

        return new Destination(
            $id,
            $generator->country,
            'en',
            $generator->slug()
        );
    }
}

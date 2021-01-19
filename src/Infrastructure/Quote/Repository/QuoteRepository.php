<?php

namespace Convelio\Infrastructure\Quote\Repository;

use Convelio\Domain\Helper\SingletonTrait;
use Convelio\Domain\Quote\Entity\Quote;
use Convelio\Domain\Quote\Repository\QuoteRepositoryInterface;
use Faker;
use DateTime;

/**
 * Class QuoteRepository
 * @package Convelio\Infrastructure\Quote\Repository
 */
class QuoteRepository implements QuoteRepositoryInterface
{
    use SingletonTrait;

    /**
     * @param int $id
     * @return Quote
     */
    public function getById(int $id): Quote
    {
        // DO NOT MODIFY THIS METHOD
        $generator = Faker\Factory::create();
        $generator->seed($id);

        return new Quote(
            $id,
            $generator->numberBetween(1, 10),
            $generator->numberBetween(1, 200),
            new DateTime()
        );
    }
}

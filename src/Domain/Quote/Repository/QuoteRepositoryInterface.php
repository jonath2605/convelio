<?php

namespace Convelio\Domain\Quote\Repository;

use Convelio\Domain\Quote\Entity\Quote;

/**
 * Interface QuoteRepositoryInterface
 * @package Convelio\Domain\Quote\Repository
 */
interface QuoteRepositoryInterface
{
    /**
     * @param int $id
     * @return Quote
     */
    public function getById(int $id): Quote;
}

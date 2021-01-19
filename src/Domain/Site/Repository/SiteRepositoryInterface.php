<?php

namespace Convelio\Domain\Site\Repository;

use Convelio\Domain\Site\Entity\Site;

/**
 * Interface SiteRepositoryInterface
 * @package Convelio\Domain\Site\Repository
 */
interface SiteRepositoryInterface
{
    /**
     * @param int $id
     * @return Site
     */
    public function getById(int $id): Site;
}

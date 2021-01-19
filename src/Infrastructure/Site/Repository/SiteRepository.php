<?php

namespace Convelio\Infrastructure\Site\Repository;

use Convelio\Domain\Helper\SingletonTrait;
use Convelio\Domain\Site\Entity\Site;
use Convelio\Domain\Site\Repository\SiteRepositoryInterface;
use Faker;

/**
 * Class SiteRepository
 * @package Convelio\Infrastructure\Site\Repository
 */
class SiteRepository implements SiteRepositoryInterface
{
    use SingletonTrait;

    /**
     * @param int $id
     *
     * @return Site
     */
    public function getById(int $id): Site
    {
        // DO NOT MODIFY THIS METHOD
        $generator = Faker\Factory::create();
        $generator->seed($id);

        return new Site($id, $generator->url);
    }
}

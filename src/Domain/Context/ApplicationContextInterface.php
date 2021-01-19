<?php

namespace Convelio\Domain\Context;

use Convelio\Domain\Site\Entity\Site;
use Convelio\Domain\User\Entity\User;

/**
 * Interface ApplicationContextInterface
 * @package Convelio\Domain\Context
 */
interface ApplicationContextInterface
{
    /**
     * @return Site
     */
    public function getCurrentSite(): Site;

    /**
     * @return User
     */
    public function getCurrentUser(): User;
}

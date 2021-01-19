<?php

namespace Convelio\Infrastructure\Context;

use Convelio\Domain\Context\ApplicationContextInterface;
use Convelio\Domain\Helper\SingletonTrait;
use Convelio\Domain\Site\Entity\Site;
use Convelio\Domain\User\Entity\User;

/**
 * Class ApplicationContext
 * @package Convelio\Domain\Context
 */
class ApplicationContext implements ApplicationContextInterface
{
    use SingletonTrait;

    /**
     * @var Site
     */
    private $currentSite;

    /**
     * @var User
     */
    private $currentUser;

    protected function __construct()
    {
        $faker = \Faker\Factory::create();
        $this->currentSite = new Site($faker->randomNumber(), $faker->url);
        $this->currentUser = new User($faker->randomNumber(), $faker->firstName, $faker->lastName, $faker->email);
    }

    /**
     * @inheritDoc
     */
    public function getCurrentSite(): Site
    {
        return $this->currentSite;
    }

    /**
     * @inheritDoc
     */
    public function getCurrentUser(): User
    {
        return $this->currentUser;
    }
}

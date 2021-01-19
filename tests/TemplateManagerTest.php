<?php

namespace Tests;

use Convelio\Domain\Context\ApplicationContextInterface;
use Convelio\Domain\Destination\Repository\DestinationRepositoryInterface;
use Convelio\Domain\Quote\Entity\Quote;
use Convelio\Domain\Template\Entity\Template;
use Convelio\Domain\TemplateManager\Service\TemplateManager;
use Convelio\Infrastructure\Context\ApplicationContext;
use Convelio\Infrastructure\Destination\Repository\DestinationRepository;

/**
 * Class TemplateManagerTest
 * @package Tests
 */
class TemplateManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApplicationContextInterface
     */
    protected $applicationContext;

    /**
     * @var DestinationRepositoryInterface
     */
    protected $destinationRepository;

    /**
     * Init the mocks
     */
    public function setUp()
    {
        $this->applicationContext = ApplicationContext::getInstance();
        $this->destinationRepository = DestinationRepository::getInstance();
    }

    /**
     * Closes the mocks
     */
    public function tearDown()
    {
    }

    /**
     * @test
     */
    public function test()
    {
        $faker = \Faker\Factory::create();

        $destinationId                  = $faker->randomNumber();
        $expectedDestination = $this->destinationRepository->getById($destinationId);
        $expectedUser        = $this->applicationContext->getCurrentUser();

        $quote = new Quote($faker->randomNumber(), $faker->randomNumber(), $destinationId, new \DateTime($faker->date()));

        $template = new Template(
            1,
            'Votre livraison à [quote:destination_name]',
            "
Bonjour [user:first_name],

Merci de nous avoir contacté pour votre livraison à [quote:destination_name].

Bien cordialement,

L'équipe Convelio.com
");
        $templateManager = new TemplateManager();

        $message = $templateManager->getTemplateComputed(
            $template,
            [
                'quote' => $quote
            ]
        );

        $this->assertEquals('Votre livraison à ' . $expectedDestination->getCountryName(), $message->getSubject());
        $this->assertEquals("
Bonjour " . $expectedUser->getFirstname() . ",

Merci de nous avoir contacté pour votre livraison à " . $expectedDestination->getCountryName() . ".

Bien cordialement,

L'équipe Convelio.com
", $message->getContent());
    }
}

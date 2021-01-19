<?php
declare(strict_types=1);

namespace Convelio\Domain\TemplateManager\Service;

use Convelio\Domain\Context\ApplicationContextInterface;
use Convelio\Domain\Destination\Repository\DestinationRepositoryInterface;
use Convelio\Domain\Quote\Entity\Quote;
use Convelio\Domain\Quote\Repository\QuoteRepositoryInterface;
use Convelio\Domain\Site\Repository\SiteRepositoryInterface;
use Convelio\Domain\Template\Entity\Template;
use Convelio\Domain\User\Entity\User;
use Convelio\Infrastructure\Context\ApplicationContext;
use Convelio\Infrastructure\Destination\Repository\DestinationRepository;
use Convelio\Infrastructure\Quote\Repository\QuoteRepository;
use Convelio\Infrastructure\Site\Repository\SiteRepository;

/**
 * Class TemplateManager
 * @package Convelio\Domain\TemplateManager\Service
 */
class TemplateManager implements TemplateManagerInterface
{
    /**
     * @var ApplicationContextInterface
     */
    private $applicationContext;

    /**
     * @var QuoteRepositoryInterface
     */
    private $quoteRepository;

    /**
     * @var SiteRepositoryInterface
     */
    private $siteRepository;

    /**
     * @var DestinationRepositoryInterface
     */
    private $destinationRepository;

    /**
     * TemplateManager constructor.
     */
    public function __construct()
    {
        $this->applicationContext = ApplicationContext::getInstance();
        $this->quoteRepository = QuoteRepository::getInstance();
        $this->siteRepository = SiteRepository::getInstance();
        $this->destinationRepository = DestinationRepository::getInstance();
    }

    /**
     * @inheritDoc
     */
    public function getTemplateComputed(Template $tpl, array $data)
    {
        if (!$tpl) {
            throw new \RuntimeException('no tpl given');
        }

        $replaced = clone($tpl);

        return $replaced->setSubject($this->computeText($replaced->getSubject(), $data))
            ->setContent($this->computeText($replaced->getContent(), $data));
    }

    /**
     * @param $text
     * @param array $data
     * @return string|string[]
     */
    private function computeText($text, array $data)
    {
        $quote = (isset($data['quote']) and $data['quote'] instanceof Quote) ? $data['quote'] : null;
        $isDestinationLink = false;

        if ($quote)
        {
            $quoteFromRepository = $this->quoteRepository->getById($quote->getId());
            $siteFromQuote = $this->siteRepository->getById($quote->getSiteId());
            $destinationOfQuote = $this->destinationRepository->getById($quote->getDestinationId());

            if(strpos($text, '[quote:destination_link]') !== false){
                $isDestinationLink = true;
            }

            $containsSummaryHtml = strpos($text, '[quote:summary_html]');
            $containsSummary     = strpos($text, '[quote:summary]');

            if ($containsSummaryHtml !== false) {
                $text = str_replace(
                    '[quote:summary_html]',
                    $quoteFromRepository->renderHtml(),
                    $text
                );
            }

            if ($containsSummary !== false) {
                $text = str_replace(
                    '[quote:summary]',
                    $quoteFromRepository->renderText(),
                    $text
                );
            }

            (strpos($text, '[quote:destination_name]') !== false) and $text = str_replace('[quote:destination_name]',$destinationOfQuote->getCountryName(),$text);
        }

        if ($isDestinationLink)
            $text = str_replace('[quote:destination_link]', $siteFromQuote->getUrl() . '/' . $destinationOfQuote->getCountryName() . '/quote/' . $quoteFromRepository->getId(), $text);
        else
            $text = str_replace('[quote:destination_link]', '', $text);

        /*
         * USER
         * [user:*]
         */
        $user  = (isset($data['user'])  and ($data['user']  instanceof User))  ? $data['user']  : $this->applicationContext->getCurrentUser();
        if($user) {
            (strpos($text, '[user:first_name]') !== false) and $text = str_replace('[user:first_name]'       , ucfirst(mb_strtolower($user->getFirstname())), $text);
        }

        return $text;
    }
}

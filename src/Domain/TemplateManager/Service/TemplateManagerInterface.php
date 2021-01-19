<?php

namespace Convelio\Domain\TemplateManager\Service;

use Convelio\Domain\Template\Entity\Template;

/**
 * Interface TemplateManagerInterface
 * @package Convelio\Domain\TemplateManager\Service
 */
interface TemplateManagerInterface
{
    /**
     * @param Template $tpl
     * @param array $data
     * @return mixed
     */
    public function getTemplateComputed(Template $tpl, array $data);
}

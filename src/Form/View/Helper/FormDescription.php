<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\ElementInterface;
use Laminas\Form\View\Helper\AbstractHelper;

/**
 * Class FormDescription
 *
 * @package LaminasBootstrap4\Form\View\Helper
 */
final class FormDescription extends AbstractHelper
{
    private $inlineWrapper = '<small class="form-text text-muted">%s</small>';
    private $blockWrapper = '<small class="form-text text-muted">%s</small>';

    public function __invoke(
        ElementInterface $element = null,
        string $blockWrapper = null,
        string $inlineWrapper = null
    ) {
        if ($element) {
            return $this->render($element, $blockWrapper, $inlineWrapper);
        }

        return $this;
    }

    public function render(ElementInterface $element, string $blockWrapper = null, string $inlineWrapper = null): string
    {
        $blockWrapper = $blockWrapper ?: $this->blockWrapper;
        $inlineWrapper = $inlineWrapper ?: $this->inlineWrapper;

        $html = '';
        if ($inline = $element->getOption('help-inline')) {
            if (null !== ($translator = $this->getTranslator())) {
                $inline = $translator->translate(
                    $inline,
                    $this->getTranslatorTextDomain()
                );
            }

            $html .= \sprintf($inlineWrapper, $inline);
        }

        if ($block = $element->getOption('help-block')) {
            if (null !== ($translator = $this->getTranslator())) {
                $block = $translator->translate(
                    $block,
                    $this->getTranslatorTextDomain()
                );
            }

            $html .= \sprintf($blockWrapper, $block);
        }

        return $html;
    }
}

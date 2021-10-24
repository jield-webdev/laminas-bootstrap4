<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\ElementInterface;

final class FormCheckbox extends \Laminas\Form\View\Helper\FormCheckbox
{
    public function render(ElementInterface $element): string
    {
        $element->setAttribute('class', 'custom-control-input');

        if (\count($element->getMessages()) > 0) {
            $element->setAttribute('class', 'custom-control-input is-invalid');
        }

        $element->setAttribute('id', \md5($element->getName()));

        return parent::render($element);
    }
}

<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\ElementInterface;
use Laminas\Form\View\Helper;

final class FormInput extends Helper\FormInput
{
    public function render(ElementInterface $element): string
    {
        $element->setAttribute('class', 'form-control');

        if (\count($element->getMessages()) > 0) {
            $element->setAttribute('class', 'form-control is-invalid');
        }

        if (null === $element->getAttribute('id')) {
            $element->setAttribute('id', $element->getName());
        }

        return parent::render($element);
    }
}

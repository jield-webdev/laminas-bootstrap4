<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\ElementInterface;

final class FormRadio extends FormMultiCheckbox
{
    protected static function getName(ElementInterface $element): string
    {
        return $element->getName();
    }

    protected function getInputType(): string
    {
        return 'radio';
    }
}

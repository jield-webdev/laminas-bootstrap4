<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\ElementInterface;
use Laminas\Form\View\Helper;
use function count;

final class FormSearch extends Helper\FormSelect
{
    public function render(ElementInterface $element): string
    {
        $element->setAttribute('class', $element->getAttribute('class') . ' form-control selectpicker');
        $element->setAttribute('data-live-search', 'true');

        if (count($element->getMessages()) > 0) {
            $element->setAttribute('class', $element->getAttribute('class') . ' is-invalid');
        }

        if (null === $element->getAttribute('id')) {
            $element->setAttribute('id', $element->getName());
        }

        return parent::render($element);
    }
}

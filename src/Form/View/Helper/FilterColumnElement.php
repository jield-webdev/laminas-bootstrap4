<?php

namespace LaminasBootstrap4\Form\View\Helper;

use Laminas\Form\Element\MultiCheckbox;
use Laminas\Form\ElementInterface;
use Laminas\Form\Form;

use function implode;
use function sprintf;

/**
 *
 */
class FilterColumnElement extends FormElement
{
    public function __invoke(ElementInterface $element = null, bool $inline = false, bool $formElementOnly = false)
    {
        $this->inline          = false;
        $this->formElementOnly = $formElementOnly;

        if ($element) {
            return $this->renderFilterBar($element);
        }

        return $this;
    }

    private function renderFilterBar(Form $element): string
    {
        $wrapper = '
        
        <div class="form-inline">
                        %s
                        %s
                        %s
                </div>
                %s
                %s
                
        
        
        <script type="text/javascript">
            $(\'.dropdown-menu-filter-bar\').on(\'click\', function(e) {
                e.stopPropagation();
            });
        
            $(function () {
                $(\'#searchButton\').on(\'click\', function () {
                    $(\'#search\').submit();
                });
                $(\'#resetButton\').on(\'click\', function () {
                    $(\'input[type="checkbox"]\').each(function () {
                        this.removeAttribute(\'checked\');
                    });
                    $(\'input[type="radio"]\').each(function () {
                        this.removeAttribute(\'checked\');
                    });
                    $(\'input[name="query"]\').val(\'\');
                    $(\'#search\').submit();
                });
            });
        </script>
        
        <style type="text/css">
            .dropdown-item > label > input {
                margin-right: 0.3rem;  
            }
        </style>
    ';

        return sprintf(
            $wrapper,

            $this->renderRaw($element->get('query')),
            $this->renderRaw($element->get('search')),
            $this->renderRaw($element->get('reset')),
            $this->renderFacets($element),
            $this->renderRaw($element->get('search')),
        );
    }

    private function renderFacets(Form $element): string
    {
        $facets = [];

        $facetWrapper = ' <strong>%s</strong> %s';


        $counter = 1;
        /** @var MultiCheckbox $facet */
        foreach ($element->get('facet') as $facet) {
            $facets[] = sprintf($facetWrapper, $facet->getLabel(), $this->renderRaw($facet));
            $counter++;
        }

        return implode(PHP_EOL, $facets);
    }

    private function renderRaw(ElementInterface $element): ?string
    {
        $type = $element->getAttribute('type');
        switch ($type) {
            case 'multi_checkbox':
                //Get the helper
                /** @var FormMultiCheckbox $formMultiCheckbox */
                $formMultiCheckbox = $this->getView()->plugin('zf3b4formmulticheckbox');
                $formMultiCheckbox->setTemplate(
                    '<div class="form-check" data-element="%s">%s%s%s%s</div>'
                );

                return $formMultiCheckbox->render($element);
            case 'radio':
                //Get the helper
                /** @var FormMultiCheckbox $formMultiCheckbox */
                $formMultiCheckbox = $this->getView()->plugin('zf3b4formradio');
                $formMultiCheckbox->setTemplate(
                    '<div class="form-check %s">%s%s%s%s</div>'
                );

                return $formMultiCheckbox->render($element);
            case 'text':
            case 'search':
                return $this->renderHelper('zf3b4forminput', $element);
            case 'button':
                $element->setAttribute(
                    'class',
                    'ml-2 my-2 my-sm-0 ' . $element->getAttribute('class')
                );
                $element->setAttribute('id', 'searchButton');
                if ($element->getName() === 'reset') {
                    $element->setAttribute('id', 'resetButton');
                    $element->setAttribute(
                        'class',
                        'ml-2 my-2 my-sm-0 ' . $element->getAttribute('class')
                    );
                }
                return $this->renderHelper('formbutton', $element);
            default:
                return $this->renderHelper($type, $element);
        }
    }
}

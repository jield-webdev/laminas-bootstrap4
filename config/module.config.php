<?php

use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use LaminasBootstrap4\Form\View;
use LaminasBootstrap4\Navigation;
use LaminasBootstrap4\View\Helper;

return [
    'view_helpers'               => [
        'aliases'    => [

            'ztbalert'       => 'lbs4alert',
            'ztbformelement' => 'lbs4formelement',

            'zf3b4navigation' => 'lbs4navigation',

        ],
        'factories'  => [
            Helper\Navigation::class            => Navigation\View\NavigationHelperFactory::class,
            View\Helper\FormElement::class      => ConfigAbstractFactory::class,
            View\Helper\FilterBarElement::class => ConfigAbstractFactory::class,
        ],
        'invokables' => [
            'filterbarelement'      => View\Helper\FilterBarElement::class,
            'filtercolumnelement'   => View\Helper\FilterColumnElement::class,
            'lbs4formelement'       => View\Helper\FormElement::class,
            'lbs4navigation'        => Helper\Navigation::class,
            'lbs4formdescription'   => View\Helper\FormDescription::class,
            'lbs4forminput'         => View\Helper\FormInput::class,
            'lbs4formdatetimelocal' => View\Helper\FormDateTimeLocal::class,
            'lbs4formfile'          => View\Helper\FormFile::class,
            'lbs4formsearch'        => View\Helper\FormSearch::class,
            'lbs4formradio'         => View\Helper\FormRadio::class,
            'lbs4formcheckbox'      => View\Helper\FormCheckbox::class,
            'lbs4formtextarea'      => View\Helper\FormTextarea::class,
            'lbs4formselect'        => View\Helper\FormSelect::class,
            'lbs4formmulticheckbox' => View\Helper\FormMultiCheckbox::class,
            'lbs4alert'             => Helper\Alert::class,
        ],
    ],
    ConfigAbstractFactory::class => [
        View\Helper\FormElement::class         => [
            'ViewHelperManager',
            \Laminas\I18n\Translator\TranslatorInterface::class
        ],
        View\Helper\FilterBarElement::class    => [
            'ViewHelperManager',
            \Laminas\I18n\Translator\TranslatorInterface::class
        ],
        View\Helper\FilterColumnElement::class => [
            'ViewHelperManager',
            \Laminas\I18n\Translator\TranslatorInterface::class
        ]
    ]
];

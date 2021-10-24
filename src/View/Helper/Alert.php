<?php

namespace LaminasBootstrap4\View\Helper;

use Laminas\View\Helper\AbstractHelper;

/**
 *
 */
class Alert extends AbstractHelper
{
    private $format = '<div class="alert alert-%s %s" role="alert">%s%s</div>';

    public function info(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'info', $isDismissable);
    }

    public function render(string $alert, string $class = '', bool $isDismissable = false): string
    {
        $closeButton = '';
        $dismissableClass = '';
        if ($isDismissable) {
            $closeButton
                = '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                   </button>';
            $dismissableClass = 'alert-dismissible fade show';
        }
        $class = \trim($class);

        return \sprintf(
            $this->format,
            $class,
            $dismissableClass,
            $closeButton,
            $alert
        );
    }

    public function danger(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'danger', $isDismissable);
    }

    public function success(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'success', $isDismissable);
    }

    public function warning(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'warning', $isDismissable);
    }

    public function primary(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'primay', $isDismissable);
    }

    public function secondary(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'secondary', $isDismissable);
    }

    public function light(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'light', $isDismissable);
    }

    public function dark(string $alert, bool $isDismissable = false): string
    {
        return $this->render($alert, 'dark', $isDismissable);
    }

    public function __invoke(string $alert = null, string $class = 'info', bool $isDismissable = false)
    {
        if (null !== $alert) {
            return $this->render($alert, $class, $isDismissable);
        }

        return $this;
    }
}

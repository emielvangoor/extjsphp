<?php

namespace EXB\Ui\Mixin;

use EXB\Ui\AbstractComponent;
use EXB\Ui\ViewModel;

/**
 * Trait BindableTrait
 * @package EXB\Ui\Mixin
 *
 * @method BindableTrait setViewModel(ViewModel $vm) Set the viewmodel
 */
trait BindableTrait
{
    /**
     * @var ViewModel
     */
    protected $viewModel = null;

    /**
     * @return ViewModel
     */
    public function getViewModel()
    {
        if ($this->viewModel == null) {
            $this->setViewModel(new ViewModel);
        }

        return $this->properties[self::$PROPERTY_STATIC]['viewModel'];
    }
}
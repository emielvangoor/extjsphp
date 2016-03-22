<?php

namespace Bonsa\Extphp\Mixin;

use Bonsa\Extphp\ViewModel;

/**
 * Trait BindableTrait
 * @package Bonsa\Extphp\Mixin
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
        if ($this->viewModel === null) {
            $this->setViewModel(new ViewModel);
        }

        /** @var $this \Bonsa\Extphp\AbstractContainer  */
        $this->getProperty('viewModel');
    }
}

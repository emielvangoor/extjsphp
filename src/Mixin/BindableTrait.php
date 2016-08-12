<?php

namespace Bonsa\Extphp\Mixin;

use Bonsa\Extphp\ViewModel;

/**
 * Trait BindableTrait
 * @package Bonsa\Extphp\Mixin
 *
 * @method BindableTrait setReference(string $reference) Set the reference name
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
        /** @var $this \Bonsa\Extphp\AbstractContainer  */
        if ($this->viewModel === null) {
            $this->setProperty('viewModel', new ViewModel);
        }

        /** @var $vm ViewModel */
        $vm = $this->getProperty('viewModel');

        return $vm;
    }

    /**
     * @param array $data
     * @return ViewModel
     */
    public function setViewModel(array $data) {
        $this->setValidProperties(['viewModel']);

        $vm = $this->getViewModel();

        foreach ($data as $key=>$value) {
            $vm->set($key, $value);
        }

        return $vm;
    }
}

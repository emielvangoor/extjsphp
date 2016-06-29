<?php

namespace Bonsa\Extphp;

/**
 * Class AbstractContainer
 * @package Bonsa\Extphp
 *
 * @method AbstractContainer setLayout(\Bonsa\Extphp\Layout\AbstractLayout $layout) Set the layout
 */
abstract class AbstractContainer extends AbstractComponent
{
    /**
     * @var string
     */
    protected $xtype = 'container';

    /**
     * Adds an @c AbstractComponent to this container.
     *
     * @param AbstractComponent $item
     *
     * @return AbstractContainer
     */
    public function add(AbstractComponent $item)
    {
        if ($this->getProperty('items') === null) {
            $this->setProperty('items', [$item]);

            return $this;
        }

        $this->setProperty('items', array_merge($this->getProperty('items'), [$item]));

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function initComponent()
    {
        $this->setValidProperties([
            'items',
        ]);

        parent::initComponent();
    }
}

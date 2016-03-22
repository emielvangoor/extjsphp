<?php

namespace EXB\Ui;

use EXB\Ui\Layout\Container\AbstractContainer as LayoutContainer;

/**
 * Class AbstractContainer
 * @package EXB\Ui
 *
 * @method AbstractContainer setLayout(LayoutContainer $layout) Set the layout
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
        if (array_key_exists('items', $this->properties[self::$PROPERTY_STATIC]) == false) {
            $this->properties[self::$PROPERTY_STATIC]['items'] = [];
        }

        $this->properties[self::$PROPERTY_STATIC]['items'][] = $item;

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

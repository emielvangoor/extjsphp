<?php

namespace Bonsa\Extphp;

/**
 * Class AbstractContainer
 * @package Bonsa\Extphp
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
        if (array_key_exists('items', $this->properties[self::$PROPERTY_STATIC]) === false) {
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

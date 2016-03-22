<?php

namespace EXB\Ui\Layout;

use EXB\Ui\PropertyTrait;

/**
 * Class AbstractLayout
 * @package EXB\Ui\Layout
 *
 * @method AbstractLayout setType(string $layout) Sets the layout
 * @method string getLayout() Gets the layout
 */
abstract class AbstractLayout implements \JsonSerializable
{
    use PropertyTrait;

    /**
     * @var string
     */
    protected $layout;

    /**
     * AbstractLayout constructor
     */
    public function __construct()
    {
        $this->setValidProperties($this->getClassProperties());
        $this->setType($this->layout);
    }
}

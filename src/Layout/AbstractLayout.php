<?php

namespace Bonsa\Extphp\Layout;

use Bonsa\Extphp\Base;

/**
 * Class AbstractLayout
 * @package Bonsa\Extphp\Layout
 *
 * @method AbstractLayout setType(string $layout) Sets the layout
 * @method string getLayout() Gets the layout
 */
abstract class AbstractLayout extends Base implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $layout;

    /**
     * AbstractLayout constructor
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->setValidProperties($this->getClassProperties());
        $this->setType($this->layout);

        foreach ($options as $option => $value) {
            call_user_func([$this, "set" . ucfirst($option)], $value);
        }
    }
}

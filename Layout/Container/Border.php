<?php

namespace Bonsa\Ui\Layout\Container;

class Border extends AbstractContainer
{
    /**
     * Top
     * @var string
     */
    const REGION_NORTH = 'north';

    /**
     * Right
     * @var string
     */
    const REGION_EAST = 'east';

    /**
     * Bottom
     * @var string
     */
    const REGION_SOUTH = 'south';

    /**
     * Left
     * @var string
     */
    const REGION_WEST = 'west';

    /**
     * Center
     * @var string
     */
    const REGION_CENTER = 'center';

    /**
     * @var string
     */
    protected $layout = 'border';

    /**
     * Returns the layout type
     */
    public function jsonSerialize() {
        return $this->layout;
    }
}

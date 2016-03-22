<?php

namespace Bonsa\Ui\Panel;

use Bonsa\Ui\AbstractContainer;

/**
 * Class Panel
 * @package Bonsa\Ui\Panel
 *
 * @method Panel setTitle(string $title) Sets the title
 * @method Panel setCollapseDirection(string $title) Sets the collapse direction
 */
class Panel extends AbstractContainer
{
    /**
     * Left collapse direction
     * @var string
     */
    const COLLAPSE_DIRECTION_LEFT = 'left';

    /**
     * Right collapse direction
     * @var string
     */
    const COLLAPSE_DIRECTION_RIGHT = 'right';

    /**
     * Top collapse direction
     * @var string
     */
    const COLLAPSE_DIRECTION_TOP = 'top';

    /**
     * Down collapse direction
     * @var string
     */
    const COLLAPSE_DIRECTION_DOWN = 'down';

    /**
     * @var string
     */
    protected $xtype = 'panel';
}

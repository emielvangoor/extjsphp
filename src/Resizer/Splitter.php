<?php

namespace Bonsa\Extphp\Resizer;

use Bonsa\Extphp\AbstractContainer;

/**
 * Class Splitter
 * @package Bonsa\Extphp\Resizer
 *
 * @method Splitter setCollapseTarget(string $target) Sets the collapse target
 * @method Splitter setCollapsible(bool $collapsible) Sets the collapsible flag
 * @method Splitter setOrientation(string $orientation) Sets the orientation
 */
class Splitter extends AbstractContainer
{
    /**
     * Previous collapsible target
     * @var string
     */
    const COLLAPSE_TARGET_PREV = 'prev';

    /**
     * Next collapsible target
     * @var string
     */
    const COLLAPSE_TARGET_NEXT = 'next';

    /**
     * Vertical orientiation
     * @var string
     */
    const ORIENTATION_VERTICAL = 'vertical';

    /**
     * Horizontal orientation
     * @var string
     */
    const ORIENTATION_HORIZONTAL = 'horizontal';

    /**
     * @var string
     */
    protected $xtype = 'splitter';
}

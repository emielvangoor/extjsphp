<?php

namespace Bonsa\Extphp\Layout\Container;

/**
 * Class AbstractBox
 * @package Bonsa\Extphp\Layout\Container
 *
 * @method AbstractBox setAlign(string $align) Set the align of the container
 * @method AbstractBox setPack(string $pack) Set the pack of the container
 */
abstract class AbstractBox extends AbstractContainer
{
    /**
     * @var string
     */
    const ALIGN_BEGIN = 'begin';

    /**
     * @var string
     */
    const ALIGN_MIDDLE = 'middle';

    /**
     * @var string
     */
    const ALIGN_END = 'end';

    /**
     * @var string
     */
    const ALIGN_STRETCH = 'stretch';

    /**
     * @var string
     */
    const ALIGN_STRETCHMAX = 'stretchmax';

    /**
     * @var string
     */
    const PACK_START = 'start';

    /**
     * @var string
     */
    const PACK_CENTER = 'center';

    /**
     * @var string
     */
    const PACK_END = 'end';
}

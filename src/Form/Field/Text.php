<?php

namespace Bonsa\Extphp\Form\Field;

use Bonsa\Extphp\AbstractContainer;

/**
 * Class Text
 *
 * @package Bonsa\Extphp\Form\Field
 *
 * @method Text setValue($value, bool $bind) Set the value of the field
 * @method Text setName($name) Set the name of the field
 * @method Text setFieldLabel($label, bool $bind) Set the label of the field
 * @method Text setInputType(string $type) Set the input type
 */
class Text extends AbstractContainer
{
    /**
     * @var string
     */
    protected $xtype = 'textfield';
}

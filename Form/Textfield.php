<?php

namespace EXB\Ui\Form;

use EXB\Ui\AbstractContainer;

/**
 * Class Textfield
 * @package EXB\Ui\Form
 *
 * @method Textfield setValue($value, bool $bind) Set the value of the field
 * @method Textfield setName($name) Set the name of the field
 * @method Textfield setFieldLabel($label, bool $bind) Set the label of the field
 */
class Textfield extends AbstractContainer
{
    /**
     * @var string
     */
    protected $xtype = 'textfield';

    /**
     * Textfield constructor
     */
    public function __construct($name, $label)
    {
        parent::__construct([
            'name' => $name,
            'fieldLabel' => $label,
        ]);
    }
}

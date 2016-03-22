<?php

namespace Bonsa\Ui;

/**
 * Base class for all components
 * @see #!/api/Ext.Component
 *
 * @method AbstractComponent setCls(string $name) Sets the css class of the component
 * @method string getCls() Get the css class of the component
 *
 * @method AbstractComponent setWidth(int $width, bool $bind) Sets the width of the component
 * @method int getWidth() Gets the width of the component
 *
 * @method AbstractComponent setHeight(int $height, bool $bind) Sets the height of the component
 * @method string getHeight() Gets the height of the component
 *
 *
 * @method AbstractComponent setXtype(string $xtype) Sets the xtype
 * @method string getXtype() Gets the xtype
 *
 * @method AbstractComponent setHtml(string $html) Sets the HTML
 */
abstract class AbstractComponent implements \JsonSerializable
{
    use Layout\Container\Border\BorderTrait;
    use Layout\Container\Box\BoxTrait;
    use PropertyTrait;
    use Mixin\BindableTrait;

    /**
     * @var string
     */
    protected $xtype = 'container';

    /**
     * @var array
     */
    protected $config = [];

    /**
     * AbstractComponent constructor
     * @param array $options
     */
    public function __construct(array $options = []) {
        $this->config = $options;

        $this->initComponent();
    }

    /**
     * init component function, you could override this
     */
    public function initComponent()
    {
        $this->setValidProperties($this->getClassProperties());
        $this->setXtype($this->xtype);

        // Set the options
        foreach ($this->config as $option => $value) {
            call_user_func([$this, "set" . ucfirst($option)], $value);
        }
    }
}

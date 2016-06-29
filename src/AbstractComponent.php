<?php

namespace Bonsa\Extphp;

/**
 * Base class for all components
 * @see #!/api/Ext.Component
 *
 * @method AbstractComponent setCls(string $name) Sets the css class of the component
 * @method string getCls() Get the css class of the component
 *
 * @method AbstractComponent setWidth(int $width, bool $bind = false) Sets the width of the component
 * @method int getWidth() Gets the width of the component
 *
 * @method AbstractComponent setHeight(int $height, bool $bind = false) Sets the height of the component
 * @method string getHeight() Gets the height of the component
 *
 * @method AbstractComponent setXtype(string $xtype) Sets the xtype
 * @method string getXtype() Gets the xtype
 *
 * @method AbstractComponent setHtml(string $html) Sets the HTML
 * @method AbstractComponent setBorder(bool $border) [true, false] Set the border
 * @method AbstractComponent setScrollable($scroll = self::SCROLL_DISABLED) [self::SCROLL_AUTO, self::SCROLL_DISABLED, self::SCROLL_X, self::SCROLL_Y]
 */
abstract class AbstractComponent extends Base
{
    use Layout\Container\Border\BorderTrait;
    use Layout\Container\Box\BoxTrait;
    use Mixin\BindableTrait;

    /**
     * Auto scrolling
     * @var bool
     */
    const SCROLL_AUTO = true;

    /**
     * Disabled scrolling
     * @default
     * @var bool
     */
    const SCROLL_DISABLED = false;

    /**
     * X axis scrolling
     * @var string
     */
    const SCROLL_X = 'x';

    /**
     * Y axis scrolling
     * @var string
     */
    const SCROLL_Y = 'y';

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

        foreach ($this->config as $option => $value) {
            call_user_func([$this, "set" . ucfirst($option)], $value);
        }
    }
}

<?php

namespace Bonsa\Ui;

/**
 * Class PropertyTrait
 * @package Bonsa\Ui
 */
trait PropertyTrait
{
    protected $valid_properties = [];

    /**
     * @var array
     */
    protected $properties = [
        'static' => [],
        'bindable' => [],
    ];

    /**
     * Defines static property
     * @var string
     */
    static protected $PROPERTY_STATIC = 'static';

    /**
     * Defines a bindable property
     * @var string
     */
    static protected $PROPERTY_BINDABLE = 'bindable';

    /**
     * Magic property setting
     *
     * @example
     * // None bindable
     * $panel->setCls('My name');
     * // Bindable
     * $panel->setTitle('My name', true);
     *
     * @param string $name
     * @param array $arguments
     * @throw \Exception
     * @return mixed|self Will return self for set* and will return mixed on get*
     */
    public function __call($name, array $arguments)
    {
        $property = lcfirst(substr($name, 3));

        list($body, $bindable) = array_merge($arguments, ['', false]);

        switch(substr($name, 0, 3))
        {
            case 'get':
                foreach ([self::$PROPERTY_STATIC, self::$PROPERTY_BINDABLE] as $type) {
                    if (array_key_exists($property, $this->properties[$type])) {
                        return $this->properties[$type][$property];
                    }
                }

                return null;
            case 'set':
                return $this->setProperty($property, $body, $bindable);
                break;

            default:
                throw new \Exception("Not a valid function call on " . get_class($this));
        }
    }

    /**
     * Sets a property
     *
     * Will check if the property is valid for this component
     *
     * @param string $name The name of the property
     * @param mixed $value the property values
     * @param bool $bindable Is the value bind to the viewmodel
     * @return AbstractComponent
     */
    public function setProperty($name, $value, $bindable = false)
    {
        $name = lcfirst($name);

        if (in_array($name, $this->valid_properties) == false) {
            throw new \Exception("{$name} is not a valid property, valid properties are: " . implode(", ", $this->valid_properties));
        }

        if ($bindable == false) {
            $this->properties[self::$PROPERTY_STATIC][$name] = $value;
        } else {
            $this->properties[self::$PROPERTY_BINDABLE][$name] = $value;
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        $data = $this->properties[self::$PROPERTY_STATIC];
        $bindableProperties = $this->properties[self::$PROPERTY_BINDABLE];
        if (sizeof($bindableProperties) != 0) {
            $data['bind'] = $bindableProperties;
        }

        return $data;
    }

    /**
     * Set the valid properties for this object
     * @param array $properties
     */
    protected function setValidProperties(array $properties)
    {
        $this->valid_properties = array_unique(array_merge($this->valid_properties, $properties));
    }

    /**
     * Returns the properties of the given class and its Traits
     * @param \ReflectionClass $class
     * @return array
     */
    private function matchProperties(\ReflectionClass $class)
    {
        $matchReg = '/@method\s+[a-zA-Z]+\s+set([a-zA-Z]+)\(/';
        $properties = [];

        $doc_matches = [];
        preg_match_all($matchReg, $class->getDocComment(), $doc_matches);
        $properties = array_merge($properties, array_map("lcfirst", $doc_matches[1]));

        // Get properties of any traits
        foreach ($class->getTraits() as $trait)
        {
            $properties = array_merge($properties, $this->matchProperties($trait));
        }

        return array_unique($properties);
    }

    /**
     * Parses the class doc comment and fetches all properties by
     * looking for set{Property} methods
     * @return array
     */
    protected function getClassProperties()
    {
        $classname = get_class($this);
        $cached = [];
        $properties = [];

        if (array_key_exists($classname, $cached)) {
            return $cached[$classname];
        }

        $class = new \ReflectionClass($classname);
        $properties = array_merge($properties, $this->matchProperties($class));
        while ($parent = $class->getParentClass()) {
            $class = $parent;
            $properties = array_merge($properties, $this->matchProperties($class));
        }

        $cached[$classname] = array_unique($properties);
        return $cached[$classname];
    }

    /**
     * JSON Serializes the @c AbstractComponent
     *
     * The output format is valid Extjs syntax
     *
     * @return string
     */
    public function jsonSerialize()
    {
        return $this->getProperties();
    }
}
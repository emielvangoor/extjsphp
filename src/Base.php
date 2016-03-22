<?php

namespace Bonsa\Extphp;

/**
 * Class Base
 * @package Bonsa\Extphp
 */
abstract class Base implements \JsonSerializable
{
    /**
     * Contains the list of valid properties
     * @var array
     */
    protected $valid_properties = [];

    /**
     * @var array
     */
    protected $properties = [
        self::PROPERTY_STATIC => [],
        self::PROPERTY_BINDABLE => [],
    ];

    /**
     * Defines a static type
     * @var string
     */
    const PROPERTY_STATIC = 'static';

    /**
     * Defines a bindable typ
     * @var string
     */
    const PROPERTY_BINDABLE = 'bindable';

    /**
     * Magic property setting
     *
     * @param string $name
     * @param array $arguments
     * @throws \Exception
     * @return Base Will return self for set* and will return mixed on get*
     */
    public function __call($name, array $arguments)
    {
        $property = lcfirst(substr($name, 3));

        $body = "";
        if (isset($arguments[0])) {
            $body = $arguments[0];
        }

        $type = self::PROPERTY_STATIC;
        if (isset($arguments[1])) {
            if (in_array($arguments[1], [self::PROPERTY_STATIC, self::PROPERTY_BINDABLE]) == false) {
                throw new \Exception("{$arguments[1]} not accepted as type, valid options are 'static' or 'bindable'");
            }
            $type = $arguments[1];
        }

        switch(substr($name, 0, 3))
        {
            case 'get':
                return $this->getproperty($property);
            case 'set':
                return $this->setproperty($property, $body, $type);
            default:
                throw new \InvalidArgumentException("{$name} not valid");
        }
    }

    /**
     * returns the value of the given property
     * @param string $property
     * @return string|null
     */
    public function getProperty($property)
    {
        foreach ([self::PROPERTY_STATIC, self::PROPERTY_BINDABLE] as $type) {
            if (array_key_exists($property, $this->properties[$type])) {
                return $this->properties[$type][$property];
            }
        }

        return null;
    }

    /**
     * Sets a property
     *
     * Will check if the property is valid for this component
     *
     * @param string $name The name of the property
     * @param mixed $value the property values
     * @param string $type
     * @return AbstractComponent
     * @throws \Exception
     */
    public function setProperty($name, $value, $type = self::PROPERTY_STATIC)
    {
        $name = lcfirst($name);

        if (in_array($name, $this->valid_properties) === false) {
            throw new \Exception(
                "{$name} is not a valid property, valid properties are: " . implode(", ", $this->valid_properties)
            );
        }

        $this->properties[$type][$name] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        $data = $this->properties[self::PROPERTY_STATIC];
        $bindableProperties = $this->properties[self::PROPERTY_BINDABLE];
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

        $docMatches = [];
        preg_match_all($matchReg, $class->getDocComment(), $docMatches);
        $properties = array_merge($properties, array_map("lcfirst", $docMatches[1]));

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

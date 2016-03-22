<?php

namespace Bonsa\Extphp;

class ViewModel implements \JsonSerializable
{
    /**
     * @var array
     */
    private $data;

    /**
     * Set a value on the viewmodel
     * @param string $key
     * @param string $value
     * @return ViewModel
     */
    public function set($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * Get value from the viewmodel
     * @param string $key
     */
    public function get($key)
    {
        return $this->data[$key];
    }

    public function hasData()
    {
        return sizeof($this->data) > 0;
    }

    public function jsonSerialize()
    {
        if (sizeof($this->data) > 0) {
            return ['data' => $this->data];
        }

        return "";
    }
}

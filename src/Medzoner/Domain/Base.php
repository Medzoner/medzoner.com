<?php

namespace Medzoner\Domain;

/**
 * Class Base
 */
class Base
{
    /**
     * @var
     */
    protected $options = [];

    /**
     * @param string $name
     *
     * @return null
     */
    public function getParam($name)
    {
        if (!array_key_exists($name, $this->options)) {
            return null;
        }

        return $this->options[$name];
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->options;
    }
}

<?php

namespace Medzoner\Query;

/**
 * Class BaseQuery
 */
class BaseQuery
{
    /**
     * @var
     */
    protected $options;

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
}

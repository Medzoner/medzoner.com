<?php

namespace Medzoner\GlobalBundle\Model;

/**
 * Class ModelCollection
 *
 */
class ModelCollection implements \Countable, \IteratorAggregate
{
    /**
     * @var array
     */
    private $elements;

    /**
     * ModelCollection constructor.
     *
     * @param array $elements
     */
    public function __construct(array $elements = array())
    {
        $this->elements = $elements;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->elements);
    }

    /**
     * @param $value
     * @return bool
     */
    public function add($value)
    {
        $this->elements[] = $value;

        return true;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->elements);
    }

    /**
     * Returns a string representation of this object.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . '@' . spl_object_hash($this);
    }
}

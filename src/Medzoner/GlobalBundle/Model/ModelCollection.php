<?php

namespace Medzoner\GlobalBundle\Model;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * Class ModelCollection
 *
 */
class ModelCollection implements Countable, IteratorAggregate, ArrayAccess
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
    public function count(): int
    {
        return count($this->elements);
    }

    /**
     * @param $value
     * @return bool
     */
    public function add($value): bool
    {
        $this->elements[] = $value;

        return true;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->elements);
    }

    /**
     * Returns a string representation of this object.
     *
     * @return string
     */
    public function __toString(): string
    {
        return __CLASS__ . '@' . spl_object_hash($this);
    }

    /**
     * @param int $offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->elements[$offset]) || array_key_exists($offset, $this->elements);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->elements[$offset]) ? $this->elements[$offset] : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void
    {
        $this->elements[$offset] = $value;
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetUnset($offset)
    {
        if (!isset($this->elements[$offset]) && !array_key_exists($offset, $this->elements)) {
            return null;
        }

        $removed = $this->elements[$offset];
        unset($this->elements[$offset]);

        return $removed;
    }
}

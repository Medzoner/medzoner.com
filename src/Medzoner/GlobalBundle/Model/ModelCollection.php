<?php

namespace Medzoner\GlobalBundle\Model;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * Class ModelCollection
 *
 */
class ModelCollection implements Countable, IteratorAggregate
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
}

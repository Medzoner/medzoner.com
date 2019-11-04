<?php

namespace Tests\Unit\Domain\Model;

use ArrayIterator;
use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Model\ModelCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ModelCollectionTest
 */
class ModelCollectionTest extends WebTestCase
{
    public function test_empty()
    {
        $this->assertEquals(new ModelCollection(), new ModelCollection());
        $this->assertInstanceOf(ArrayIterator::class, (new ModelCollection())->getIterator());
        $this->assertIsString((new ModelCollection())->__toString());
        $this->assertFalse((new ModelCollection())->offsetExists(10));
        $this->assertNull((new ModelCollection())->offsetSet(0, new JobBoard()));
        $this->assertNull((new ModelCollection())->offsetUnset(10));
    }

    public function test_collection()
    {
        $jobBoard = (new JobBoard());
        $collection = new ModelCollection([$jobBoard]);
        $this->assertCount(1, $collection);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
        $this->assertIsString($collection->__toString());
        $this->assertTrue($collection->offsetExists(0));
        $this->assertNull($collection->offsetSet(1, new JobBoard()));
        $this->assertCount(2, $collection);
        $collection->offsetUnset(1);
        $this->assertCount(1, $collection);
    }
}

<?php

namespace Tests\Unit\Domain\Model;

use ArrayIterator;
use Medzoner\GlobalBundle\Model\ModelCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ModelCollectionTest
 */
class ModelCollectionTest extends WebTestCase
{
    public function testGetNumberOfEmployeeFromLetter()
    {
        $this->assertEquals(new ModelCollection(), new ModelCollection());
    }

    public function test_iterator()
    {
        $this->assertInstanceOf(ArrayIterator::class, (new ModelCollection())->getIterator());
    }

    public function test_tostring()
    {
        $this->assertIsString((new ModelCollection())->__toString());
    }
}

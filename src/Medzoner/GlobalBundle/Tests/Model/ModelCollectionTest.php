<?php

namespace Medzoner\GlobalBundle\Tests\Model;

use Medzoner\GlobalBundle\Model\ModelCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ModelCollectionTest
 */
class ModelCollectionTest extends WebTestCase
{
    /**
     *
     */
    public function testGetNumberOfEmployeeFromLetter()
    {
        $this->assertEquals(new ModelCollection(), new ModelCollection());
    }
}

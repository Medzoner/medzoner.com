<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

/**
 * Class StackProvider
 */
class StackProvider
{
    /**
     * @return array
     */
    public static function getStack()
    {
        return json_decode(file_get_contents(__DIR__.'/stacks.json'), true);
    }
}

<?php

namespace Medzoner\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MedzonerUserBundle
 * @package Medzoner\UserBundle
 */
class MedzonerUserBundle extends Bundle
{
    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}

<?php

namespace Medzoner\GlobalBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class RegisterContactEvent.
 */
class RegisterContactEvent extends Event
{
    public function __construct(
        EventStorage $eventStorage
    ) {

    }

    const NAME = 'register.contact';
}

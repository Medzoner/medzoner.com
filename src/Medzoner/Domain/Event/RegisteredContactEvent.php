<?php

namespace Medzoner\Domain\Event;

use Medzoner\Domain\Model\ContactModel;

/**
 * Class RegisteredContactEvent
 */
class RegisteredContactEvent
{
    /**
     * @var
     */
    private $contact;

    /**
     * @return ContactModel
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param ContactModel $contact
     */
    public function setContact(ContactModel $contact)
    {
        $this->contact = $contact;
    }
}

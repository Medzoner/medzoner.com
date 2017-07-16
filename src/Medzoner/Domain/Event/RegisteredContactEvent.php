<?php

namespace Medzoner\Domain\Event;

use Medzoner\Domain\Model\ContactModel;
use SimpleBus\Message\Name\NamedMessage;
use JMS\Serializer\Annotation\Type;

/**
 * Class RegisteredContactEvent
 */
class RegisteredContactEvent implements NamedMessage
{
    /**
     * @Type("Medzoner\Domain\Model\ContactModel")
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

    /**
     * @return string
     */
    public static function messageName()
    {
        return 'registered_contact_event';
    }
}

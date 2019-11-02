<?php

namespace Medzoner\Domain\Model;

use DateTime;

/**
 * Class ContactModel
 */
class ContactModel implements ContactInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var DateTime
     */
    protected $dateAdd;

    public function setName($name): ContactInterface
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail($email): ContactInterface
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setMessage($message): ContactInterface
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setDateAdd($dateAdd): ContactInterface
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    public function getDateAdd(): DateTime
    {
        return $this->dateAdd;
    }
}

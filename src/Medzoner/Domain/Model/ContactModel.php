<?php

namespace Medzoner\Domain\Model;

use JMS\Serializer\Annotation\Type;

/**
 * Class ContactModel
 */
class ContactModel
{
    /**
     * @Type("string")
     * @var
     */
    private $name;

    /**
     * @Type("string")
     * @var
     */
    private $email;

    /**
     * @Type("string")
     * @var
     */
    private $message;

    /**
     * @Type("DateTime")
     * @var
     */
    private $dateAdd;

    /**
     * @param $name
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param $message
     * @return $this
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param $dateAdd
     * @return $this
     */
    public function setDateAdd($dateAdd) {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    /**
     * Get dateAdd
     *
     * @return \DateTime
     */
    public function getDateAdd() {
        return $this->dateAdd;
    }
}

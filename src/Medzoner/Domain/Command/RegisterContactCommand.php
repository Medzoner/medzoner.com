<?php

namespace Medzoner\Domain\Command;

use Medzoner\Domain\Base;

/**
 * Class RegisterContactCommand
 */
class RegisterContactCommand extends Base
{
    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $message;

    /**
     * @var
     */
    private $dateAdd;

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
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
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param $message
     * @return $this
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
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
     * @return \DateTime
     */
    public function getDateAdd() {
        return $this->dateAdd;
    }
}

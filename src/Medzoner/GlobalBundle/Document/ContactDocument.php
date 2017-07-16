<?php

namespace Medzoner\GlobalBundle\Document;

use Medzoner\Domain\Model\ContactModel;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Contact
 *
 * @MongoDB\Document(collection="league", repositoryClass="Medzoner\GlobalBundle\Repository\ContactRepositoryODM")
 * @MongoDB\Document
 */
class ContactDocument extends ContactModel
{
    /**
     * @var integer
     *
     * @MongoDB\Id
     */
    private $id;

    /**
     *
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     *
     * @MongoDB\Field(type="string")
     */
    private $email;

    /**
     *
     * @MongoDB\Field(type="string")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @MongoDB\Field(type="date")
     */
    private $dateAdd;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ContactDocument
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ContactDocument
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
     * Set dateAdd
     *
     * @param \DateTime $dateAdd
     * @return ContactDocument
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

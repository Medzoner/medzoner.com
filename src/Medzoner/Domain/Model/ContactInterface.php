<?php

namespace Medzoner\Domain\Model;

use DateTime;

/**
 * Interface ContactInterface
 */
interface ContactInterface
{
    public function setName($name): ContactInterface;

    public function getName(): string;

    public function setEmail($email): ContactInterface;

    public function getEmail(): string;

    public function setMessage($message): ContactInterface;

    public function getMessage(): string;

    public function setDateAdd($dateAdd): ContactInterface;

    public function getDateAdd(): DateTime;
}

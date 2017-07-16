<?php

namespace Medzoner\GlobalBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Medzoner\GlobalBundle\Entity\Contact;

/**
 * Class ContactRepositoryORM
 */
class ContactRepositoryORM extends EntityRepository
{
    /**
     * @param Contact $contact
     * @param bool $flush
     */
    public function save(Contact $contact, $flush = true)
    {
        $this->_em->persist($contact);

        if ($flush) {
            $this->_em->flush();
        }
    }
}

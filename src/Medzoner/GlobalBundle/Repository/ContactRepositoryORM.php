<?php

namespace Medzoner\GlobalBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Medzoner\Domain\Model\ContactModel;

/**
 * Class ContactRepositoryORM
 */
class ContactRepositoryORM extends EntityRepository
{
    /**
     * @param ContactModel $contact
     * @param bool $flush
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(ContactModel $contact, $flush = true)
    {
        $this->_em->persist($contact);

        if ($flush) {
            $this->_em->flush();
        }
    }
}

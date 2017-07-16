<?php

namespace Medzoner\GlobalBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentManager;
use Medzoner\GlobalBundle\Document\ContactDocument;

/**
 * Class ContactRepositoryODM
 */
class ContactRepositoryODM
{
    /**
     * @var DocumentManager
     */
    private $documentManager;

    /**
     * ContactRepositoryODM constructor.
     * @param DocumentManager $documentManager
     */
    public function __construct(DocumentManager $documentManager)
    {
        $this->repository = $documentManager->getRepository('Medzoner\GlobalBundle\Document\ContactDocument');
        $this->documentManager = $documentManager;
    }

    /**
     * @param ContactDocument $contact
     */
    public function save(ContactDocument $contact)
    {
        $this->documentManager->persist($contact);
        $this->documentManager->flush();
    }
}

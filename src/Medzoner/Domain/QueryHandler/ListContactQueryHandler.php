<?php

namespace Medzoner\Domain\QueryHandler;

use Medzoner\Domain\Query\ListContactQuery;
use Medzoner\GlobalBundle\Repository\ContactRepositoryODM;

/**
 * Class ListContactQueryHandler
 */
class ListContactQueryHandler
{
    /**
     * @var ContactRepositoryODM
     */
    private $repositoryODM;

    /**
     * ListContactQueryHandler constructor.
     * @param ContactRepositoryODM $repositoryODM
     */
    public function __construct(ContactRepositoryODM $repositoryODM)
    {
        $this->repositoryODM = $repositoryODM;
    }

    /**
     * @param ListContactQuery $query
     * @return array
     */
    public function handle(ListContactQuery $query)
    {
        return $this->repositoryODM->getContacts(
            $query->getParams()
        );
    }
}

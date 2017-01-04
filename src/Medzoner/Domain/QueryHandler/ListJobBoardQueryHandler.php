<?php

namespace Medzoner\Domain\QueryHandler;

use Medzoner\GlobalBundle\Model\ModelCollection;
use Medzoner\GlobalBundle\Services\JobBoardServiceInterface;
use Medzoner\Domain\Query\ListJobBoardQuery;

/**
 * Class ListJobBoardQueryHandler
 */
class ListJobBoardQueryHandler
{
    /**
     * @var JobBoardServiceInterface
     */
    private $jobBoardService;

    /**
     * JobBoardQueryHandler constructor.
     *
     * @param JobBoardServiceInterface $jobBoardService
     */
    public function __construct(JobBoardServiceInterface $jobBoardService)
    {
        $this->jobBoardService = $jobBoardService;
    }

    /**
     * @param ListJobBoardQuery $jobBoardQuery
     *
     * @return ModelCollection
     */
    public function handle(ListJobBoardQuery $jobBoardQuery)
    {
        return $this->jobBoardService->getJobBoardByLang(
            $jobBoardQuery->getLang()
        );
    }
}

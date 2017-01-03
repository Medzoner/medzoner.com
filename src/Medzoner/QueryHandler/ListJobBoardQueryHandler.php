<?php

namespace Medzoner\QueryHandler;

use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Services\JobBoardServiceInterface;
use Medzoner\Query\ListJobBoardQuery;

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
     * @return JobBoard
     */
    public function handle(ListJobBoardQuery $jobBoardQuery)
    {
        return $this->jobBoardService->getJobBoardByLang(
            $jobBoardQuery->getLang()
        );
    }
}

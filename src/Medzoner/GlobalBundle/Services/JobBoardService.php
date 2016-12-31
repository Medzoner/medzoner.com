<?php

namespace Medzoner\GlobalBundle\Services;

use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Provider\JobBoard\JobBoardProvider;

/**
 * Class JobBoardService
 */
class JobBoardService
{
    /**
     * @var JobBoard
     */
    private $jobBoard;

    /**
     * JobBoardService constructor.
     *
     * @param JobBoardProvider $jobBoardProvider
     */
    public function __construct(JobBoardProvider $jobBoardProvider)
    {

        $this->jobBoard = $jobBoardProvider;
    }

    /**
     * @return array
     */
    public function getJobBoard()
    {
        return $this->jobBoard->getJobBoards();
    }

    /**
     * @param JobBoard $jobBoard
     */
    public function setJobBoard($jobBoard)
    {
        $this->jobBoard = $jobBoard;
    }
}

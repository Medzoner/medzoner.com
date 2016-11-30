<?php

namespace Medzoner\GlobalBundle\Services;

use Medzoner\GlobalBundle\Model\JobBoard;

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
     * @param JobBoard $jobBoard
     */
    public function __construct(JobBoard $jobBoard)
    {

        $this->jobBoard = $jobBoard;
    }

    /**
     * @return array
     */
    public function getJobBoard()
    {
        return $this->jobBoard->getParts();
    }

    /**
     * @param JobBoard $jobBoard
     */
    public function setJobBoard($jobBoard)
    {
        $this->jobBoard = $jobBoard;
    }
}

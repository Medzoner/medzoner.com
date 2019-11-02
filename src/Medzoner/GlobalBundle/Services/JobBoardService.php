<?php

namespace Medzoner\GlobalBundle\Services;

use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Model\ModelCollection;
use Medzoner\GlobalBundle\Provider\JobBoard\JobBoardProvider;

/**
 * Class JobBoardService
 */
class JobBoardService implements JobBoardServiceInterface
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
     * @param $lang
     *
     * @return ModelCollection
     */
    public function getJobBoardByLang($lang)
    {
        return $this->jobBoard->getJobBoards($lang);
    }
}

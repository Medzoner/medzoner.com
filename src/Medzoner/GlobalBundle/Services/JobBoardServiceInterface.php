<?php

namespace Medzoner\GlobalBundle\Services;

use Medzoner\GlobalBundle\Model\ModelCollection;
use Medzoner\Query\ListJobBoardQuery;

/**
 * Interface JobBoardServiceInterface
 */
interface JobBoardServiceInterface
{
    /**
     * @param $lang
     *
     * @return ModelCollection
     */
    public function getJobBoardByLang($lang);
}

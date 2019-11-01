<?php

namespace Medzoner\GlobalBundle\Services;

use Medzoner\GlobalBundle\Model\ModelCollection;

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

<?php

namespace Medzoner\Domain\Query;

use Medzoner\Domain\Base;

/**
 * Class ListJobBoardQuery
 */
class ListJobBoardQuery extends Base
{
    /**
     * ListJobBoardQuery constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->options = array_replace(
            [
                'lang'     => 'fr',
            ],
            $options
        )
        ;
    }

    /**
     * @param string $name
     *
     * @return null
     */
    public function getLang($name = 'lang')
    {
        return $this->getParam(!$name?:$name);
    }
}

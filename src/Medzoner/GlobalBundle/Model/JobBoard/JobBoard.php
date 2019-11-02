<?php

namespace Medzoner\GlobalBundle\Model\JobBoard;

/**
 * Class JobBoard
 */
class JobBoard
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var
     */
    private $contents;

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param mixed $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }
}

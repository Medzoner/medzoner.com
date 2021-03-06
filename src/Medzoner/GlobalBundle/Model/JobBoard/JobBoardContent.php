<?php

namespace Medzoner\GlobalBundle\Model\JobBoard;

/**
 * Class JobBoardContent
 */
class JobBoardContent
{
    /**
     * @var
     */
    private $title;

    /**
     * @var
     */
    private $content;

    /**
     * @var
     */
    private $description;

    /**
     * @var
     */
    private $logos;

    /**
     * @return mixed
     */
    public function getTitle()
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLogos()
    {
        return $this->logos;
    }

    /**
     * @param mixed $logos
     * @return JobBoardContent
     */
    public function setLogos($logos)
    {
        $this->logos = $logos;
        return $this;
    }
}

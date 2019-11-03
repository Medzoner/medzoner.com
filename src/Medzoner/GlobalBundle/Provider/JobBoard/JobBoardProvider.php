<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

use Medzoner\GlobalBundle\Model\JobBoard\JobBoard;
use Medzoner\GlobalBundle\Model\JobBoard\JobBoardContent;
use Medzoner\GlobalBundle\Model\ModelCollection;

/**
 * Class JobBoardProvider
 */
class JobBoardProvider
{
    /**
     * @var JobBoard
     */
    private $jobBoard;
    /**
     * @var JobBoardContent
     */
    private $jobBoardContent;

    /**
     * @param $lang
     *
     * @return ModelCollection
     */
    public function getJobBoards($lang)
    {
        $collection = new ModelCollection();

        if (!$lang) {
            return $collection;
        }

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('');
        $this->jobBoard->setContents($this->getJobBoardContents(0));
        $collection->add($this->jobBoard);

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('EXPÉRIENCES PROFESSIONNELLES');
        $this->jobBoard->setContents($this->getJobBoardContents(1));
        $collection->add($this->jobBoard);

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('FORMATIONS');
        $this->jobBoard->setContents($this->getJobBoardContents(2));
        $collection->add($this->jobBoard);

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('LANGUES');
        $this->jobBoard->setContents($this->getJobBoardContents(3));
        $collection->add($this->jobBoard);

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('ACTIVITES ET PROJETS DIVERS');
        $this->jobBoard->setContents($this->getJobBoardContents(4));
        $collection->add($this->jobBoard);

        $this->jobBoard = new JobBoard();
        $this->jobBoard->setTitle('GITHUB');
        $this->jobBoard->setContents($this->getJobBoardContents(5));
        $collection->add($this->jobBoard);

        return $collection;
    }

    /**
     * @param $key
     * @return ModelCollection
     */
    public function getJobBoardContents($key)
    {
        $subparts = $this->getAllSubparts()[$key];

        $collection = new ModelCollection();
        foreach ($subparts as $subpart) {
            $this->jobBoardContent = new JobBoardContent();
            !isset($subpart['sub_title']) ?: $this->jobBoardContent->setTitle($subpart['sub_title']);
            !isset($subpart['sub_content']) ?: $this->jobBoardContent->setContent($subpart['sub_content']);
            !isset($subpart['sub_description']) ?: $this->jobBoardContent->setDescription($subpart['sub_description']);
            !isset($subpart['sub_logos']) ?: $this->jobBoardContent->setLogos($subpart['sub_logos']);
            $collection->add($this->jobBoardContent);
        }

        return $collection;
    }

    /**
     * @return array
     */
    public function getAllSubparts()
    {
        return json_decode(file_get_contents(__DIR__.'/subparts.json'), true);
    }
}

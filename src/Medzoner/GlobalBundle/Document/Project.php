<?php

namespace Medzoner\GlobalBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Project {

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $name;

    /**
     * @MongoDB\Date
     */
    protected $date;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $url;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $image;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $screen1;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $screen2;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $screen3;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $description;


    /**
     * Get id
     *
     * @return $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param $date
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set screen1
     *
     * @param string $screen1
     * @return self
     */
    public function setScreen1($screen1)
    {
        $this->screen1 = $screen1;
        return $this;
    }

    /**
     * Get screen1
     *
     * @return string $screen1
     */
    public function getScreen1()
    {
        return $this->screen1;
    }

    /**
     * Set screen2
     *
     * @param string $screen2
     * @return self
     */
    public function setScreen2($screen2)
    {
        $this->screen2 = $screen2;
        return $this;
    }

    /**
     * Get screen2
     *
     * @return string $screen2
     */
    public function getScreen2()
    {
        return $this->screen2;
    }

    /**
     * Set screen3
     *
     * @param string $screen3
     * @return self
     */
    public function setScreen3($screen3)
    {
        $this->screen3 = $screen3;
        return $this;
    }

    /**
     * Get screen3
     *
     * @return string $screen3
     */
    public function getScreen3()
    {
        return $this->screen3;
    }
}

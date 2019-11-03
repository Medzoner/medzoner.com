<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

/**
 * Class ExperienceProvider
 */
class ExperienceProvider
{
    /**
     * @return array
     */
    public static function getExperience()
    {
        return json_decode(file_get_contents(__DIR__.'/experiences.json'), true);
    }
}

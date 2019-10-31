<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

/**
 * Class OtherProvider
 */
class OtherProvider
{
    /**
     * @return array
     */
    public static function getOther()
    {
        return [
            'Internet' => [
                [
                    'title' => 'Local and online',
                ],
            ],
            'CoinhiveBundle' => [
                [
                    'title' => 'https://github.com/Medzoner/CoinhiveBundle',
                ],
            ],
        ];
    }
}

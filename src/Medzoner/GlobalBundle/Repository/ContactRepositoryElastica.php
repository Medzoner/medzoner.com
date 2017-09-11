<?php

namespace Medzoner\GlobalBundle\Repository;

use Elastica\Query;
use Elastica\Query\MatchAll;
use FOS\ElasticaBundle\Repository;

/**
 * Class ContactRepositoryElastica
 */
class ContactRepositoryElastica extends Repository
{
    /**
     * @param $search
     * @return array
     */
    public function search($search)
    {
        if ($search) {
            $query = new Query\MultiMatch();
            $query->setFields(['email', 'name']);
            $query->setQuery($search);
        } else {
            $query = new MatchAll();
        }

        return $this->find($query);
    }
}

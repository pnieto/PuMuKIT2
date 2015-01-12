<?php

namespace Pumukit\EncoderBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * JobRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JobRepository extends DocumentRepository
{
    /**
     * Find all jobs with given status
     */
    public function findWithStatus(array $status)
    {
        return $this->createQueryBuilder()
          ->field('status_id')->in($status)
          ->getQuery()
          ->execute();
    }
}
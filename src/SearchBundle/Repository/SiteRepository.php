<?php

namespace SearchBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class SiteRepository
 */
class SiteRepository extends EntityRepository
{
    public function findByUrl($url)
    {
        $builder = $this->createQueryBuilder('s');
        $builder->select('s');
        $builder->andWhere('s.url LIKE :url');
        $builder->setParameter('url', '%' . $url . '%');
        $builder->addOrderBy('s.rate', 'ASC');

        return $builder->getQuery()->getResult();
    }
}
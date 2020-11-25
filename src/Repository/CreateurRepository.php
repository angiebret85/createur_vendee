<?php

namespace App\Repository;

use App\Entity\Createur;
use App\Entity\CreateurSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Migrations\Query\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Createur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Createur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Createur[]    findAll()
 * @method Createur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Createur::class);
    }

    /**
     * @param CreateurSearch $search
     * @return \Doctrine\ORM\Query
     */
    public function findCategorieQuery(CreateurSearch $search): \Doctrine\ORM\Query
    {
        $query = $this->findAllCreateurs();

        if ($search->getCategories()->count() > 0){
            $k=0;
           foreach($search->getCategories() as $categorie){
               $k++;
               $query = $query
                ->andWhere(":categorie$k MEMBER OF p.categories")
                ->setParameter("categorie$k", $categorie);
           }
        }
        return $query->getQuery();
    }

    /**
     * @param CreateurSearch $search
     * @return \Doctrine\ORM\Query
     */
    public function findAllQuery(CreateurSearch $search): \Doctrine\ORM\Query
    {
        $query = $this->findAllCreateurs();

        if ($search->getcodePostalSearch()){
            $query = $query
                ->andwhere('p.codepostal = :codePostalSearch')
                ->setParameter('codePostalSearch', $search->getcodePostalSearch());
        }
        if($search->getvilleSearch()){
            $query = $query
                ->andWhere('p.ville = :villeSearch')
                ->setParameter('villeSearch', $search->getvilleSearch());
        }
        if ($search->getCategories()->count() > 0){
            $k=0;
           foreach($search->getCategories() as $categorie){
               $k++;
               $query = $query
                ->andWhere(":categorie$k MEMBER OF p.categories")
                ->setParameter("categorie$k", $categorie);
           }
        }
        if($search->getLat() && $search->getLng() && $search->getDistance()){
            $query = $query
            ->select('p')
                ->andWhere('(6353 * 2 * ASIN(SQRT( POWER(SIN((p.lat - :lat) *  pi()/180 / 2), 2) +COS(p.lat * pi()/180) * COS(:lat * pi()/180) * POWER(SIN((p.lng - :lng) * pi()/180 / 2), 2) ))) <= :distance')
                ->setParameter('lng', $search->getLng())
                ->setParameter('lat', $search->getLat())
                ->setParameter('distance', $search->getDistance());
        }
        return $query->getQuery();
    }
    /**
     * @return Createur[]
     */
    public function findLatest(): array
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
    }

    
    public function findAllCreateurs(): QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }



    // /**
    //  * @return Createur[] Returns an array of Createur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Createur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php
namespace App\Repository;

use App\Entity\FacebookFriends;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method FacebookFriends|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacebookFriends|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacebookFriends[]    findAll()
 * @method FacebookFriends[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacebookFriendsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FacebookFriends::class);
    }

    public function findAllCouple(array $ids): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT ff.user_id, ff.friend_id FROM App\Entity\FacebookFriends ff WHERE ff.user_id in (:user_id)'
        )->setParameter('user_id', $ids);

        return $query->getResult();
    }
}
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


    /*public function testTeothy() {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "WITH RECURSIVE paths (cur_path, cur_dest, tot_distance) AS ( SELECT CAST(user_id AS CHAR(100)), CAST(user_id AS CHAR(100)), 0 FROM facebook_friends WHERE user_id=1 UNION SELECT CONCAT(paths.cur_path, ' ', facebook_friends.friend_id), facebook_friends.friend_id, paths.tot_distance+1 FROM paths, facebook_friends WHERE paths.cur_dest = facebook_friends.user_id AND NOT FIND_IN_SET(facebook_friends.friend_id, REPLACE(paths.cur_path,' ',',') ) ) SELECT * FROM paths WHERE cur_dest=11 ORDER BY tot_distance ASC LIMIT 1"
        );

        return $query->getResult();
    }*/

}
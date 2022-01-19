<?php

namespace App\Entity;

use App\Repository\FacebookFriendsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacebookFriendsRepository::class)
 */
class FacebookFriends
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="bigint")
     */
    private $user_id;


    /**
     * @ORM\Column(type="bigint")
     */
    private $friend_id;


    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $friend_name;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return (int) $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getFriendId(): int
    {
        return (int) $this->friend_id;
    }

    public function setFriendId(int $friend_id): self
    {
        $this->friend_id = $friend_id;

        return $this;
    }




    public function getFriendName(): string
    {
        return (string) $this->friend_name;
    }

    public function setFriendName(string $friend_name): self
    {
        $this->friend_name = $friend_name;

        return $this;
    }



}
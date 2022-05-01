<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    private $hash;

    public function __construct( UserPasswordHasherInterface $hash)
    {
        $this->hash = $hash;
    }

    public function load(ObjectManager $manager): void
    {
        
        $user = new User();
        $user->setUsername("Admin")
        ->setRoles(['ROLE_ADMIN'])
        ->setAvatar("NoAvailable.png")
        ->setPassword($this->hash->hashPassword($user, "Password"));

        $user2 = new User();
        $user2->setUsername("User")
        ->setRoles(['ROLE_USER'])
        ->setAvatar("NoAvailable.png")
        ->setPassword($this->hash->hashPassword($user2, "Password"));

        $manager->persist($user2);
        $manager->flush();
        $manager->persist($user);
        $manager->flush();
    }
}


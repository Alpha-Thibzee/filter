<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 1; $i <11 ; $i++){
            $task = new Task();
            $task->setTitle("Titre n°".$i);
            $task->setContent("Contenu n°".$i);
            $manager->persist($task);
            $manager->flush();
        }
        

        
    }
}

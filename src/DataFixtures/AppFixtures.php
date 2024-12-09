<?php

namespace App\DataFixtures;

use App\Factory\ArticlesExclusiveFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ArticlesExclusiveFactory::createMany(40);
    }
}

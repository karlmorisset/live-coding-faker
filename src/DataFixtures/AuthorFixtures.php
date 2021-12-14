<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Author;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuthorFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 20 ; $i++) {
            $author = new Author();
            $author->setFirstname($this->faker->firstName);
            $author->setLastname($this->faker->lastName);
            $author->setBirthdate($this->faker->date('Y-m-d', 'now'));

            $manager->persist($author);
            $this->addReference("author_".$i, $author);
        }

        $manager->flush();
    }
}

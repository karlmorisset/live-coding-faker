<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Book;
use App\DataFixtures\AuthorFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 10 ; $i++) {
            $book = new Book();
            $book->setTitle($this->faker->realText(15, 2));
            $book->setIsbn($this->faker->isbn13);
            $book->setPages($this->faker->numberBetween(35, 557));
            $book->setCover("https://picsum.photos/480/720?random=". $i);
            $book->setAuthor($this->getReference('author_'.$this->faker->numberBetween(0, 19)));

            $manager->persist($book);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
    }
}

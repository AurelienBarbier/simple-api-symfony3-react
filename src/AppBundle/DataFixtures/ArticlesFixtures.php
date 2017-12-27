<?php
namespace AppBundle\DataFixtures;

use AppBundle\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create();
        // create 20 products! Bam!
        for ($i = 0; $i < 20; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence());
            $article->setAbstract($faker->paragraph());
            $article->setContent($faker->text());
            $article->setUpdatedAt($faker->dateTimeThisYear());
            $article->setCreatedAt($faker->dateTimeThisYear());
            $article->setPublished($faker->boolean());
            $article->setThumb($faker->imageUrl());

            $manager->persist($article);
        }

        $manager->flush();
    }
}

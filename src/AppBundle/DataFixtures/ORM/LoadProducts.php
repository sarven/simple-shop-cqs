<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product\Product;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class LoadProducts
 * @package AppBundle\DataFixtures\ORM
 */
class LoadProducts extends AbstractFixture
{
    const COUNT = 50;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::COUNT; $i++) {
            $product = new Product(
                $faker->title,
                substr($faker->paragraph(3), 0, 100),
                random_int(1, 1000) + random_int(0, 100) / 100
            );
            $manager->persist($product);
        }

        $manager->flush();
    }
}
<?php
use teachme\Entities\Ticket;
use Faker\Generator;
use Faker\Factory as Faker;


/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 28-09-16
 * Time: 3:14 PM
 */
class TicketTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'title'=>$faker->sentence(),
            'status'=>$faker->randomElement(['open','open','closed']),
            'user_id'=>1

        ];
    }

    public function run()
    {
        return $this->createMultiple(50);
    }

}
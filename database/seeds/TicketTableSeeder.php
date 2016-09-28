<?php
use Faker\Generator;
use teachme\Entities\Ticket;


class TicketTableSeeder extends BaseSeeder
{
    use SeederTrait;

    public function run()
    {
        $this->createMultipleEntities(2);
    }

    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = [ ])
    {
        return [
            'title'   => $faker->sentence(),
            'status'  => $faker->randomElement([ 'open', 'open', 'closed' ]),
            'user_id' => $this->getRandomEntityFromModel('teachme\Entities\User')->id
        ];
    }

}
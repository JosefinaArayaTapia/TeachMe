<?php
use Faker\Generator;

use teachme\Entities\TicketVote;


/**
 * Created by IntelliJ IDEA.
 * User: Josefina
 * Date: 08-10-16
 * Time: 19:30
 */
class TicketVoteTableSeeder extends BaseSeeder
{
    use SeederTrait;

    public function getModel()
    {
        return new TicketVote();
    }

    public function getDummyData(Generator $faker, array $customValues = [])
    {
        return [

            'user_id' => $this->getRandomEntityFromModel('teachme\Entities\User')->id,
            'ticket_id' => $this->getRandomEntityFromModel('teachme\Entities\Ticket')->id

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMultipleEntities(30);
    }
}
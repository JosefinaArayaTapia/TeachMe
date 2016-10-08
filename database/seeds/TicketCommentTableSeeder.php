<?php
use Faker\Generator;
use teachme\Entities\TicketComment;

/**
 * Created by IntelliJ IDEA.
 * User: Josefina
 * Date: 08-10-16
 * Time: 19:39
 */
class TicketCommentTableSeeder extends BaseSeeder
{

    use SeederTrait;
    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData(Generator $faker, array $customValues = [])
    {
        return [
            'user_id' => $this->getRandomEntityFromModel('teachme\Entities\User')->id,
            'ticket_id' => $this->getRandomEntityFromModel('teachme\Entities\Ticket')->id,
            'comment' => (string)$faker->streetName,
            'link'=> $faker->url
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMultipleEntities(100);
    }
}
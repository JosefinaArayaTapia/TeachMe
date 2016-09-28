<?php
use Faker\Generator;
use \teachme\Entities\User;


/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 27-09-16
 * Time: 4:24 PM
 */
class UserTableSeeder extends BaseSeeder
{

    use SeederTrait;

    public function run()
    {
        $this->createAdmin();
        $this->createMultipleEntities(2);
    }

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = [])
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret')
        ];
    }

    private function createAdmin()
    {
        User::create([
            'name' => 'Juan Antonio Tubío',
            'email' => 'jatubio@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
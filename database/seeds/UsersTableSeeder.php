<?php
use Faker\Generator;
use \teachme\Entities\User;
use Faker\Factory as Faker;

/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 27-09-16
 * Time: 4:24 PM
 */
class UsersTableSeeder extends BaseSeeder
{

    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name'=>$faker->name,
            'email'=>$faker->email,
            'password'=>bcrypt('secret')

        ];
    }

    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(50);

    }

    private function createAdmin()
    {
        User::create([
            'name'=>'Josefina Araya',
            'email'=>'araya.tapia.j@gmail.com',
            'password'=>bcrypt('admin')

        ]);
    }
}
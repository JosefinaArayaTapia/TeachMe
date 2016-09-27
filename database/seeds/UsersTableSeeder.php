<?php
use Illuminate\Database\Seeder;
use \teachme\Entities\User;
use Faker\Factory as Faker;

/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 27-09-16
 * Time: 4:24 PM
 */
class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdmin();
        $this->createUsers(50);

    }

    private function createAdmin()
    {
        User::create([
            'name'=>'Josefina Araya',
            'email'=>'araya.tapia.j@gmail.com',
            'password'=>bcrypt('admin')

        ]);
    }

    public function createUsers($total)
    {
        $faker = Faker::create();

        for($i=0; $i <= $total;$i++){

            User::create([

                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt('secret')

            ]);
        }
    }
}
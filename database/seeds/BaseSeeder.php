<?php
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;

/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 28-09-16
 * Time: 10:39 AM
 */
abstract class BaseSeeder extends Seeder
{


    protected function createMultiple($total,array $customValues=array())
    {
        for ($i = 0; $i <= $total; $i++) {
            $this->create($customValues);
        }
    }

    abstract public function getModel();
    abstract public function getDummyData(Generator $faker, array $customValues = array());

    protected function create(array $customValues = array())
    {

        $values = $this->getDummyData(Faker::create(), $customValues);
        $values =array_merge($values,$customValues);
        $this->getModel()->create($values);
    }


}
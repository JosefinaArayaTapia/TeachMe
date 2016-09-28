<?php


use Illuminate\Database\Seeder;

/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 28-09-16
 * Time: 10:39 AM
 */
abstract class BaseSeeder extends Seeder
{
    protected static $poolSeeders = [];

    abstract public function getModel();

    abstract public function getDummyData(\Faker\Generator $faker, array $customValues = []);

    public function __construct()
    {

        $this->addSeederToPool($this->getModel());
    }

    protected function createMultipleEntities($numberOfEntities, array $customValues = [])
    {
        for ($entitiesCounter = 1; $entitiesCounter <= $numberOfEntities; $entitiesCounter++) {
            $this->createEntity($customValues);
        }
    }

    protected function getRandomEntityFromModel($modelName)
    {

        return $this->getSeederFromPool($modelName)->getRandomEntity();
    }

    private function addSeederToPool($model)
    {
        $modelName = basename(get_class($model));
        static::$poolSeeders[$modelName] = $this;
        app('log')->log('critical', $modelName);

        return $this;
    }

    private function getSeederFromPool($modelName)

    {
        if (!$this->existsModelInSeedersPool($modelName)) {

            throw new OutOfRangeException ("The model $modelName does not exist in seeders pool");
        }

        return static::$poolSeeders[$modelName];
    }

    private function existsModelInSeedersPool($modelName)
    {

        app('log')->log('critical',$modelName);
        return array_key_exists($modelName, static::$poolSeeders);


    }

    // Note: Duplicate number of new entities on $seederClass
    protected function getEntityFromSeederClass($seederClass, array $customValues = [])
    {
        $seeder = new $seederClass;

        return $seeder->createEntity($customValues);

    }


}
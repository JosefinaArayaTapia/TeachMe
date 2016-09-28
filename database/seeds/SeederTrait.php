<?php

/**
 * Created by IntelliJ IDEA.
 * User: Macbook
 * Date: 28-09-16
 * Time: 5:03 PM
 */
use Illuminate\Database\Eloquent\Collection;
use Faker\Factory as Faker;
trait SeederTrait {
    private static $poolEntities;
    public function __construct()
    {
        static::$poolEntities = new Collection();
        parent::__construct();
    }
    protected function createEntity(array $customValues = [ ])
    {
        $dummyData = $this->getDummyData(Faker::create('es_ES'), $customValues);
        $dummyData = array_merge($dummyData, $customValues);
        return $this->addEntityToPool($this->getModel()->create($dummyData));
    }
    protected function getRandomEntity()
    {
        return static::$poolEntities->random();
    }
    private function addEntityToPool($entity)
    {
        static::$poolEntities->add($entity);
        return $entity;
    }
}
<?php

namespace RedefineLab\DataMapper;

require_once __DIR__ . '/../src/DataMapper.php';

class DataMapperTestClass {
     private $id;
     private $camelCase;
     private $test1Number;
     private $test2numbers;

     public function getId()
     {
         return $this->id;
     }

     public function setId($id)
     {
         $this->id = $id;
     }

     public function getCamelCase()
     {
         return $this->camelCase;
     }

     public function setCamelCase($camelCase)
     {
         $this->camelCase = $camelCase;
     }

     public function getTest1Number()
     {
         return $this->test1Number;
     }

     public function setTest1Number($test1Number)
     {
         $this->test1Number = $test1Number;
     }

     public function getTest2numbers()
     {
         return $this->test2numbers;
     }

     public function setTest2numbers($test2numbers)
     {
         $this->test2numbers = $test2numbers;
     }

}


class DataMapperTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var DataMapper
     */
    protected $object;
    protected $randClassName;
    
    protected function setUp()
    {
        $this->object = new DataMapper;
    }
    
    protected function tearDown()
    {

    }

    /**
     * @covers RedefineLab\DataMapper\DataMapper::arrayToObject
     */
    public function testArrayToObject()
    {
        $randId = md5(uniqid('', true));
        $randCamelCase = md5(uniqid('', true));
        $randTest1Number = md5(uniqid('', true));
        $randTest2numbers = md5(uniqid('', true));

        $className = '\RedefineLab\DataMapper\DataMapperTestClass';
        $classArray = array(
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
        );
        $actualObject = $this->object->arrayToObject($classArray, $className);

        $expectedObject = new DataMapperTestClass();
        $expectedObject->setId($randId);
        $expectedObject->setCamelCase($randCamelCase);
        $expectedObject->setTest1Number($randTest1Number);
        $expectedObject->setTest2numbers($randTest2numbers);

        $this->assertEquals($expectedObject, $actualObject);
    }

    /**
     * @covers RedefineLab\DataMapper\DataMapper::objectToArray
     */
    public function testObjectToArray()
    {
        $randId = md5(uniqid('', true));
        $randCamelCase = md5(uniqid('', true));
        $randTest1Number = md5(uniqid('', true));
        $randTest2numbers = md5(uniqid('', true));

        $expectedArray = array(
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
        );

        $object = new DataMapperTestClass();
        $object->setId($randId);
        $object->setCamelCase($randCamelCase);
        $object->setTest1Number($randTest1Number);
        $object->setTest2numbers($randTest2numbers);

        $actualArray = $this->object->objectToArray($object);

        $this->assertEquals($expectedArray, $actualArray);

    }

    /**
     * @covers RedefineLab\DataMapper\DataMapper::bulkSet
     */
    public function testBulkSet()
    {
        $randId = md5(uniqid('', true));
        $randCamelCase = md5(uniqid('', true));
        $randTest1Number = md5(uniqid('', true));
        $randTest2numbers = md5(uniqid('', true));

        $properties = array(
            4 => 'should not be there',
            '46544' => 'should not be there',
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
        );
        $actualObject = $this->object->bulkSet($properties, new DataMapperTestClass());

        $expectedObject = new DataMapperTestClass();
        $expectedObject->setId($randId);
        $expectedObject->setCamelCase($randCamelCase);
        $expectedObject->setTest1Number($randTest1Number);
        $expectedObject->setTest2numbers($randTest2numbers);

        $this->assertEquals($expectedObject, $actualObject);
    }

}
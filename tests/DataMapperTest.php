<?php

namespace RedefineLab\DataMapper;

use Enhance\Assert;

require_once __DIR__ . '/../src/DataMapper.php';

class MyTestClass {
     private $id;
     private $camelCase;
     private $test1Number;
     private $test2numbers;
     private $test300Numbers;

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

     public function getTest300Numbers()
     {
         return $this->test300Numbers;
     }

     public function setTest300Numbers($test300Numbers)
     {
         $this->test300Numbers = $test300Numbers;
     }

}

class DataMapperTest extends \Enhance\TestFixture
{

    /**
     * @var DataMapper
     */
    protected $object;
    protected $randClassName;

    public function setUp()
    {
        $this->object = new DataMapper;
    }

    public function testArrayToObject()
    {
        $randId = md5(uniqid('', true));
        $randCamelCase = md5(uniqid('', true));
        $randTest1Number = md5(uniqid('', true));
        $randTest2numbers = md5(uniqid('', true));
        $randTest300Numbers = md5(uniqid('', true));

        $className = '\RedefineLab\DataMapper\MyTestClass';
        $classArray = array(
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
            'test_300_numbers' => $randTest300Numbers,
        );
        $actualObject = $this->object->arrayToObject($classArray, $className);

        $expectedObject = new MyTestClass();
        $expectedObject->setId($randId);
        $expectedObject->setCamelCase($randCamelCase);
        $expectedObject->setTest1Number($randTest1Number);
        $expectedObject->setTest2numbers($randTest2numbers);
        $expectedObject->setTest300Numbers($randTest300Numbers);

        Assert::areIdentical($expectedObject->getId(), $actualObject->getId());
        Assert::areIdentical($expectedObject->getCamelCase(), $actualObject->getCamelCase());
        Assert::areIdentical($expectedObject->getTest1Number(), $actualObject->getTest1Number());
        Assert::areIdentical($expectedObject->getTest1Number(), $actualObject->getTest1Number());
        Assert::areIdentical($expectedObject->getTest300Numbers(), $actualObject->getTest300Numbers());
    }

    public function testObjectToArray()
    {
        $randId = md5(uniqid('', true));
        $randCamelCase = md5(uniqid('', true));
        $randTest1Number = md5(uniqid('', true));
        $randTest2numbers = md5(uniqid('', true));
        $randTest300Numbers = md5(uniqid('', true));

        $expectedArray = array(
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
            'test_300_numbers' => $randTest300Numbers,
        );

        $object = new MyTestClass();
        $object->setId($randId);
        $object->setCamelCase($randCamelCase);
        $object->setTest1Number($randTest1Number);
        $object->setTest2numbers($randTest2numbers);
        $object->setTest300Numbers($randTest300Numbers);

        $actualArray = $this->object->objectToArray($object);

        Assert::areIdentical($expectedArray, $actualArray);

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
        $randTest300Numbers = md5(uniqid('', true));

        $properties = array(
            4 => 'should not be there',
            '46544' => 'should not be there',
            'fake_property' => 'should not be there',
            'id' => $randId,
            'camel_case' => $randCamelCase,
            'test_1_number' => $randTest1Number,
            'test_2numbers' => $randTest2numbers,
            'test_300_numbers' => $randTest300Numbers,
        );
        $actualObject = $this->object->bulkSet($properties, new MyTestClass());

        $expectedObject = new MyTestClass();
        $expectedObject->setId($randId);
        $expectedObject->setCamelCase($randCamelCase);
        $expectedObject->setTest1Number($randTest1Number);
        $expectedObject->setTest2numbers($randTest2numbers);
        $expectedObject->setTest300Numbers($randTest300Numbers);

        Assert::areIdentical($expectedObject->getId(), $actualObject->getId());
        Assert::areIdentical($expectedObject->getCamelCase(), $actualObject->getCamelCase());
        Assert::areIdentical($expectedObject->getTest1Number(), $actualObject->getTest1Number());
        Assert::areIdentical($expectedObject->getTest1Number(), $actualObject->getTest1Number());
        Assert::areIdentical($expectedObject->getTest300Numbers(), $actualObject->getTest300Numbers());
        Assert::isFalse(method_exists($expectedObject, 'get46544'));
        Assert::isFalse(method_exists($expectedObject, 'getFakeProperty'));

    }

}

\Enhance\Core::runTests();
<?php

namespace RedefineLab\DataMapper;

/**
 * RedefineLab DataMapper
 * 
 * RedefineLab DataMapper is a simple library whose aim is to easily map objects
 * to arrays and arrays to objects. Useful for fast database insertion from POPO
 * and getting POPO from array fetched from database.
 *
 * @author Alessandro Perta <alessandro.perta@gmail.com>
 */
class DataMapper
{

    public function __construct()
    {
        ;
    }

    /**
     * @param array $array An array to be converted in an object
     * @param string $className The class of the returned object
     * @return object An object populated by the array
     */
    public function arrayToObject($array, $className)
    {
        $object = new $className;
        return $this->bulkSet($array, $object);
    }

    /**
     * @param object $object The object to be converted in an array
     * @param bool $removeEmptyKeys Whether to include empty properties in the final array
     * @return array The array created from the object
     */
    public function objectToArray($object, $removeEmptyKeys = false)
    {
        $array = array();
        foreach (get_class_methods($object) as $method)
        {
            if (!preg_match('@^get(?P<property>.+)@', $method, $matches))
            {
                continue;
            }
            $tempColumnName = preg_replace('@([a-zA-Z])([0-9])@', '$1_$2', lcfirst($matches['property']));
            $columnName = strtolower(preg_replace('@([a-z0-9])([A-Z])@', '$1_$2', $tempColumnName));

            $value = $object->$method();
            if ($value || !$removeEmptyKeys)
            {
                $array[$columnName] = $value;
            }
        }
        return $array;
    }

    /**
     * @param array $properties An array of properties to set on the object
     * @param object $object The object to populate from the array
     * @return object The populated object
     */
    public function bulkSet(array $properties, $object)
    {
        foreach ($properties as $property => $value)
        {
            if (is_numeric($property))
            {
                continue;
            }

            $parameterName = ucfirst(preg_replace_callback('@(_[a-z0-9])@', function ($match)
                            {
                                return strtoupper(str_replace('_', '', $match[1]));
                            }, $property));

            $method = 'set' . $parameterName;

            if (method_exists($object, $method))
            {
                $object->$method($value);
            }
        }
        return $object;
    }

}
<?php

namespace RedefineLab\DataMapper;

class DataMapper
{

    public function arrayToObject($array, $className)
    {
        $object = new $className;
        return $this->bulkSet($array, $object);
    }

    public function objectToArray($object, $removeEmptyKeys = false)
    {
        $array = array();
        foreach (get_class_methods($object) as $method)
        {
            if (!preg_match('@^get(?P<property>.+)@', $method, $matches))
            {
                continue;
            }
            $columnName = strtolower(preg_replace('@[A-Z0-9]@', '_$0', lcfirst($matches['property'])));

            $value = $object->$method();
            if ($value || !$removeEmptyKeys)
            {
                $array[$columnName] = $value;
            }
        }
        return $array;
    }

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
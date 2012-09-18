RedefineLab DataMapper
======================

What ?
------

RedefineLab DataMapper is a simple library whose aim is to easily map objects
to arrays and arrays to objects. Useful for fast database insertion from POPO
and getting POPO from array fetched from database.

Installation
------------

RedefineLab DataMapper use PHP Composer.
Update your composer.json file like so :

```json
{
    "require": {
        "redefinelab/datamapper": "1.0-dev"
    }
}
```

More info : http://getcomposer.org

Usage
-----

Please see src/DataMapper.php for the API.

Here is how methods are mapped to fields :

getProperty <=> property
getMyProperty <=> my_property
get10Properties <=> 10_properties
get10properties <=> 10properties

Enjoy !
RedefineLab DataMapper
======================

What ?
------

RedefineLab DataMapper is a simple library whose aim is to easily map objects
to arrays and arrays to objects. Useful for fast database insertion from POPO
and getting POPO from array fetched from database.

RedefineLab DataMapper is provided with a service provider for Silex framework.

Installation
------------

RedefineLab DataMapper use PHP Composer.
Update your composer.json file like so :

```json
{
    "minimum-stability": "dev",
    "require": {
        "redefinelab/datamapper" : "dev-master"
    }
}
```

More info : http://getcomposer.org

Usage
-----

Please see src/DataMapper.php for the API.

When converting an object to an array, RedefineLab DataMapper will fetch
all of the object public methods beginning with 'get'. It is adviced to use
camel case method names. In that case, any upper case character or number
encountered will be mapped to an underscore followed by the lower case
character (or number), to comply with SQL naming conventions.
The same mechanism applies in the reverse direction where underscore
separated column names are mapped to camel case setter names.

Here is an example of how methods are mapped to column names :

```text
// getters to column names
getProperty => property
getMyProperty => my_property
get10Properties => 10_properties
get10properties => 10properties

// column names to setters
property => setProperty
my_property => getMyProperty
10_properties => set10Properties
10properties => set10properties
```



Tests
-----

Tests are run using Enhance PHP Test Framework. No complex installation
required ! To run tests :

```bash
php tests/tests/php
```
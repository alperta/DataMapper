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

Here is how methods are mapped to fields :

```text
getProperty <=> property
getMyProperty <=> my_property
get10Properties <=> 10_properties
get10properties <=> 10properties
```

Tests
-----

Tests are run using Enhance PHP Test Framework. No complex installation
required ! To run tests :

```bash
php tests/tests/php
```
![Dot](Dot.png)

[![Build Status](https://travis-ci.org/selvinortiz/dot.png)](https://travis-ci.org/selvinortiz/dot)
[![Total Downloads](https://poser.pugx.org/selvinortiz/dot/d/total.png)](https://packagist.org/packages/selvinortiz/dot)
[![Latest Stable Version](https://poser.pugx.org/selvinortiz/dot/v/stable.png)](https://packagist.org/packages/selvinortiz/dot)

### Description
>**Dot** is a tiny library and implements array _dot notation_ for PHP written by [Selvin Ortiz](https://selvinortiz.com)

### Requirements
- PHP 5.4+
- [Composer](http://getcomposer.org) and [selvinortiz/dot](https://packagist.org/packages/selvinortiz/dot)

### Install
```bash
composer require selvinortiz/dot
```

### Test
```bash
sh spec.sh
```

### Usage
> **Dot** can be called _statically_ and will take an array as input and return either a value by key or an array

```php
$input = [
    'name' => [
        'first' => 'Brad',
        'last'  => 'Bell',
    ],
    'spouse' => [
        'name' => [
            'first' => 'Brandon',
            'last'  => 'Kelly'
        ],
        'mood' => 'Happy',
        'age'  => '75',
    ],
    'mood' => 'Angry',
    'age'  => 25,
];

Dot::get($input, 'spouse.name.last');
// 'Kelly'

Dot::get($input, 'spouse');
/*
[
    'name' => [
        'first' => 'Brandon',
        'last'  => 'Kelly'
    ],
    'mood' => 'Happy',
    'age'  => '75'
]
*/

Dot::set($input, 'spouse.name.last', 'Bell');
/* $input will be mutated
[
    'name' => [
        'first' => 'Brad',
        'last'  => 'Bell',
    ],
    'spouse' => [
        'name' => [
            'first' => 'Brandon',
            'last'  => 'Bell' // < Changed
        ],
        'mood' => 'Happy',
        'age'  => '75',
    ],
    'mood' => 'Angry',
    'age'  => 25,
];
*/
```

### API
> **Dot** has a very small API, only two methods actually.

#### Dot::get($arr, $key, $default = null)
> Returns the value found in $arr by $key or $default provided

#### Dot::set(array &$arr, $key, $value)
> Mutates the $arr by adding a new $key with $value provided

### Contribute
> **Dot** wants to be friendly to _first time contributors_. Just follow the steps below and if you have questions along the way, please reach out.

1. Fork it!
1. Create your bugfix or feature branch
1. Commit and push your changes
1. Submit a pull request

### License
**Dot** is open source software licensed under the [MIT License](LICENSE.txt)

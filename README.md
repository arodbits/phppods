# PHPpods
A series of helpful components for building rapid PHP applications. 

# What's available?
* Array from dot notation
* Create php files on demand by using a template or a stub file

# How to install?
```sh
composer require thonyx/phppods 
```

# Want to see it in action?
Run a test! After installing the package, go to --from within your PHP project-- /vendor/thonyx/phppods and run: 

e.g: Convert an array back from a dot notation
```php
composer install && php UndotterTest.php
```

# How to use it?
All available functions are accessible as follows: 

\Axonbits\ComponentName::functionName();


## Arrray from dot notation

Transform back into a multidimensional array, one with flattened key-value pairs from a "dot" notation.

Before calling the function: 

```php
\Axonbits\Arrays::undot[
	'name'=>'Yale', 
	'timeseries.2014.enrollment'=>'1',
	'timeseries.2014.cost'=>'100',
	'timeseries.2015.enrollment'=>'200',
	'timeseries.2015.cost'=>'200',
	'groups.colors.default'=>'#white',
	'groups.colors.blue'=>'#lalala'
]);
```

After calling the function
```php
[
  'name' => 'Yale',
  'timeseries' =>
  [
    2014 =>
    [
      'enrollment' => '1',
      'cost' => '100',
    ],
    2015 =>
    [
      'enrollment' => '200',
      'cost' => '200',
    ],
  ],
  'groups' =>
  [
    'colors' =>
    [
      'default' => '#white',
      'blue' => '#lalala',
    ],
  ],
]
```

When transforming arrays you can specify the format the function call should return the response: 

--Available: JSON or ARRAY--

e.g: 
Return the result as as Json

```php
\Axonbits\Arrays::toJson()->undot[
	'name'=>'Yale', 
	'timeseries.2014.enrollment'=>'1',
	'timeseries.2014.cost'=>'100',
	'timeseries.2015.enrollment'=>'200',
	'timeseries.2015.cost'=>'200',
	'groups.colors.default'=>'#white',
	'groups.colors.blue'=>'#lalala'
]);
```

## Filesystem: Create files from a template or stub file

Example: 

```
\Axonbits\Filesystem::
    newFile(__DIR__ . '/tmp/SessionClass.php')
    ->withStub($stubPath = __DIR__ . '/tmp/DummyClass.php', [
        'DummyClass'     => 'SessionClass',
        'DummyTimestamp' => '"2018-01-01"',
        'DummyNamespace' => 'App\\Sessions',
    ])
    ->write();
```


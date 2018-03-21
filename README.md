# PHPpods
A series of helpful components for building rapid PHP applications. 

# What's available?
(Currently only) Helpful functions for interacting with arrays in PHP.

# How to install?
```sh
composer require thonyx/phppods 
```

# What to see it in action?
Run a test! After installing, go --from your PHP project-- to /vendor/axonbits/tests and run: 

```php
php UndotterTest.php
```

# How to use it?
All available functions --currently just one-- are accessible like follows: 

\Axonbits\ComponentName::functionName();

e.g:
Transform back into a default array, one with flattened key-value pairs and the "dot" notation.

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

## Arrays

When transforming arrays you can specify the format the function call should return the response: 

--Available: JSON or ARRAY--

e.g: 
Return the result as as Json

```php
\Axonbits\Arrays::**toJson()**->undot[
	'name'=>'Yale', 
	'timeseries.2014.enrollment'=>'1',
	'timeseries.2014.cost'=>'100',
	'timeseries.2015.enrollment'=>'200',
	'timeseries.2015.cost'=>'200',
	'groups.colors.default'=>'#white',
	'groups.colors.blue'=>'#lalala'
]);
```

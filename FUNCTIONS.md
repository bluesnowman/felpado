# Functions (63)

[_](#_), [assoc](#assoc), [assoc_in](#assoc_in), [complement](#complement), [compose](#compose), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [contains_in](#contains_in), [contains_strict](#contains_strict), [dissoc](#dissoc), [distinct](#distinct), [drop_last](#drop_last), [each](#each), [equal](#equal), [every](#every), [fill](#fill), [fill_validating_normalizing_or_throw](#fill_validating_normalizing_or_throw), [fill_validating_or_throw](#fill_validating_or_throw), [filter](#filter), [filter_indexed](#filter_indexed), [find](#find), [first](#first), [flatten](#flatten), [get](#get), [get_in](#get_in), [get_in_or](#get_in_or), [get_or](#get_or), [group_by](#group_by), [identical](#identical), [identity](#identity), [is_coll](#is_coll), [key](#key), [keys](#keys), [last](#last), [map](#map), [map_indexed](#map_indexed), [max](#max), [method](#method), [min](#min), [normalize_coll](#normalize_coll), [not](#not), [not_fn](#not_fn), [operator](#operator), [optional](#optional), [partial](#partial), [partition](#partition), [property](#property), [reduce](#reduce), [remove](#remove), [rename_key](#rename_key), [rename_keys](#rename_keys), [required](#required), [rest](#rest), [rest_indexed](#rest_indexed), [reverse](#reverse), [reverse_indexed](#reverse_indexed), [some](#some), [to_array](#to_array), [validate](#validate), [validate_coll](#validate_coll), [validate_coll_or_throw](#validate_coll_or_throw), [values](#values)

<a name="_"></a>
### f\_

f\_()

Returns a placeholder to use with partial (see partial).

```
f\_();
=> felpado\placeholder()

$firstCharacter = f\partial('substr', f\_(), 0, 1);
=> clojure to return the first character of a string
```

<a name="assoc"></a>
### f\assoc

f\assoc($coll, $key, $value)

Returns an array based on coll with value associated with key.

```
f\assoc(array('a' => 1, 'b' => 2), 'c', 3);
=> array('a' => 1, 'b' => 2, 'c' => 3)
```

<a name="assoc_in"></a>
### f\assoc_in

f\assoc_in($coll, $in, $value)

Returns an array based on coll with value associated in the nested structure of in.

```
f\assoc_in(array('a' => 1), array('b', 'b1'), 2);
=> array('a' => 1, 'b' => array('b1' => 2))

// does nothing without in
f\assoc_in(array('a' => 1), array(), 2);
=> array('a' => 1)

// supports infinite nesting
f\assoc_in(array(), array('a', 'a1', 'a1I', 'a1IA'), 1);
=> array('a' => array('a1' => array('a1I' => array('a1IA' => 1))))
```

<a name="complement"></a>
### f\complement

f\complement($fn)

Returns the negated boolean value when executing a function;

```
$fn = f\complement(function () { return true; });
$fn();
=> false

$fn = f\complement(function ($bool) { return $bool; });
$fn(true);
=> false
```

<a name="compose"></a>
### f\compose

f\compose(callable $fn1 [, $fn...])

Returns a function that is the composition of the passed functions.
The first function (right to left) receives the passed args, and the rest the result
of the previous function.

```
$revUp = f\compose('strtoupper', 'strrev');
$revUp('hello');
=> OLLEH
```

<a name="conjoin"></a>
### f\conjoin

f\conjoin($coll, $value)

Returns an array based on collection with value added.

```
f\conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)
```

<a name="construct"></a>
### f\construct

f\construct($first, $rest)

Returns an array with first and rest.

```
f\construct(1, array(2, 3, 4));
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### f\contains

f\contains($collection, $key)

Returns true if the key is present in the collection, otherwise false.
The comparison is done with the strict comparison operator `==`.

```
contains(array('a' => 1, 'b' => 2), 'a');
=> true

contains(array('a' => 1, 'b' => 2), 'c');
=> false

// normal comparison operator ==, not strict
contains(array(1 => 'a', 2 => 'b'), '1');
=> true
```

<a name="contains_in"></a>
### f\contains_in

f\contains_in($coll, $in)

Returns whether a nested structure exists or not.

```
f\contains_in(array('a' => array('a1' => 1)), array('a'));
=> true

f\contains_in(array('a' => array('a1' => 1)), array('a', 'a1));
=> true

f\contains_in(array('a' => array('a1' => 1)), array('a', 'a2));
=> false

f\contains_in(array('a' => array('a1' => 1)), array('b'));
=> false

f\contains_in(array('a' => array('a1' => 1)), array('b', 'b1'));
=> false

// returns false with an empty in
f\contains_in(array('a' => 1), array());
=> false

// supports infinite nesting
f\contains_in(array('a', 'a1', 'a1I', 'a1IA'), array('a', 'a1', 'a1I', 'a1IA'));
=> true
```

<a name="contains_strict"></a>
### f\contains_strict

f\contains_strict($coll, $key)

Same than `f\containts` but uses the strict comparison operator `===`.

```
// strict comparison operator ===
f\contains(array(1 => 'a', 2 => 'b'), '1');
=> false
```

<a name="dissoc"></a>
### f\dissoc

f\dissoc($coll, $key)

Returns an array based on coll with value associated with key removed.

```
f\dissoc(array('a' => 1, 'b' => 2), 'b');
=> array('a' => 1)

f\dissoc(array('a' => 1, 'b' => 2, 'c' => 3), 'b');
=> array('a' => 1, 'c' => 3)
```

<a name="distinct"></a>
### f\distinct

f\distinct($coll)

Returns a new coll without duplicates.

```
f\distinct(array(1, 2, 3, 2, 4, 5, 3, 1));
=> array(1, 2, 3, 4, 5)
```

<a name="drop_last"></a>
### f\drop_last

f\drop_last($coll)

Returns an array based on coll with the last element removed.

```
f\drop_last(array('a' => 1, 'b' => 2));
=> array('a' => 1)
```

<a name="each"></a>
### f\each

f\each($fn, $coll)

Iterates over collection calling fn for each value.

```
f\each(function ($value, $key) { do_something($value, $key); }, array(1, 2, 3));
=> null
```

<a name="equal"></a>
### f\equal

f\equal($value1, $value2 & more)

Returns whether two or more values are equal.

```
f\equal(1, 1)
=> true

f\equal(1, 1, 1)
=> true

f\equal(1, 2)
=> false

f\equal(1, 1, 2)
=> false
```

<a name="every"></a>
### f\every

f\every($fn, $coll)

Returns true if fn applied to all elements of coll returns logical true, otherwise false.

```
f\every(function ($v) { return $v > 10; }, array(20, 30, 40));
=> true

f\every(function ($) { return $v > 10; }, array(5, 20, 30));
=> false
```

<a name="fill"></a>
### f\fill

f\fill($coll, $paramRules)

Returns a new collection filled with param rules.
If a param is optional and it does not exist and there is a default value, it's filled.
If a param exists and there is no param rule for that param, it's not filled.

```
// filling with empty coll
f\fill(array(), array('a' => f\optional(array('d' => 1)));
=> array('a' => 1)

// filling with existing coll
f\fill(array('a' => 1), array('a' => f\required(), 'b' => f\optional(array('d' => 2)));
=> array('a' => 1, 'b' => 2)

// without param rule
f\fill(array('a' => 1, 'b' => 2), array('a' => f\required()));
=> array()
```

<a name="fill_validating_normalizing_or_throw"></a>
### f\fill_validating_normalizing_or_throw

f\fill_validating_normalizing_or_throw($coll, $paramRules)

Combines filling, validating and normalization, throwing if validation fails.

```

```

<a name="fill_validating_or_throw"></a>
### f\fill_validating_or_throw

f\fill_validating_or_throw($coll, $paramRules)

Combines filling and validation, throwing if validation fails.

```

```

<a name="filter"></a>
### f\filter

f\filter($fn, $coll)

Returns a new collection passing the current collection through the fn.

```
f\filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(2, 4, 6)
```

<a name="filter_indexed"></a>
### f\filter_indexed

f\filter_indexed($fn, $coll)

Same than filter but keeping the index.

```
f\filter_indexed(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(1 => 2, 3 => 4, 5 => 6)
```

<a name="find"></a>
### f\find

f\find($fn, $coll)

Returns the first value that returns logical true applied to fn. Otherwise null.

```
f\find(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> 2

f\find(function ($value) { return $value % 2 == 0; }, array(1, 3, 5);
=> null
```

<a name="first"></a>
### f\first

f\first($coll)

Returns the first value of a collection, or null if the collection is empty.

```
f\first(array(1, 2, 3));
=> 1

f\first(array());
=> null
```

<a name="flatten"></a>
### f\flatten

f\flatten($coll)

Returns a new collection without nesting combinations.

```
f\flatten(array(1, array(2, 3)));
=> array(1, 2, 3)

f\flatten(array(1, 2, 3));
=> array(1, 2, 3)

f\first(array(1, array(2, array(3))));
=> array(1, 2, 3)
```

<a name="get"></a>
### f\get

f\get($coll, $key)

Returns a element of a collection by key.
An InvalidArgumentException is thrown if the key does not exist.

```
f\get(array('a' => 1, 'b' => 2), 'a');
=> 1

f\get(array('a' => 1, 'b' => 2), 'b');
=> 2
```

<a name="get_in"></a>
### f\get_in

f\get_in($coll, $in)

Returns a element of a collection in a nested structure in.
An InvalidArgumentException is thrown if the in does not exist.

```
f\get_in(array('a' => array('a1' => 'foo'), array('a', 'a1');
=> 'foo'
```

<a name="get_in_or"></a>
### f\get_in_or

f\get_in_or($coll, $in, $default)

Returns a element of a collection in a nested structure in.
The default is returned if the in does not exist.

```
f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a1'));
=> 'foo'

f\get_in_or(array('a' => array('a1' => 'foo'), array('a', 'a2'), 'bar');
=> 'bar'
```

<a name="get_or"></a>
### f\get_or

f\get_or($coll, $key, $default)

Returns a element of a collection by key.
The default is returned if the key does not exist.

```
f\get(array('a' => 1, 'b' => 2), 'a');
=> 1

f\get(array('a' => 1, 'b' => 2), 'c', 3);
=> 3
```

<a name="group_by"></a>
### f\group_by

f\group_by($fn, $coll)

Returns a new collection with the elements grouped by the return of applying fn to each value.

```
f\group_by('strlen', array('one', 'two', 'three'));
=> array(3 => array('one', 'two'), 5 => array('three'))
```

<a name="identical"></a>
### f\identical

f\equal($value1, $value2 & more)

Returns whether two or more values are identical.

```
f\identical(1, 1)
=> true

f\identical(new \ArrayObject(), new \ArrayObject())
=> false

f\identical(1, 2)
=> false

$object1 = new \ArrayObject()
$object2 = $object1
f\identical($object1, $object2)
=> true
```

<a name="identity"></a>
### f\identity

f\identity($v)

Returns the same value.

```
f\identity('foo');
=> 'foo'

f\identity(2);
=> 2
```

<a name="is_coll"></a>
### f\is_coll

f\is_coll($coll)

Returns whether or not a variable is a coll. A coll is considered an array or a traversable object.

```
f\is_coll(array());
=> true

f\is_coll(new \ArrayObject());
=> true

f\is_coll(true);
=> false
```

<a name="key"></a>
### f\key

f\key($key)

Returns a closure that returns the value of a coll with the given key.

```
$key = f\key('foo');
$key(array('foo' => 2, 'bar' => 4));
=> 2

map(f\key('foo'), array(
    array('foo' => 2, 'bar' => 4),
    array('foo' => 6, 'bar' => 8),
))
=> array(2, 6)
```

<a name="keys"></a>
### f\keys

f\keys($coll)

Returns an array with the keys of collection.

```
f\keys(array('one' => 1, 'two' => 2, 'three' => 3));
=> array('one', 'two', 'three')
```

<a name="last"></a>
### f\last

f\last($coll)

Returns the last value of collection, or null if collection is empty.

```
f\last(array(1, 2, 3));
=> 3

f\last(array());
=> null
```

<a name="map"></a>
### f\map

f\map($fn, $coll)

Returns an array with fn applied to each value of collection.
Map does not keep the index. Only the value is passed to fn, not the key.

```
f\map(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="map_indexed"></a>
### f\map_indexed

f\map_indexed($fn, $coll)

Same than map but keeping the index. Also the index is passed as second argument to fn.

```
f\map_indexed(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="max"></a>
### f\max

f\max($coll, $fn = null)

Returns the maximum value of coll when applying fn.
If fn is not set, no function is applied.

```
// without fn
f\max(array(1, 2, 3))
=> 3

//with fn
$users = array(array('name' => 'foo', 'age' => 10), array('name' => 'bar', 'age' => 20))
$fn = function ($v) { return $v['age']; }
f\max($users, $fn)
=> array('name' => 'bar', 'age' => 20)

//with f\key
f\max($users, f\key('age'))
=> array('name' => 'bar', 'age' => 20)
```

<a name="method"></a>
### f\method

f\method($method)

Returns a closure that calls the given method and returns its value in an object.
Optionally additional args can be passed and will be sent when called the method.

```
$getTimestamp = f\method('getTimestamp');
$getId(new \DateTime();
=> `the timestamp`

// with bound args
$format = f\method('format', 'Y-m-d H:i:s')
$format(new \DateTime())

// useful with another functions
f\map(method('getId'), $articles)
=> array(`ids of articles`)
```

<a name="min"></a>
### f\min

f\min($coll, $fn = null)

Returns the minimum value of coll when applying fn.
If fn is not set, no function is applied.

```
// without fn
f\min(array(1, 2, 3))
=> 1

//with fn
$users = array(array('name' => 'foo', 'age' => 10), array('name' => 'bar', 'age' => 20))
$fn = function ($v) { return $v['age']; }
f\min($users, $fn)
=> array('name' => 'foo', 'age' => 10)

//with f\key
f\min($users, f\key('age'))
=> array('name' => 'foo', 'age' => 10)
```

<a name="normalize_coll"></a>
### f\normalize_coll

f\normalize_coll($coll, $normalizers)

Returns a new collection normalizing the elements indicating in normalizers.
It accepts param rules as normalizers.
It's similar to map_indexed.

```
f\normalize_coll(array('a' => 1.0), array('a' => 'intval'));
=> array('a' => 1)

// elements without normalizers are returned without modification
f\normalize_coll(array('a' => 1.0, 'b' => 2.0), array('a' => 'intval'));
=> array('a' => 1, 'b' => 2.0)

// with param rules
f\normalize_coll(array('a' => 1.0), array('a' => f\required('normalizer' => 'intval')));
=> array('a' => 1)
```

<a name="not"></a>
### f\not

f\not($value)

Returns the negated boolean value;

```
f\not(true);
=> false

f\not(false);
=> true

f\not('a');
=> false

f\not('');
=> true
```

<a name="not_fn"></a>
### f\not_fn

f\not_fn($fn)

Returns the negated boolean value when executing a function;

```
@deprecated

f\not_fn(function () { return true; });
=> false

f\not_fn(function () { return false; });
=> true
```

<a name="operator"></a>
### f\operator

f\operator($operator)

Returns a function for the given operator.

```
Available operators:
  * instanceof
  * *
  * /
  * %
  * +
  * -

$eq = f\operator('==');
$eq(1, 1)
=> true

$eq(1, 2)
=> false

$add = f\operator('+')
$add(1, 2)
=> 3

f\map(f\operator('+'), range(1, 3))
=> 6
```

<a name="optional"></a>
### f\optional

f\optional($config)

Returns an optional param rule.

```
Config (all optional):
  * `defaultValue` or `d`
  * `validator` or `v`
  * `normalizer` or `n`

$paramRule = f\optional();
=> felpado\optional

$paramRule = f\optional(array('defaultValue' => '1', 'validator' => 'is_numeric', 'normalizer' => 'intval'));
=> felpado\optional
```

<a name="partial"></a>
### f\partial

f\partial($fn, $arg1 & more)

Partial application. Takes a function and some arguments, and returns a function with
those arguments already applied.

```
$replace = f\partial('str_replace', 'foo', 'bar');
$replace('this is the string with some foo foo to replace')
=> this is the string with some bar bar to replace

// with placeholders to be able to apply non-first arguments
$firstChar = f\partial('substr', f\_(), 0, 1)
$firstChar('foo')
=> f

$firstChar('bar')
=> b
```

<a name="partition"></a>
### f\partition

f\partition($n, $coll)

Returns a new collection from coll parted in chunks of n length.

```
f\partition(2, range(1, 6));
=> array(array(1, 2), array(3, 4), array(5, 6)

f\partition(3, range(1, 6));
=> array(array(1, 2, 3), array(4, 5, 6))
```

<a name="property"></a>
### f\property

f\property($property)

Returns a closure that returns the given property of an object.

```
// here Object accept the id in the constructor and returns it through the id property
$id = f\property('id');
$id(new Object(2));
=> 2

// useful with another functions
f\map(f\property('id'), array(new Object(2), new Object(6)))
=> array(2, 6)
```

<a name="reduce"></a>
### f\reduce

f\reduce($fn, $coll, $initialValue = null)

Reduces coll through fn with an optional initial value.
If initial value is not set, function is applied to the two initial values.
If initial value is not set and there is only one value, that's the result.

```
f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3))
=> 6

// with initial value
f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3), 0)
=> 6

// with initial value
f\reduce(function ($accumulator, $value) { return $accumulator + $value; }, array(1, 2, 3), 2)
=> 8
```

<a name="remove"></a>
### f\remove

f\remove($fn, $coll)

Returns a new collection with the values that applied to fn are false.

```
f\remove(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(1, 3, 5)
```

<a name="rename_key"></a>
### f\rename_key

f\rename_key($coll, $from, $to)

Returns a new coll with a key renamed from from to to.

```
f\rename_key(array('a' => 1), 'a', 'b')
=> array('b' => 1)
```

<a name="rename_keys"></a>
### f\rename_keys

f\rename_keys($coll, $keysMap)

Returns a new coll with the keys from keysMap renamed.

```
f\rename_keys(array('a' => 1, 'b' => 2), array('a' => 'c', 'b' => 'd'))
=> array('c' => 1, 'd' => 2)
```

<a name="required"></a>
### f\required

f\required($config)

Returns a required param rule.

```
Config (all required):
  * `defaultValue` or `d`
  * `validator` or `v`
  * `normalizer` or `n`

$paramRule = f\required();
=> felpado\required

$paramRule = f\required(array('defaultValue' => '1', 'validator' => 'is_numeric', 'normalizer' => 'intval'));
=> felpado\required
```

<a name="rest"></a>
### f\rest

f\rest($collection)

Returns an array with the values of collection after the first.
It returns an empty array if collection is empty or has only one value.
Rest does not keep the index.

```
f\rest(array(1, 2, 3, 4, 5));
=> array(2, 3, 4, 5)

f\rest(array(1));
=> array()

f\rest(array());
=> array()
```

<a name="rest_indexed"></a>
### f\rest_indexed

f\rest_indexed($coll)

Same than f\rest but keeping the index.

```
f\rest_indexed(array('a' => 1, 'b' => 2, 'c' => 3));
=> array('b' => 2, 'c' => 3)

f\rest_indexed(array());
=> array()
```

<a name="reverse"></a>
### f\reverse

f/reverse($coll)

Returns a new collection in reversed order.

```
f\reverse(array(1, 2, 3));
=> array(3, 2, 1)
```

<a name="reverse_indexed"></a>
### f\reverse_indexed

f/reverse_indexed($coll)

Same than reverse but keeping the index.

```
f\reverse_indexed(array('a' => 1, 'b' => 2, 'c' => 3));
=> array('c' => 3, 'b' => 2, 'a' => 1)
```

<a name="some"></a>
### f\some

f\some($fn, $coll)

Returns true if fn applied to any value of collection returns logical true, otherwise false.

```
f\some(function ($value) { return $value > 10; }, array(5, 20, 30));
=> true

f\some(function ($value) { return $value > 10; }, array(5, 8, 9));
=> false
```

<a name="to_array"></a>
### f\to_array

f\to_array($coll)

Converts to array a coll.
If it's already an array, just returns it.
If it's a traversable object, converts it.
If it's neither an array nor a traversable object, throws an exception.

```
f\to_array(array(1, 2, 3));
=> array(1, 2, 3)

f\to_array(new \ArrayObject(array(1, 2, 3)));
=> array(1, 2, 3)

f\to_array(true);
=> InvalidArgumentException
```

<a name="validate"></a>
### f\validate

f\validate($value, $validator)

Returns whether a value passed through a validator is true or false.

```
f\validate(1, 'is_int')
=> true

f\validate(1.0, 'is_int')
=> false
```

<a name="validate_coll"></a>
### f\validate_coll

f\validate_coll($coll, $paramRules)

Returns the validation errors when validating coll with param rules.

```
// validating existence
f\validate_coll(array(), array('a' => f\required(), 'b' => f\optional()));
=> array('a' => 'required')

// multiple errors
f\validate_coll(array(), array('a' => f\required(), 'b' => f\required()));
=> array('a' => 'required', 'b' => 'required')

// validator fn
f\validate_coll(array('a' => 1.0), array('a' => f\required('v' => 'is_int')));
=> array('a' => 'invalid')

// without errors
f\validate_coll(array('a' => 1), array('a' => f\required('v' => 'is_int')));
=> array()
```

<a name="validate_coll_or_throw"></a>
### f\validate_coll_or_throw

f\validate_coll_or_throw($coll, $paramRules, $exceptionClass = 'Exception')

Same than f\validate_coll but throws an exception if there is any error.

```

```

<a name="values"></a>
### f\values

f\values($coll)

Returns an array with the values of coll.

```
f\values(array('one' => 1, 'two' => 2, 'three' => 3));
=> array(1, 2, 3)
```

# Functions

[_](#_), [array_depth](#array_depth), [assoc](#assoc), [assoc_in](#assoc_in), [collection_depth](#collection_depth), [collection_in](#collection_in), [compose](#compose), [conjoin](#conjoin), [construct](#construct), [contains](#contains), [contains_in](#contains_in), [contains_strict](#contains_strict), [dissoc](#dissoc), [drop_last](#drop_last), [each](#each), [every](#every), [filter](#filter), [find](#find), [first](#first), [foldl](#foldl), [get](#get), [get_in](#get_in), [group_by](#group_by), [is_coll](#is_coll), [key](#key), [keys](#keys), [last](#last), [map](#map), [max](#max), [method](#method), [min](#min), [partial](#partial), [partial_merge_args](#partial_merge_args), [property](#property), [reduce](#reduce), [rename_key](#rename_key), [rename_keys](#rename_keys), [rest](#rest), [reverse](#reverse), [select](#select), [some](#some), [to_array](#to_array), [values](#values)

<a name="_"></a>
### _





```

```

<a name="array_depth"></a>
### array_depth





```

```

<a name="assoc"></a>
### assoc

assoc($collection, $key, $value)

Returns an array based on collection with value added and keyed.

```
conjoin(array('a' => 1, 'b' => 2), 'c', 3);
=> array(array('a' => 1, 'b' => 2, 'c' => 3))
```

<a name="assoc_in"></a>
### assoc_in





```

```

<a name="collection_depth"></a>
### collection_depth





```

```

<a name="collection_in"></a>
### collection_in





```

```

<a name="compose"></a>
### compose





```

```

<a name="conjoin"></a>
### conjoin

conjoin($collection, $value)

Returns an array based on collection with value added.
G
conjoin(array(1, 2, 3), 4);
=> array(1, 2, 3, 4)

```

```

<a name="construct"></a>
### construct

construct($first, $rest)

Returns an array with first and rest.

```
construct(1, array(2, 3, 4));
=> array(1, 2, 3, 4)
```

<a name="contains"></a>
### contains

contains($collection, $key)

Returns true if the key is present in the collection, otherwise false.
The comparison is done with the normal comparison operator `==`.

```
contains(array('a' => 1, 'b' => 2), 'a');
=> true
```

<a name="contains_in"></a>
### contains_in





```

```

<a name="contains_strict"></a>
### contains_strict

contains_strict($collection, $key)

Same than `containts` but uses the strict comparison operator `===`.

```
// strict comparison operator ===
contains(array(1 => 'a', 2 => 'b'), '1');
=> false
```

<a name="dissoc"></a>
### dissoc





```

```

<a name="drop_last"></a>
### drop_last





```

```

<a name="each"></a>
### each

feach($callback, $collection)

Iterates over collection calling callback for each value.

```
feach(function ($value, $key) { do_something($value, $key) }, array(1, 2, 3));
=> null
```

<a name="every"></a>
### every

every($callback, $collection)

Returns true if callback applied to all values of collection returns logical true, otherwise false.

```
every(function ($value) { return $value > 10; }, array(20, 30, 40));
=> true
```

<a name="filter"></a>
### filter

filter($callback, $collection)

Returns an array with the values of collection that appled to callback return logical true.

```
filter(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> array(2, 4, 6)
```

<a name="find"></a>
### find

find($callback, $collection)

Returns the first value that returns logical true applied to callback. otherwise null.

```
find(function ($value) { return $value % 2 == 0; }, range(1, 6));
=> 2
```

<a name="first"></a>
### first

first($collection)

Returns the first value of collection, or null if collection is empty.

```
first(array(1, 2, 3));
=> 1
```

<a name="foldl"></a>
### foldl





```

```

<a name="get"></a>
### get





```

```

<a name="get_in"></a>
### get_in





```

```

<a name="group_by"></a>
### group_by

group_by($callback, $collection)

Returns an array with the values of collection keyed by the result of callback on each value.

```
group_by('strlen', array('one', 'two', 'three'));
=> array(3 => array('one', 'two'), 5 => array('three'))
```

<a name="is_coll"></a>
### is_coll





```

```

<a name="key"></a>
### key

fkey($key)

Returns a closure that returns the value of an array with the given key.

```
$key = fkey('foo');
$key(array('foo' => 2, 'bar' => 4));
=> 2
```

<a name="keys"></a>
### keys

keys($collection)

Returns an array with the keys of collection.

```
keys(array('one' => 1, 'two' => 2, 'three' => 3));
=> array('one', 'two', 'three')
```

<a name="last"></a>
### last

last($collection)

Returns the last value of collection, or null if collection is empty.

```
last(array(1, 2, 3));
=> 3
```

<a name="map"></a>
### map

map($callback, $collection)

Returns an array with callback applied to each value of collection.

```
map(function ($element) { return $element * 2; }, array(1, 2, 3));
=> array(2, 4, 6)
```

<a name="max"></a>
### max





```

```

<a name="method"></a>
### method

method($method)

Returns a closure that calls the given method and returns its value in an object.

```
// here Object accept the id in the constructor and returns it through the getId method
$getId = method('getId');
$getId(new Object(2));
=> 2
```

<a name="min"></a>
### min





```

```

<a name="partial"></a>
### partial





```

```

<a name="partial_merge_args"></a>
### partial_merge_args





```

```

<a name="property"></a>
### property

property($property)

Returns a closure that returns the given property of an object.

```
// here Object accept the id in the constructor and returns it through the id property
$id = property('id');
$id(new Object(2));
=> 2
```

<a name="reduce"></a>
### reduce





```

```

<a name="rename_key"></a>
### rename_key





```

```

<a name="rename_keys"></a>
### rename_keys





```

```

<a name="rest"></a>
### rest

rest($collection)

Returns an array with the values of collection after the first.
It returns an empty array if collection is empty or has only one value.

```
rest(array(1, 2, 3, 4, 5));
=> array(2, 3, 4, 5)
```

<a name="reverse"></a>
### reverse

reverse($collection)

Returns an array with collection in the reverse order.

```
rest(array(1, 2, 3));
=> array(3, 2, 1)
```

<a name="select"></a>
### select





```

```

<a name="some"></a>
### some

some($callback, $collection)

Returns true if callback applied to any value of collection returns logical true, otherwise false.

```
some(function ($value) { return $value > 10; }, array(5, 20, 30));
=> true
```

<a name="to_array"></a>
### to_array





```

```

<a name="values"></a>
### values

values($collection)

Returns an array with the values of collection.

```
values(array('one' => 1, 'two' => 2, 'three' => 3));
=> array(1, 2, 3)
```

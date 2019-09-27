--TEST--
ReflectionFunction::getAttributes
--FILE--
<?php
<<WithoutValue, SingleValue(0), FewValues('Hello', 'World')>>
function foo() {}
$r = new ReflectionFunction("foo");
var_dump($r->getAttributes());
?>
--EXPECT--
array(3) {
  ["WithoutValue"]=>
  array(0) {
  }
  ["SingleValue"]=>
  array(1) {
    [0]=>
    int(0)
  }
  ["FewValues"]=>
  array(2) {
    [0]=>
    string(5) "Hello"
    [1]=>
    string(5) "World"
  }
}

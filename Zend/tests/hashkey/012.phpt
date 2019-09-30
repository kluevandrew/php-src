--TEST--
testing hash returns string
--FILE--
<?php
class Foo {
    public function __hash() {
        return __CLASS__;
    }
}

$foo = new Foo();
$test = [
    $foo => true
];

var_dump(array_keys($test));
var_dump(array_values($test));
var_dump($test);
?>
--EXPECT--	
array(1) {
  [0]=>
  string(3) "Foo"
}
array(1) {
  [0]=>
  bool(true)
}
array(1) {
  ["Foo"]=>
  bool(true)
}

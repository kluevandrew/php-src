--TEST--
ReflectionClass::getAttributes
--FILE--
<?php
<<
    OrmTable("users"),
    OrmPrimaryColumn("user_id")
>>
class User {}
$r = new ReflectionClass(User::class);
var_dump($r->getAttributes());
?>
--EXPECT--
array(2) {
  ["OrmTable"]=>
  array(1) {
    [0]=>
    string(5) "users"
  },
  ["OrmPrimaryColumn"]=>
  array(1) {
    [0]=>
    string(7) "user_id"
  }
}

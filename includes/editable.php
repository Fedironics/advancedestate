<?php
class Editable extends DatabaseTable {
  public static function id($id){
    $id = (int)$id;
    return DatabaseTable::get_table('contents',1," id = $id")[0];
  }
  public static function name($name) {
    $name = sclean($name);
    return DatabaseTable::get_table('contents',1," name='$name'")[0];
  }
}

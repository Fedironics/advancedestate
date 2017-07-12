<?php
require_once 'mysqldatabase.php';

/**
* Description of dabasetable
*
* @author EMMA
*/
class DatabaseTable {
    protected static $db_fields;
    public static $tableName;
    protected static $bouncer='credentials';
    /**
    *
    * @global type $database
    * @return boolean inserts into the database
    */
    
    
    public function create(){
        global $database;
        $this->added=mysql_time();
        $attributes=  $this->sanitized_attributes();
        
        $sql="INSERT INTO ";
        $sql.=static::$tableName." (";
        $sql.=join(", ",array_keys($attributes));
        $sql.=") VALUES ('";
        $sql.=join(" ','",  array_values($attributes));
        $sql.=" ')";
        if($database->query($sql))
        {
            $this->id=$database->last_id();
            return true;
        }
        else {
            return false;
        }
    }
    /**
    *
    * @global type $database
    * @return <bool> saves to the database
    *
    *
    */
    public function update (){
        global $database;
        $attributes=  $this->sanitized_attributes();
        $attributes_pairs= array();
        foreach ($attributes as $key => $value){
            $attributes_pairs[] = "{$key}= '{$value}'";
        }
        $sql="UPDATE ";
        $sql.=static::$tableName;
        $sql.=" SET ";
        $sql.= join(", ", $attributes_pairs);
        $sql.= " WHERE id=".$database->escape_value($this->id);
        $database->query($sql);
        return ($database->connection->affected_rows==1)? true : false;
        
        
    }
    /**
    *
    * @global type $database
    * @return <string> mysql clean values ready to be inserted into database
    */
    protected function  sanitized_attributes() {
        global $database;
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value){
            $clean_attributes[$key] = $database->escape_value($value);
        }
        return $clean_attributes;
    }
    /**
    *
    * @return <bool> it updates or creates an entry in the database
    */
    function save(){
        return  isset($this->id)?$this->update() : $this->create();
    }
    /**
    *
    * @global type $database
    * @method this deletes an entry from the database
    */
    function delete(){
        global $database;
        $sql="DELETE FROM " .static::$tableName." WHERE id=";
        $sql.= $database->escape_value($this->id);
        $sql.= " LIMIT 1";
        if($database->query($sql)){
            return true;
        }else {
            return false;
        }
    }
    
    public static function count_all($sql){
        global $database;
        $counts=$database->query($sql);
        $count_no=$counts->fetch_array();
        return array_shift($count_no);
    }
    /**
    *
    * @global type $database
    */
    protected static function get_fields(){
        global $database;
        $all_fields=array();
        $result_set=  $database->query("SHOW FIELDS FROM ".static::$tableName);
        while( $db_fields=$result_set->fetch_array()){
            $all_fields[]=$db_fields[0];
        }
        static::$db_fields=$all_fields;
        //in order to have all the attributes
    }
    
    
    
    /**
    *
    * @return <mysqli_result> it gets all the results from a particular database table
    */
    
    public static function  find_all(){
        $all=empty(static::$base_sql)?"SELECT * FROM ".static::$tableName:static::$base_sql;
        $results=  static::find_by_sql($all);
        return $results;
    }
    /**
    *
    * @param <string> $attribute checks if this object has an attribute
    * @return <bool> returns true or false
    */
    protected function _has_attribute ($attribute){
        
        return property_exists($this, $attribute);
    }
    /**
    *
    * @return <ArrayObject> !important returns the table fields as an array
    */
    protected function attributes(){
        static::get_fields();
        $attributes= array();
        foreach (static::$db_fields as $field){
            if(property_exists($this, $field)){
                $attributes[$field]= $this->$field;
            }else {
                if($field=='id' || $field='created'){
                    continue;
                }
                //create the property first to avoid stupid errors
                $this->$field='';
                $attributes[$field]= $this->$field;
                
            }
        }
        return $attributes;
    }
    
    /**
    *
    * @param <int> $id
    * @return <ArrayObject> returns an array
    */
    public static function find_by_id($id){
        /**
        * @property int $id the primary key for pulling out a row from the database
        */
        global $database;
        $sanitized_id=$database->escape_value($id);
        $all=empty(static::$base_sql)?"SELECT * FROM ".static::$tableName:static::$base_sql;
        $results= static::find_by_sql($all." WHERE ".static::$tableName.".id=$sanitized_id");
        return empty($results)? false : array_shift($results);
    }
    /**
    *
    * @global <MySqlDatabase> $database uses the database class for connecting to the database
    * @param<string> $sql An excaped sql string
    * @return <ArrayObject> returns an array of DatabaseTable Objects  
    */
    public static function  find_by_sql($sql){
        
        global $database;
        $result=$database->query($sql);
        $container=array();
        while($row=$result->fetch_array()){
            $row_object = static::instantiate($row);
            $container[]=$row_object;
        }
        return $container;
    }
    public static function get_table($table,$limit=1,$where = 'TRUE'){
        global $database;
        $sql= "SELECT * FROM $table";
        $sql.= " WHERE $where";
        $sql.= " LIMIT $limit";
        $result = static::find_by_sql($sql);
        return $result;
    }
    /**
    *
    * @param <ArrayObject> $record accepts an array of database table data
    * @return <DatabaseTable> and it returns a database object which you can perform methods on
    *
    *
    */
    static function  instantiate($record){
        
        $tableObject = new static;
        foreach ($record as $attribute=>$value){
            /*Just for all the database tables to become attributes*/
           
            /*set the property if it is not a row number or if it hasnt been set already */
            if(!is_numeric($attribute))
            $tableObject->$attribute=$value;         
        }
        $tableObject->id=$record[0];
        return $tableObject;        
    }

    public function human_time(){
        return humanTiming ($this->created);
    }
    public static function last_count(){
        $count=0;
        if(static::$sql){
            $count_sql=str_replace("*","COUNT(*)",static::$sql);
            $count =static::count_all($count_sql);
        }
        return $count;
    }
    
}
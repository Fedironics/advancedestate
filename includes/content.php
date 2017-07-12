<?php
class Content extends DatabaseTable {
    public $sql;
    function __construct(){
       $data = DatabaseTable::find_by_sql("SELECT * FROM site_data");
    //   pre_format($data);
       foreach($data as $info){
           $attribute=$info->code_name;
          $this->$attribute=$info->data_value;
       } 
    } 
    public function agents($order='id',$where='TRUE'){
        $this->sql="SELECT * FROM agents INNER JOIN person ON agents.person_id=person.id ";
        $content = new Content();
        return $content;      


    }

    public function properties(){
        echo 'propertisized';
        return $this;
    }
    public function social(){
        echo 'socialized';
        return $this;
    }
} 
$content = new Content();

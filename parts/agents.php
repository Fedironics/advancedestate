<?php
require_once("../includes/initialize.php");
class Content {
    public $sql;
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
DatabaseTable::$tableName='agents';
echo DatabaseTable::$tableName;
//try this jjjqueruy hsit
$agent=new Content();
$agent->properties()->social();
$agents=DatabaseTable::find_by_sql("SELECT * FROM agents INNER JOIN person ON agents.person_id=person.id WHERE agents.id = 1");
pre_format($agents);

<?php
class Agent extends User {
    public static $tableName = 'agents';
    public static $base_sql = "SELECT * FROM agents INNER JOIN person ON agents.person_id=person.id";
    
    
    public function get_properties($limit=1,$order=''){
        if(!isset($this->id))return false;
        return Property::fetch($limit,$order,"AND agent_id='$this->id'");
    }

    public function update(){
        parent::update();
        self::$tableName="person";
        parent::update();
        self::$tableName="agents";
    }
    	public static function fetch($limit,$order='',$where=''){
		$sql=static::_gen_fetch_sql($limit,$order,$where);
		$result = static::find_by_sql($sql);
		return $result;
		
	}
	public static function _gen_fetch_sql($limit,$order,$where){
		$sql=static::$base_sql;
		$sql.=empty($where)?'':" WHERE $where";
		$sql.=empty($order)?'':" ORDER BY $order";
		$sql.= " LIMIT $limit";
		return $sql;
	}
    public function position(){
        return 'Agent';
    }
}
<?php

require_once 'databasetable.php';



/**
*Description of User
 *
 * @author EMMA
 */
class User extends DatabaseTable {
	protected static $db_fields;
	public static $tableName= 'person';
	public static $thumb_sizes = ['large'=>[550,526],'featured'=>[308,308],'list'=>[127,127],'author'=>[66,66],'author_small'=>[43,43]];
	
	
	public static function authenticate($email,$password){
		global $database;
		$email=$database->escape_value($email);
		$password=$database->escape_value($password);
		$sql= 'SELECT * FROM ';
		$sql.=static::$tableName. " WHERE email='$email' AND password='$password'";
		$person= static::find_by_sql($sql);
		if(!empty($person)){
			$person=array_shift($person);
			$person->token= random_string(15);
			$database->query('INSERT INTO '.static::$bouncer."(token,rel_id,added) VALUES('$person->token','$person->id',NOW())");
			return $person;
		}
		else {
			return false;
		}
		
	}
	public static function social_authenticate($email,$sid,$network){
		global $database;
		$email=$database->escape_value($email);
		$password=$database->escape_value($password);
		$sql= 'SELECT * FROM ';
		$sql.=static::$tableName. " INNER JOIN $network ON ".static::$tableName.".id=$network.user_id"." WHERE email='$email' AND social_id='$sid'";
		$person= static::find_by_sql($sql);
		if(!empty($person)){
			$person=array_shift($person);
			$person->token= random_string(15);
			$database->query('INSERT INTO '.static::$bouncer."(token,rel_id,added) VALUES('$person->token','$person->id',NOW())");
			return $person;
		}
		else {
			return false;
		}
	}
	public static function verify($token){
		global $database;
		$token=$database->escape_value($token);
		$sql='SELECT * FROM '.static::$bouncer. " WHERE token='$token'";
		$credentials=$database->query($sql);
		if($credentials->num_rows==0) return false;
		$cred_array=$credentials->fetch_array();
		$id=$cred_array['rel_id'];
		$person= static::find_by_id($id);
		return  !empty($person) ?$person :false ;
	}
	public static function find_by_column($value,$column){
		$sql=empty(static::$base_sql)?"SELECT * FROM ".static::$tableName:static::$base_sql;
		$sql.=" WHERE $column='$value'";
		return static::find_by_sql($sql);
	}
	public static function make($firstname,$lastname,$email,$password,$phone=''){
		$errors=[];
		global $e;
		if(!static::filter($firstname))
						$errors[]= "First Name ".$e[1] ;
		if(!static::filter($lastname))
						$errors[]=  "Last Name ".$e[1];
		if(!static::filter($email))
						$errors[]=  "Email ".$e[1];
		if(!static::filter($password))
						$errors[]=  "Password ".$e[1];
		if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
						$errors[]=  $e[2]." Email";
		if(!empty(static::find_by_column($email,'email')))
						$errors[]=  "Email ".$e[4];
		if(empty($errors)){
			$created= new static();
			$created->first_name=$firstname;
			$created->last_name=$lastname;
			$created->email=$email;
			$created->about="A member of Real Estate";
			$created->password=$password;
			$created->phone=$phone;
			$created->save();
			return $created;
		}
		pre_format($errors);
		
		
	}
	public static function filter($value){
		global $database;
		if(empty($value)) return false;
		return		$database->escape_value($value);
	}
	public function set_picture($name){
		if(!isset($this->id))return false;
		$file=File::make($name,self::class,$this->id,'picture');
		return $file;
	}
	
	public function get_picture($size='',$limit=1,$order='added',$where="type='picture'",$all=false){
		if(!isset($this->id))return false;
		$pictures=File::fetch(self::class,static::$thumb_sizes,$all=false,$this->id,$limit,$order,$where);
		if(empty($pictures)){
			return "img/profile-avatar.jpg";
		}
		else {
			$this->pix=array_shift($pictures);
			if(empty($size)) return $this->pix;
			return $this->pix->$size;
		}
	}
	
	public function count_pictures($where=''){
		if(!isset($this->id))return false;
		$num=File::count(self::class,$this->id,$where);
		return $num;
	}
	public function link(){
		return "agent.php?agent=$this->id";
	}
	public function name(){
		return $this->first_name. " " . $this->last_name ;
	}
	public function twitter(){
		return "ashortlink";
		
	}
	public function facebook(){
		return "ashortlink";
	}
	public function linkedin(){
		return "ashortlink";
	}
	public function set_facebook($fbid,$access,$link,$picture){
		global $database,$fb;
		if($database->query("SELECT id FROM facebook WHERE social_id='$fbid'")->num_rows==1){
			//the person has initially logged into facebook
			$sql = "UPDATE facebook SET access_token='$access', profile= '$link' WHERE social_id='$fbid'";
		}
		else {
			$sql="INSERT INTO facebook (user_id,social_id,access_token,profile,added) VALUES ('$this->id','$fbid','$access','$link','NOW()')";
		}
		$database->query($sql);
		$this->set_picture($picture);
	}
	public function show_social($start=''){
		$result='';
		$stop=substr($start,0,1).'/'.substr($start,1,strlen($start));
		$result.= "$start
	<a href=\"".$this->facebook()."\"><i class=\"fa fa-facebook\"></i></a> $stop";
		$result.=  "$start
	<a href=\"".$this->twitter()."\"><i class=\"fa fa-twitter\"></i></a> $stop";
		$result.=  "$start
	<a href=\"".$this->linkedin()."\"><i class=\"fa fa-google-plus\"></i></a> $stop";
		return $result;
	}
}

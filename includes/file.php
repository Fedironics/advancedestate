<?php
class File extends DatabaseTable {
	//I	mportant please do not change or delete the types array
				//D	O LATER
				//c	heck for extra large files in process to stop the crashing from happening
			public static $types=['video'=>['flv','mp4','3gp','avi'],'song'=>['mp3','ogg','wma'],'picture'=>['jpg','jpeg','gif','png'],'document'=>['pdf','doc','docx','txt']];
	public static $tableName = 'files';
	public static $folder = 'files';
	public $errors = [];
	public static $uploadErrors= array(
		     UPLOAD_ERR_OK => "No Errors",
		       UPLOAD_ERR_INI_SIZE => " File Is Larger Than The Upload Max Size",
		        UPLOAD_ERR_FORM_SIZE => "File Is Larger Than Form, Max_Size",
		        UPLOAD_ERR_PARTIAL => "The File Upload Didn't Complete",
		       UPLOAD_ERR_NO_FILE => "No File Was Uploaded",
		        UPLOAD_ERR_NO_TMP_DIR => "This Server Has No Temporary Directory",
		        UPLOAD_ERR_CANT_WRITE => "Disk May Be Full Or You Don't Have The Permission To Upload Files",
		        UPLOAD_ERR_EXTENSION => "This Type Of File Cannot Be Uploaded"
		            );
	
	
	
	
	public static function make($uploaded_file,$caller,$rel_id,$type=''){
		$file= new static();
		if(!empty($uploaded_file)){
			if(is_array($uploaded_file)){
			if($uploaded_file['name']==''){
				$file->errors[]='file has no name';
				return $file;
			}
			elseif($uploaded_file['error']!==0){
				$file->errors[]=static::$uploadErrors[$uploaded_file['error']];
				return $file;
			}
			$tmp=$uploaded_file['tmp_name'];
			$ext=trim(pathinfo($uploaded_file['name'],PATHINFO_EXTENSION));
			$basename=basename($uploaded_file['name']);
			$size=$uploaded_file['size'];
			}
			else {
				$tmp=$uploaded_file;
				$ext='jpg';
				$basename=random_string(9);
				$size = 1024;
			}
		}
		else{
			$file->errors[]='file not found';
			return $file;
		}
		$filename=random_string();
		$file->tmp=$tmp;
		$file->rel_class=$caller;
		$file->rel_id=$rel_id;
		$file->size=$size;
		$file->extension=$ext;
		$file->base_name=$basename;
		if(!empty($type)){
			if(in_array($ext,static::$types[$type]))$file->type=$type;
		}
		else{
			foreach(static::$types as $key=>$extensions){
				if(in_array($ext,$extensions))$file->type=$key;
			}
		}
		$file->added=mysql_time();
		$file->url=$filename;
		$file->move()?$file->save():null;
		return $file;
	}
	public static function fetch($rel_class,$thumb_sizes,$all=false,$rel_id,$limit,$order='',$where=''){
		$sql=static::_gen_fetch_sql($rel_class,$rel_id,$params='*',$limit,$order,$where);
		$result=static::find_by_sql($sql,$thumb_sizes,$all=false);
		return $result;
	}
	public static function count($rel_class,$rel_id,$where=''){
		global $database;
		$sql=static::_gen_fetch_sql($rel_class,$rel_id,$params='COUNT(*)',$limit=1,$order='id',$where);
		$count=$database->query($sql);
		$result=$count->fetch_array()[0];
		return $result;
	}
	private static function _gen_fetch_sql($rel_class,$rel_id,$params='*',$limit,$order,$where){
		$sql="SELECT $params FROM ".static::$tableName;
		$sql.=" WHERE rel_class='$rel_class' AND rel_id='$rel_id' ";
		$sql.=empty($where)?'':" AND $where";
		$sql.=empty($order)?'':" ORDER BY $order";
		$sql.=empty($limit)?'':" LIMIT $limit";
		return $sql;
		
	}
	public static function  find_by_sql($sql,$thumb_sizes=[],$all=false){
		global $database;
		$result=$database->query($sql);
		$container=array();
		while($row=$result->fetch_array()){
			$row_object = static::instantiate($row,$thumb_sizes);
			$container[]=$row_object;
		}
		return $container;
	}
	public static function instantiate($record,$thumb_sizes=[],$all=false){
		if($all){
			$instance=parent::instantiate($record);
		}
		else{
			$instance= new static();
		}
		foreach($thumb_sizes as $type=>$value){
			$instance->$type=static::$folder.'/'.trim($record['type']).'/'.$type.trim($record['url']).'.'.$record['extension'];			
		}
		return $instance;
	}
	public function urls($thumb_sizes){
		foreach($thumb_sizes as $type=>$value){
			$this->$type=static::$folder.'/'.trim($this->type).'/'.$type.trim($this->url).'.'.$this->extension;
			
		}
	}
	public function move(){
		if(!empty($this->type)){
			if($this->type=='picture'){
				$caller=$this->rel_class;
				$this->move_picture($caller::$thumb_sizes);
			}
			elseif($this->type=='video'){
				$this->move_video();
			}
			;
			if(copy($this->tmp,SITE_ROOT.DS.static::$folder.DS.'base'.DS.$this->base_name)){
				return true;
			}
			else {
				$file->errors[]='unable to move file ';
			}
			
			
		}
		else {
			$this->errors='unrecognised filetype';
		}
	}
	public function move_picture($pictures){
		require_once SIMPLE_IMAGE;
		$picture=new EditImage($this->tmp);
		if(is_array(current($pictures))){
		foreach($pictures as $key=>$value){
			$picture->square_crop($value[0],$value[1]);
			$picture->save($this->target($key));
		}
		}
		else {
			$picture->square_crop($pictures[0],$pictures[1]);
			$picture->save($this->target($key));
		}
	}
	public function target($suffix=''){
		$target=SITE_ROOT.DS.static::$folder.DS.$this->type.DS.$suffix.$this->url.".".$this->extension;
		return $target;
	}
	function __destruct(){
		global $session;
		//			$session->message($this->errors);
	}
	public function create(){
		$count = static::count($this->rel_class,$this->rel_id," size='$this->size' AND base_name='$this->base_name' ");
		if($count<1){
			parent::create();
		}
		else{
			$file->errors[]=' Duplicate file ';
		}
	}
}


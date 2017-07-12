<?php
class Property extends DatabaseTable {
	public static $tableName = 'properties';
	public static $sql;
	public static $sign='$';
	public static $base_sql = "SELECT * FROM properties INNER JOIN property_details ON properties.id=property_details.property_id INNER JOIN addresses ON properties.address_id=addresses.id ";
	public static $thumb_sizes = ['cover_full'=>[1200,472],'item_cover'=>[560,560],'listing'=>[420,218],'most_viewed'=>[390,274],'my_properties'=>[270,210],'agent_property'=>[270,169],'map'=>[230,127],'list_property'=>[150,150],'sidebar_listing'=>[72,72],'sidebar_popular'=>[42,42]];
	
	public static function convert($value){
		return $value;
	}
	public static function fetch($limit,$order='',$where='',$joins=''){
		$sql=static::_gen_fetch_sql($limit,$order,$where,$joins);
		$result = static::find_by_sql($sql);
		return $result;
		
	}
	
	private static function _gen_fetch_sql($limit,$order,$where,$joins){
		$sql=static::$base_sql;
		$sql.=empty($joins)?'':" $joins";
		$sql.=" WHERE TRUE";
		$sql.=empty($where)?'':" $where";
		$sql.=empty($order)?'':" ORDER BY $order";
		$sql.= " LIMIT $limit";
		static::$sql=$sql;
		return $sql;
	}
	public function get_details(){
		$this->get_detail('property_boolean')->get_detail('property_non_boolean');
		return $this;
	}
	public function get_detail($table){
		global $database;
		$sql="SELECT * FROM property_attribute_values INNER JOIN $table ON name_id=$table.id WHERE property_id=$this->id ";
		$result=$database->query($sql);
		$results=[];
		while($detail=$result->fetch_array()){
			$results[$detail['code_name']]=['screen_name'=>$detail['screen_name'],'value_held'=>$detail['value_held'],'code_name'=>$detail['code_name']];
		}
		$this->$table=$results;
		return $this;
	}
	public static function make($name,$address,$price,$intended=1,$category=1){
		global $session;
		$property = new static();
		$property->name=$name;
		$property->sold=0;
		$property->views=0;
		
		
		/*elaborate later on*/
		$property->agent_id=$session->get_user_id();
		$property->address_id=$address;
		$property->category=$category;
		$property->transaction=$intended;
		$property->price=$price;
		$property->save();
		return $property;
	}
	
	public static function find_by_id($id){
		$property=parent::find_by_id($id);
		$property->views++;
		$property->save();
		return $property;
	}
	
	
	
	/*note it uses $_POST exclusiveley */
	public function set_details($property_names=[]){
		global $database;
		$sql='INSERT INTO property_attribute_values(property_id,name_id,value_held) VALUES ';
		$inserts=[];
		foreach($property_names as $single){
			$key=$single->code_name;
			if(!empty($_POST[$key])){
				$val=$database->escape_value($_POST[$key]);
				$inserts[]="($this->id,$single->id,'$_POST[$key]')";
			}
		}
		$sql.=join(',',$inserts);
		if(!empty($inserts)){
			$database->query($sql);
		}
		return $this;
	}
	public function set_detail($detail){
		global $database;
		if(empty($detail))return false ;
		$detail=$database->escape_value($detail);
		$sql="INSERT INTO property_details (property_id,detail,sequence) VALUES ($this->id,'$detail',1)";
		$database->query($sql);
		
	}
	public function set_pictures($upload){
		if(!isset($this->id))return false;
		$files=[];
		$uploaded=$_FILES[$upload];
		$keys=array_keys($uploaded);
		for ($i=0;$i<count($_FILES[$upload]['name']);$i++){
			$values=[];
			foreach($keys as $key){
				$values[]=$uploaded[$key][$i];
			}
			$one_file=array_combine($keys,$values);
			$file=File::make($one_file,self::class,$this->id);
			$files[]=$file;
		}
		return $files;
	}
	public function get_picture($size='',$limit=1,$order='id',$where="type='picture'",$all=false){
		if(!isset($this->id))return false;
		$avatar="djals.jpg";
		$pictures=File::fetch(self::class,static::$thumb_sizes,$all=false,$this->id,$limit,$order,$where);
		
		if(empty($pictures)){
			if($limit==1){
				$pictures= $avatar;
		
			}
			else {
				$pictures= [];
				$pix=new stdClass();
				foreach(static::$thumb_sizes as $type=>$value){
					$pix->$type=$avatar;
				}
				$pictures[]=$pix;
			}
		}
		else {
			if($limit==1) {
				$this->pix=$pictures=array_shift($pictures);
				return empty($size)?$pictures:$pictures->$size;
			}
		}
		$this->pix=$pictures;
		return $pictures;
	}
	public function link(){
		return $this->link="property.php?property=$this->id";
	}
	public function transaction(){
		return $this->transaction= $this->transaction==1?"For Sale":"For Rent";
	}
	public function rating() {
		global $database;
		$val=$database->query("SELECT AVG(rating) AS rating FROM ratings WHERE rel_class='Property' AND rel_id='$this->id'")->fetch_array();
		$rating=$val['rating'];
		return $rating;
	}

	public function displayed_rating($start=''){
		$stop=substr($start,0,1).'/'.substr($start,1,strlen($start));
		$result="";
		for ($i=0;$i<$this->rating();$i++){
			$result.=  "$start	<i class=\"fa fa-star\"></i>$stop
							";
		}
		for ($i=$this->rating();$i<5;$i++){
			$result.= "$start<i class=\"fa fa-star-o\"></i>$stop
							";
		}
		
		return $this->displayed_rating=$result;
	}
	public function additional(){
		$result=[];
		foreach($this->property_boolean as $key=>$value){
			$result[] = ['title'=>$value['screen_name'],'body'=>'Property has a '. $value['screen_name']];
		}
		return $this->additional=$result;
	}
	public function fetch_similar(){
		return static::find_all();
	}
	public function location(){
		return [$this->lattitude,$this->longitude] ;
	}
	public function price(){
		return $this->price= "/$".$this->price;
	}
	public function code_name(){
		return $this->code_name="RE 425";
	}
	public function name() {
		return strlen($this->name)>15?substr($this->name,0,14).'...':$this->name;
	}
}

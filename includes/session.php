<?php
require_once 'user.php';




/**
@Description of session
 *
 * @author EMMA
 */
class Session {
	private $_logged_in=false;
	private $_token;
	private $_user_id;
	public $message=array();
	
	function __construct() {
		session_start();
		$this->_check_message();
		$this->_check_login();
	}
	public function get_user_id(){
		return $this->_user_id;
	}
	
	public function  logged(){
		return $this->_logged_in;
	}
	private function  _check_message(){
		if(!empty($_SESSION['message'])){
			$this->message= $_SESSION['message'];
		}
		else {
			$this->message=array();
			$_SESSION['message']=array();
		}
	}
	public function message ($mssg=''){
		if(!empty($mssg)){
			if(is_array($mssg)){
				$this->message= $_SESSION['message']= array_merge($this->message,$mssg);
				
			}
			else{
				$_SESSION['message'][]=$mssg;
				$this->message[]=$mssg;
			}
			return true;
		}
		else {
			return false;
		}
	}
	public function show_messages(){
		$this->_check_message();
		unset($_SESSION['message']);
		$messages=  $this->message;
		foreach ($messages as $message){
			echo '  <div class="alert alert-warning">
<span class="glyphicon glyphicon-ok "></span> &nbsp;
'.$message.' 
    </div>';
		}
	}
	
	public function login($user,$cookie=false){
		if($user){
			if(empty($user->token)){
				$this->message("no token was found");
				return false;
			}
			if($cookie){
				setcookie('token',"$user->token",time()+2592000);
				$this->_token=$user->token;
				$this->_user_id=$user->id;
			}
			else {
				$this->_token=$_SESSION['token']=$user->token;
			}
			$this->_logged_in=true;
			$this->message("Successfully Logged in!");
			return true;
		}
		
		else{
			//d			o something if no user object was recieved
									$this->logout();
			$this->message("Wrong username or password");
			return false;
		}
		
	}
	
	
	public  function logout(){
		if(isset($_SESSION['token']))
							unset($_SESSION['token']);
		$this->_user_id=null;
		$this->_logged_in=false;
		if(isset($_COOKIE['token'])) 
						setcookie('token',"$user->token",time()-2000);
	}
	private function _check_login()
				    {
		if(isset($_COOKIE['token']) || isset($_SESSION['token'])){
			$this->_token=empty($_COOKIE['token'])?$_SESSION['token']:$_COOKIE['token'];
			$res= User::verify($this->_token);
			if($res){
				$this->_logged_in=true;
				$this->_user_id=$res->id;
			}
			else{
				$this->logout();
			}
		}
		else{
			$this->_logged_in=false;
		}
		
	}
	public function get_user(){
		
	}
	function __destruct() {
		// 		require SITE_ROOT.DS.'pages/footer.php';
	}
	//e	nd of class
}
$page='0';
$year=date('Y');
$session = new Session();

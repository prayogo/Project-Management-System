<?php
class GlobalFunction
{
	/**
	 * Function to set user session when login
	 * @param $username
	 * @param $userid
	 * @param $name
	 * @param $email
	 * @param $phone
	*/
	public function setSession($username, $userid, $name, $email, $phone){
		$session=new CHttpSession;
		$session->open();
		$session['username'] = $username;
		$session['userid'] = $userid;
		$session['name'] = $name;
		$session['email'] = $email;
		$session['phone'] = $phone;
	}
	
	/**
	 * Function to get username login from session
	 * Return username
	*/
	public function	getLoginUserName(){
		$session=new CHttpSession;
		$session->open();
		//$userid=$session['username'];
		$userid='prayogo';
		
		return $userid;
	}
}
?>
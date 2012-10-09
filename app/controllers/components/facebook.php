<?php
/**
* Facebook Component
*/

$GLOBALS['facebook_config']['debug'] = NULL;

class FacebookComponent extends Object
{
    var $api_key = "d8eb0eb4fd149047a308bf26ce231ee2";
    var $secret = "0fbc1d530e584ad6347072e67b23c8a6";
    var $facebook = null;
    
    function initialize()
    {
    	App::import('Vendor', 'facebook');
       	$this->facebook = new Facebook($this->api_key, $this->secret);
    }
    
    function GetUser()
    {
       	$authorized = true;
    	if (!$user = $this->facebook->get_loggedin_user()) {
        	$authorized = false;
        	if (!$user = $this->facebook->get_canvas_user()) {
            	$authorized = false;
        	}
        }
     
        return $user;
    }
    
    function hasPermission($permission)
    {
    	$userFBID = $this->GetUser();
    	if (!$userFBID)
    		return false;
    		
    	try {
			  return $this->facebook->api_client->users_hasAppPermission("publish_stream");	
		} 
		catch (Exception $ex) {
			return false;
		}

    }

    function isAppUser()
    {
    	$userFBID = $this->GetUser();
    	
   		$userInfo = array('is_app_user');
    	
   		try {
			$userInfo = $this->facebook->api_client->users_getInfo($userFBID, $userInfo);
    	 } 
		catch (Exception $ex) {
			return false;
		 }
    	
    	if (!$userInfo)
    		return false;
    		
    	if($userInfo[0]['is_app_user'] == 1)
    		return true;
    	else
    		return false;
    }
    
    function getUserData($fb_id)
	{
		$userInfo = array('username, first_name, last_name');
        $userInfo = $this->facebook->api_client->users_getInfo($fb_id,$userInfo);
		
		if(is_array($userInfo))
			return $userInfo[0];
		else
			return null;
	}
	
    function shouldClearCookie($loggedUser)
    {

    	$fb_id = $this->facebook->get_loggedin_user();
    	
    	if($fb_id)
    	{
   			try {
				$user = $this->facebook->api_client->fql_query('SELECT first_name FROM user WHERE uid = ' . $fb_id);
			} 
			catch (Exception $ex) {
				return true;
			}
		}

    	if($loggedUser && array_key_exists('fbid', $loggedUser) && $loggedUser['fbid'] != 0)
    	{
    		if($fb_id)
    		{
    			if($fb_id != $loggedUser['fbid'])
    			{
    				return true;
    			}
			}
			else
			{
				if($loggedUser['fbid'])
				{
					return true;
				}
			}
		}
		
    	return false;
	}
	
	function getUsername($fb_id)
	{
		$userInfo = array('first_name, last_name, username');
        $userInfo = $this->facebook->api_client->users_getInfo($fb_id,$userInfo);
				
		return $this->findActualName($userInfo[0]);
	}
	
	function findActualName($userInfo)
	{
		$userName = $userInfo['username'];	
		if(empty($userName))
		{
			$userName = $userInfo['first_name']. ' ' . $userInfo['last_name'];
		}
		
		return $userName;
	}
				
	function checkSession()
	{
		$iframeSessionKeyName = $this->api_key. '_session_key';
		$sessionKey = null;
		
		if (isset($_REQUEST[$iframeSessionKeyName])) {
   			$sessionKey = $_REQUEST[$iframeSessionKeyName];
		}
		else if (isset($_REQUEST['fb_sig_session_key'])) {
   			$sessionKey = $_REQUEST['fb_sig_session_key'];
		}
	
		if( isset($sessionKey) )
		{
			setcookie("FBSessionKey", $sessionKey);
		}
		
		if (!empty( $_COOKIE['FBSessionKey']) && !isset($this->facebook->api_client->session_key) ) 
		{
			$this->facebook->api_client->session_key = $_COOKIE['FBSessionKey'];
		}	
	}
	
	function clearCookie()
	{
		$this->facebook->clear_cookie_state();
	}
	
}
?>
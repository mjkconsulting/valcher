<?php

/**
 * @package mobilegates
 * @subpackage    mobilegates.cake.libs.controller
 */

/**
 * imports libs
 */
App::import('Helper', 'Xml');
App::import('vendor', 'pop3');
App::import('vendor', 'pop');
App::import('Vendor', 'Net_POP3', array('file' => 'net'.DS.'POP3.php'));


class MailController extends AppController {
	
	/**
	 * View handler
	 *
	 * @var object
	 */
	var $view = 'Smarty'; 
	
	/**
	 * Helpers
	 *
	 * @var array
	 */
	var $helpers = array('Xml','Js'); 
	
	/**
	 * components
	 */
	var $components = array('RequestHandler');
	
	/**
	 * controller name
	 *
	 * @var string
	 */
	var $name = 'Mail';
	
	
	/**
	 * This controller does not use a model
 	 *
	 * @var array
	 * @access public
	 */
	public $uses = array();
	
	/**
	 * @var boolean $dbTable
	 */
	public $dbTable = false;
	

	/**
	 * render response
	 *
	 * @param string $view
	 * @param string $out
	 */
	function renderResponse($view, $out, $clientRender=false){
		// which response type
		// @TODO: other content types
		$this->autoLayout = false;
        $this->autoRender = false;
		//$this->RequestHandler->respondAs($view);   
		if(Configure::read('debug') > 1){
			Configure::write('debug', 0);
		}
		
		switch ($view){
			case 'json':
				if(!$clientRender) echo $this->json->encode($out);
				else echo $out;
				break;
			case 'rss':
			case 'wap':
			case 'amf':
			case 'xhtml':
			case 'xml':
				if(!$clientRender) echo ClassRegistry::init('XmlHelper')->serialize($out);
				else echo $out;
				break;
			default:
				if(!$clientRender) echo ClassRegistry::init('XmlHelper')->serialize($out);
				else echo $out;
				break;
		}
		
	}
	
	/**
	 * gmail - fetches mail from google gmail
	 * @param int $userid
	 * @param string $user 
	 * @param string $pass 
	 * @param string $render
	 */
	function gmail($userid = null, $user, $pass, $render = 'xml'){
		
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('gmail', $userid); 
			$username = $data['username'];
        	$password = $data['passwd'];
		}else{
			$username = $user;
			$password = $pass;
		}
		
		// connect to gmail 
		$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
		$messages = array();
				
		// max messages
		$max = 15;
		
		// try to connect 
		$mbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
		// check mailbox for new email
		$MC = imap_check($mbox); 

		// unix time 
		$m_gunixtp = array(2592000, 1209600, 604800, 259200, 86400, 21600, 3600);

		// Date to start search
		$m_gdmy = date('d-M-Y', time() - $m_gunixtp[6]);

		//search mailbox for unread messages since $m_t date
		$msgs = imap_search ($mbox, 'UNSEEN SINCE ' . $m_gdmy . '');

		if($msgs > 1){
			// Order results starting from newest message
			rsort($msgs);

			//if m_acs > 0 then limit results
			if($max > 0){
				array_splice($msgs, $max);
			}

			//loop it
			foreach ($msgs as $msg) {

				//get imap header info for obj thang
				$obj_header = imap_headerinfo($mbox, $msg);

				$message = imap_body($mbox, $msg, 2);
				
				$msg_arr = array('subject' => $obj_header->subject,
				'from' =>  $obj_header->fromaddress,
				'date' => $obj_header->date,
				'body' => $message,
				'priority' => 0,
				'type' => 'message',
				'messageType' => 'GMAIL' 
				);
				array_push($messages, array('GemInfo' => $msg_arr));
			}
		}
		
		imap_close($mbox);
				
		// render response
		$this->renderResponse($render, $messages);
	}
	
	/**
	 * Pop3
	 * @param int $userid
	 * @param string $host
	 * @param string $user
	 * @param string $pass
	 * @param string $userid
	 * @param string $render
	 */
	function pop($userid=null, $host, $user, $pass, $render='xml'){
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('mail', $userid);
			$data = array_pop($data);
			$username = $data['user_credentials']['username'];
        	$password = $data['user_credentials']['passwd'];
		}else{
			$username = $username;
			$password = $password;
		}
		
		$host = $host ? $host : 'pop.gmail.com';
		$pop3 = new POP3(false, false, false, 'tcp', false);
		$pop3->connect($host);
		$pop3->login($username, $password, false);
		$emails = array();

		$status = $pop3->getOfficeStatus();
		if ($status == false) {
			die('Error retrieving mailbox status');
		}
		$mail_count = $status['count'];
		for ($i = 1; $i <= $mail_count; $i++) {
			$email = $pop3->getMails(array($i));
			array_push($emails, $email);
		}
		
		$this->renderResponse($render, $emails);
	}
	
	/**
	 * Pop3 mail function
	 * @param int $userid
	 * @param string $hostname
	 * @param string $port
	 * @param string $user
	 * @param string $pass
	 */
	function pop3($userid=null, $hostname, $port=995, $username, $password, $render='xml'){

		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('mail', $userid);
			$data = array_pop($data);
			$username = $data['user_credentials']['username'];
        	$password = $data['user_credentials']['passwd'];
		}else{
			$username = $username;
			$password = $password;
		}
		
		$pop3 = new pop3_class;
		$pop3->hostname 	= $hostname;         // POP 3 server host name
		$pop3->port 		= $port;             // POP 3 server host port, 
		$pop3->tls 			= 0;                 // Establish secure connections using TLS      
		$user 				= $username;         // Authentication user name                    
		$password			= $password;         // Authentication password                     
		$pop3->realm		= "";                // Authentication realm or domain              
		$pop3->workstation	= "";                // Workstation for NTLM authentication         
		$apop				= 0;                 // Use APOP authentication                     
		$pop3->authentication_mechanism = "USER";// SASL authentication mechanism               
		$pop3->debug 		= 1;                          // Output debug information                    
		$pop3->html_debug	= 1;                     // Debug information is in HTML                
		$pop3->join_continuation_header_lines=1; // Concatenate headers split in multiple lines 

		$mail_info = array();
		
		if(($error=$pop3->Open())=="")
		{
			if(($error=$pop3->Login($user,$password,$apop))=="")
			{
				if(($error=$pop3->Statistics($messages,$size))=="")
				{
					$mail_info['size'] = $size;
					$result=$pop3->ListMessages("",0);
					if(GetType($result)=="array")
					{
						for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
						$mail_info[Key($result)] = $result[Key($result)] . " bytes";
						$result=$pop3->ListMessages("",1);
						if(GetType($result)=="array")
						{
							for(Reset($result),$message=0;$message<count($result);Next($result),$message++)
							if($messages>0)
							{
								if(($error=$pop3->RetrieveMessage(1,$headers,$body,2))=="")
								{
									for($line=0;$line<count($headers);$line++){
										for($line=0;$line<count($body);$line++){
											$mail_info['line'][ ] = HtmlSpecialChars($body[$line]);
										}
								
									}
								}
							}
							if($error==""
							&& ($error=$pop3->Close())=="")
							echo "<PRE>Disconnected from the POP3 server &quot;".$pop3->hostname."&quot;.</PRE>\n";

						}
						else
						$error=$result;
					}
					else
					$error=$result;
				}
			}
		}
		if($error!="")
		$mail_info['error'][ ] = HtmlSpecialChars($error);
		
		$this->renderResponse($render, $mail_info);
	}
	
	/**
	 * Pop3_mail
	 * @param int $userid
	 * @param string $host
	 * @param string $user
	 * @param string $pass
	 * @param string $userid
	 * @param string $render
	 */
	function pop3_mail($userid=null, $host, $port=110, $user, $pass, $render='xml'){
		if($userid) {
			$this->loadModel('ApiTools');
			$data = $this->ApiTools->getUserCredentials('mail', $userid);
			$username = $data['username'];
        	$password = $data['passwd'];
		}else{ 
			$username = $user; 
			$password = $pass;
		}
		
		$pop3 = new Net_POP3();
		$strServerName = sprintf('%s:%s',$host, $port);
		$pop3->connect($strServerName);

		$pop3->login($username, $password);
		$listing = $pop3->getListing();
		print "Total messages on server : ".count($listing)."\n\n";

		foreach($listing as $msg)
		{
			$headers = $pop3->getParsedHeaders($msg['msg_id']);
			print "Mail from : ".$headers['From']."\n";
		}

		print "\nTotal size of mails in the mailbox: ".$pop3->getSize()."\n";

		$pop3->disconnect();
		$this->renderResponse($render, $emails);
	}
}
?>
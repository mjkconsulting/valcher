<?php
/**
 * Users controller
 * Oren Shepes - 01/10
 * Handles user interaction with the system
 * @package mobilegates
 */
class UsersController extends AppController {
	/** @var array $components */
    public $components = array('Openid');
    /** @var array $uses */
    public $uses = array();

    /**
     * login function
	 * @return string
     */
    public function login() {
    	$returnTo = 'http://'.$_SERVER['SERVER_NAME'].'/users/login';

    	if (!empty($this->data)) {
    		try {
    			$this->Openid->authenticate($this->data['OpenidUrl']['openid'], $returnTo, 'http://'.$_SERVER['SERVER_NAME']);
    		} catch (InvalidArgumentException $e) {
    			$this->setMessage('Invalid OpenID');
    		} catch (Exception $e) {
    			$this->setMessage($e->getMessage());
    		}
    	} elseif ($this->Openid->isOpenIDResponse()) {
    		$response = $this->Openid->getResponse($returnTo);

    		if ($response->status == Auth_OpenID_CANCEL) {
    			$this->setMessage('Verification cancelled');
    		} elseif ($response->status == Auth_OpenID_FAILURE) {
    			$this->setMessage('OpenID verification failed: '.$response->message);
    		} elseif ($response->status == Auth_OpenID_SUCCESS) {
    			echo 'successfully authenticated!';
    			exit;
    		}
    	}
    }

	/**
	 * sets a message
	 *
	 * @param string $message
	 */
	private function setMessage($message) {
		$this->set('message', $message);
	}
}
?>
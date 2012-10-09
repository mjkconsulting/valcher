<?php
/**
 * A simple OAuth consumer for CakePHP.
 * 
 * Requires the OAuth library from http://oauth.googlecode.com/svn/code/php/
 * 
 * Copyright (c) by Daniel Hofstetter (http://cakebaker.42dh.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 */

require('OAuth.php');
App::import('Core', 'http_socket');

// using an underscore in the class name to avoid a naming conflict with the OAuth library
class OAuth_Consumer { 
	/** @var string $url */
	private $url = null;
	/** @var string $consumerKey */
	private $consumerKey = null;
	/** @var string $consumerSecret */
	private $consumerSecret = null;
	/** @var string $fullResponse */
	private $fullResponse = null;
	
	/**
	 * constructor
	 *
	 * @param string $consumerKey
	 * @param string $consumerSecret
	 * @return void
	 */
	public function __construct($consumerKey, $consumerSecret = '') {
		$this->consumerKey = $consumerKey;
		$this->consumerSecret = $consumerSecret;
	}

	/**
	 * Call API with a GET request
	 * @param string $accessTokenKey
	 * @param string $accessTokenSecret
	 * @param string $url
	 * @param array $getData
	 * @return string
	 */
	public function get($accessTokenKey, $accessTokenSecret, $url, $getData = array()) {
		$accessToken = new OAuthToken($accessTokenKey, $accessTokenSecret);
		$request = $this->createRequest('GET', $url, $accessToken, $getData);
		
		return $this->doGet($request->to_url());
	}
	
	/**
	 * Gets access token
	 *
	 * @param string $accessTokenURL
	 * @param string $requestToken
	 * @param string $httpMethod
	 * @param string $parameters
	 * @return $mixed
	 */
	public function getAccessToken($accessTokenURL, $requestToken, $httpMethod = 'POST', $parameters = array()) {
		$this->url = $accessTokenURL;
		$queryStringParams = OAuthUtil::parse_parameters($_SERVER['QUERY_STRING']);
		$parameters['oauth_verifier'] = $queryStringParams['oauth_verifier'];
		$request = $this->createRequest($httpMethod, $accessTokenURL, $requestToken, $parameters);
		
		return $this->doRequest($request);
	}
	
	/**
	 * Useful for debugging purposes to see what is returned when requesting a request/access token.
	 */
	public function getFullResponse() {
		return $this->fullResponse;
	}
	
	/**
	 * @param $requestTokenURL
	 * @param $callback An absolute URL to which the Service Provider will redirect the User back when the Obtaining User 
	 * 					Authorization step is completed. If the Consumer is unable to receive callbacks or a callback URL 
	 * 					has been established via other means, the parameter value MUST be set to oob (case sensitive), to 
	 * 					indicate an out-of-band configuration. Section 6.1.1 from http://oauth.net/core/1.0a
	 * @param $httpMethod 'POST' or 'GET'
	 * @param $parameters
	 */
	public function getRequestToken($requestTokenURL, $callback = 'oob', $httpMethod = 'POST', $parameters = array()) {
		$this->url = $requestTokenURL;
		$parameters['oauth_callback'] = $callback;
		$request = $this->createRequest($httpMethod, $requestTokenURL, null, $parameters);
		
		return $this->doRequest($request);
	}
	
	/**
	 * Call an API using post
	 *
	 * @param string $accessTokenKey
	 * @param string $accessTokenSecret
	 * @param string $url
	 * @param array $postData
	 * @return $mixed
	 */
	public function post($accessTokenKey, $accessTokenSecret, $url, $postData = array()) {
		$accessToken = new OAuthToken($accessTokenKey, $accessTokenSecret);
		$request = $this->createRequest('POST', $url, $accessToken, $postData);
		
		return $this->doPost($url, $request->to_postdata());
	}
	
	/**
	 * Create auth token
	 *
	 * @param $mixed $response
	 * @return Object
	 */
	protected function createOAuthToken($response) {
		if (isset($response['oauth_token']) && isset($response['oauth_token_secret'])) {
			return new OAuthToken($response['oauth_token'], $response['oauth_token_secret']);
		}
		
		return null;
	}
	
	private function createConsumer() {
		return new OAuthConsumer($this->consumerKey, $this->consumerSecret);
	}
	
	/**
	 * Creates a request
	 *
	 * @param string $httpMethod
	 * @param string $url
	 * @param string $token
	 * @param array $parameters
	 * @return Object
	 */
	private function createRequest($httpMethod, $url, $token, array $parameters) {
		$consumer = $this->createConsumer();
		$request = OAuthRequest::from_consumer_and_token($consumer, $token, $httpMethod, $url, $parameters);
		$request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, $token);
		
		return $request;
	}

	/**
	 * does a GET request
	 *
	 * @param string $url
	 * @return string
	 */
	private function doGet($url) {
		$socket = new HttpSocket();
		return $socket->get($url);
	}
	
	/**
	 * does a POST request
	 *
	 * @param string $url
	 * @param array $data
	 * @return Object
	 */
	private function doPost($url, $data) {
		$socket = new HttpSocket();
		return $socket->post($url, $data);
	}
	
	/**
	 * Makes a request
	 *
	 * @param Object $request
	 * @return Object
	 */
	private function doRequest($request) {
		if ($request->get_normalized_http_method() == 'POST') {
			$data = $this->doPost($this->url, $request->to_postdata());
		} else {
			$data = $this->doGet($request->to_url());
		}

		$this->fullResponse = $data;
		$response = array();
		parse_str($data, $response);

		return $this->createOAuthToken($response);
	}
}
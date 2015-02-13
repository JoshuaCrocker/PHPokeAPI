<?php
class Request {
	private $url = 'http://pokeapi.co/api/v1/';
	private $response;
	
	function __construct($url) {
		$curl = curl_init($this->url.$url);
		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1	
		]);
		$this->response = curl_exec($curl);
		curl_close($curl);
	}
	
	function getResponse() {
		return $this->response;
	}
}
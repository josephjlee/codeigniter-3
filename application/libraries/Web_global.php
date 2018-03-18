<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_global {

	private $CI;

	public function __construct(){
		$this->CI =& get_instance();
		$this->api_url = $this->CI->config->item("base_api_url");
	}

	/*Global Variable*/
	public function default_data(){		
		$data = array(
						'base_url' =>  base_url(),
						'api_url' => $this->api_url
					);
		return (array) $data;
	}

	/*API getter using CURL*/
	public function curl_get($url) {
		$header = array('Content-Type: application/x-www-form-urlencoded; charset=utf-8');

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_TIMEOUT, 130);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($curl);
		            curl_close($curl);

		$xml = simplexml_load_string($response); 
		$array = json_decode(json_encode((array)$xml), TRUE); 
		$result = array();
		foreach($array as $api_data) {
			return $api_data;
		}
	}

	/*ID checker*/
	public function checkIdExist($id){
		
	}

}

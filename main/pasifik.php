<?php 

/**
* Pasifik Telekom API
* Version: 2
* Author: Tarek Kalaji
* License: MIT
*/
class PasifikAPI
{
	function __construct($username, $password, $lang="tr", $DEBUG=false)
	{
		$this->authorization = base64_encode($username.":".$password);
		$this->base_url = "https://oim.pasifiktelekom.com.tr/".$lang."/api/";
		$this->DEBUG = $DEBUG;
	}
	public function submit($from, $to, $text, $universal=false, $alphabet="Default", $scheduled_delivery_time="", $period=0){
		$data = array(
			"from" => $from, 
			"to" => $to, 
			"text" => $text, 
			"universal" => $universal, 
			"alphabet" => $alphabet
		);
		if(strlen($scheduled_delivery_time) > 0){$data["scheduled_delivery_time"] = $scheduled_delivery_time;}
		if($period > 0){$data["period"] = $period;}
		return $this->_post("sms/submit/", $data);
	}
	public function submit_multi($from, $envelopes, $universal=false, $alphabet="Default", $scheduled_delivery_time="", $period=0){
		$data = array(
			"from" => $from, 
			"envelopes" => $envelopes, 
			"universal" => $universal,
			"alphabet" => $alphabet
		);
		if(strlen($scheduled_delivery_time) > 0){ $data["scheduled_delivery_time"] = $scheduled_delivery_time; }
		if($period > 0){ $data["period"] = $period; }
		return $this->_post("sms/submit/multi/", $data);
	}
	public function query_multi($start_date, $end_date){
		$data = array("start_date" => $start_date, "end_date" => $end_date);
		return $this->_post("sms/query/multi/", $data);
	}
	public function query_multi_id($sms_id="123123"){
		$data = array("sms_id" => $sms_id);
		return $this->_post("sms/query/multi/id/", $data);
	}
	public function query($sms_id="123123"){
		$data = array("sms_id" => $sms_id);
		return $this->_post("sms/query/", $data);
	}
	public function getsettings(){
		$data = array();
		return $this->_post("user/getsettings/", $data);
	}
	public function authorization($encode=false){
		$auth = $encode ? $this->authorization : base64_decode($this->authorization);
		if ($this->DEBUG) {
			header("Content-Type: application/json");
			echo $auth;
		}
		return $auth;
	}
	private function _post($resource, $data){
		$json_data = json_encode($data, JSON_FORCE_OBJECT);
		$header = "Content-Type: application/json"."\r\n".
				"Accept: application/json"."\r\n".
				"Authorization: ".$this->authorization."\r\n".
				'Content-Length: ' . strlen($json_data);// . "\r\n"
		$result = file_get_contents($this->base_url.$resource, null, 
			stream_context_create(
				array(
					'http' => array(
						'method' => 'POST',
						'header' => $header,
						'content' => $json_data
					),
				)
			)
		);
		if ($this->DEBUG) {
			header("Content-Type: application/json");
			echo "REQUEST: \n".(strlen($json_data) > 0 ? json_encode(json_decode($json_data),JSON_PRETTY_PRINT): $json_data)."\n\n";
			echo "HEADER: \n".$header."\n\n";
			echo "RESPONSE: \n".(strlen($result) > 0 ? json_encode(json_decode($result),JSON_PRETTY_PRINT): $result)."\n\n";
		}
		return $result;
	}
}

?>

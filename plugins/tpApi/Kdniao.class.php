<?php
//zend 多点乐资源  禁止倒卖 一经发现停止任何服务
class Kdniao
{
	private $client_id;
	private $appkey;
	static private $instance;

	public function __construct($client_id = '', $appkey = '')
	{
		$this->client_id = $client_id;
		$this->appkey = $appkey;
	}

	static public function getInstance($client_id = '', $appkey = '')
	{
		if (!isset(self::$instance)) {
			self::$instance = new Kdniao($client_id, $appkey);
		}

		return self::$instance;
	}

	public function submitEOrder($requestData)
	{
		$ReqURL = 'http://api.kdniao.cc/api/Eorderservice';
		$datas = array('EBusinessID' => $this->client_id, 'RequestType' => '1007', 'RequestData' => urlencode($requestData), 'DataType' => '2');
		$datas['DataSign'] = $this->encrypt($requestData, $this->appkey);
		$result = $this->sendPost($ReqURL, $datas);
		return $result;
	}

	public function applyCustomerAccount($requestData)
	{
		$ReqURL = 'http://api.kdniao.cc/api/apiservice';
		$datas = array('EBusinessID' => $this->client_id, 'RequestType' => '1107', 'RequestData' => urlencode($requestData), 'DataType' => '2');
		$datas['DataSign'] = $this->encrypt($requestData, $this->appkey);
		$result = $this->sendPost($ReqURL, $datas);
		return $result;
	}

	public function sendPost($url, $datas)
	{
		$temps = array();

		foreach ($datas as $key => $value) {
			$temps[] = sprintf('%s=%s', $key, $value);
		}

		$post_data = implode('&', $temps);
		$url_info = parse_url($url);

		if (empty($url_info['port'])) {
			$url_info['port'] = 80;
		}

		$httpheader = 'POST ' . $url_info['path'] . " HTTP/1.0\r\n";
		$httpheader .= 'Host:' . $url_info['host'] . "\r\n";
		$httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
		$httpheader .= 'Content-Length:' . strlen($post_data) . "\r\n";
		$httpheader .= "Connection:close\r\n\r\n";
		$httpheader .= $post_data;
		$fd = fsockopen($url_info['host'], $url_info['port']);
		fwrite($fd, $httpheader);
		$gets = '';
		$headerFlag = true;

		while (!feof($fd)) {
			if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
				break;
			}
		}

		while (!feof($fd)) {
			$gets .= fread($fd, 128);
		}

		fclose($fd);
		return $gets;
	}

	public function encrypt($data, $appkey)
	{
		return urlencode(base64_encode(md5($data . $appkey)));
	}
}

function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
{
	static $recursive_counter = 0;

	if (1000 < ++$recursive_counter) {
		exit('possible deep recursion attack');
	}

	foreach ($array as $key => $value) {
		if (is_array($value)) {
			arrayRecursive($array[$key], $function, $apply_to_keys_also);
		}
		else {
			$array[$key] = $function($value);
		}

		if ($apply_to_keys_also && is_string($key)) {
			$new_key = $function($key);

			if ($new_key != $key) {
				$array[$new_key] = $array[$key];
				unset($array[$key]);
			}
		}
	}

	$recursive_counter--;
}

function JSON($array)
{
	arrayrecursive($array, 'urlencode', true);
	$json = json_encode($array);
	return urldecode($json);
}

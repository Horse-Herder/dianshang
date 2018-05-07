<?php 
namespace think;
class QQlogin{
	protected $codeUrl ="https://graph.qq.com/oauth2.0/authorize";//获取code接口
	protected $tokenUrl= "https://graph.qq.com/oauth2.0/token";//获取$tokenUrl
	protected $OpenIdUrl = "https://graph.qq.com/oauth2.0/me";
	protected $backurl = "http://www.iwebshop.com/index.php";
	protected $appid = "101353491";
	protected $appsecret ="df4e46ba7da52f787c6e3336d30526e4"; 



	public function getCode()
	{
		$url="";
		$backurl = urlencode($this->backurl);
		$arr=array(
			'response_type'=>'code',
			'client_id'=>$this->appid,
			'redirect_uri'=>$backurl,
			'state' => 1,
			'scope'=>'get_user_info,get_info',
		);
		$strParams = $this->handleDate($arr);
		$url =$this->codeUrl."?".$strParams;
		return $url;
	}


	public function getToken($code)
	{
		$backurl = urlencode($this->backurl);
		$arr=array(
			'grant_type'=>'authorization_code',
			'client_id'=>$this->appid,
			'client_secret'=>$this->appsecret,
			'code'=>$code,
			'redirect_uri'=>$backurl,
		);
		$strParams=$this->handleDate($arr);
		$url = $this->tokenUrl."?".$strParams;
		$arr = $this->sendUrl($url);
		$arrInfo = explode("&",$arr);
		return explode("=",$arrInfo[0])[1];
	}

	public function getOpenId($token)
	{
		$url = $this->OpenIdUrl."?access_token={$token}";
		$str = $this->sendUrl($url);

		if (strpos($str, "callback") !== false) {
			$lpos = strpos($str, "(");
			$rpos = strrpos($str, ")");
			$str = substr($str, $lpos + 1, $rpos - $lpos - 1);
		}
		$user = json_decode($str, TRUE);
		
		return $user;
	}


	private function sendUrl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);

		//设置超时时间为3s
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}

	/**
	 * [handleDate 处理数据]
	 * @param  [type] $arr [数据数组]
	 * @return [type]      [description]
	 */
	private function handleDate($arr)
	{
		$strParams="";
		foreach ($arr as $key => $value) {
			$strParams.=$key.'='.$value.'&';
		}
		$strParams =substr($strParams, 0,-1);
		return $strParams;
	}
}

 ?>

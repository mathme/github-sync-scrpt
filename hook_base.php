<?php

$githubIPs   = array("207.97.227.253/32", "50.57.128.197/32", "108.171.174.178/32", "50.57.231.61/32", "204.232.175.64/27", "192.30.252.0/22" );
//アクセス元IPの判定処理
foreach ($githubIPs as $ipAndMask){
	$ipAndMask = chop($ipAndMask);
	if (''	=== $ipAndMask) continue;
	if ('#'	=== substr($ipAndMask, 0, 1)) continue;

	list($allowIp, $mask) = explode("/", $ipAndMask);

	$remoteLong	= ip2long($_SERVER["REMOTE_ADDR"])>> (32 - $mask);
	$allowLong	= ip2long($allowIp)>> (32 - $mask);

	if ($remoteLong == $allowLong){
		//githubからのcallと同時に渡されるJSONの有無を判定
		$payload = json_decode( $_REQUEST[ "payload" ] );
		if( $payload == NULL ){
			header( $errorStatus );
			die;
		}
		if( !chdir( "/var/www/html/github/" . $payload->repository->name ) ){
			header( $errorStatus );
			die;
		}
		shell_exec( "sudo -u mathme git pull" );
		die;
	}
}

// echo "許可されたIPからのアクセスではありません。";

?>
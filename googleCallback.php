<?php
session_start();
error_reporting(1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');


require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	$googleClientId  = '987774927991-o1tse45rbtolertynqkkert7vk83bert.apps.googleusercontent.com'
	$googleClientSecret  = 'reLYXSReZwvgb5amqq-AEfgYR'
	$loginGoogleRedirect  = 'http://localhost/googleCallback.php'
	try {
		$gapi = new GoogleLoginApi();

		// Get the access token
		$data = $gapi->GetAccessToken($googleClientId, CLIENT_REDIRECT_URL, $loginGoogleRedirect, $_GET['code']);

		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);

		$personEmail = $user_info['emails'][0]['value'];
		$personName = $user_info['displayName'];
		$socialId = $user_info['id'];
		
	  echo '<pre>';print_r($personEmail); echo '</pre>';
		echo '<pre>';print_r($personName); echo '</pre>';
		echo '<pre>';print_r($socialId); echo '</pre>';
		echo '<pre>';print_r($user_info); echo '</pre>';


	}catch(Exception $e) {
		echo $e->getMessage();
	}
}

?>

<?php
	if(!session_id())
		session_start();
	require_once 'Facebook/autoload.php';

	$app_id = '2585897151723669';
	$app_secret = 'ca30308331cf1bdfeac27e16773b0a5f';
	$permissions = ['email'];
	$callbackUrl = 'http://localhost/luxury/php/callback_fb.php';

	$fb = new Facebook\Facebook([
	  'app_id' => $app_id,
	  'app_secret' => $app_secret,
	  'default_graph_version' => 'v7.0',
	  ]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl($callbackUrl, $permissions);
?>
<?php
session_start();
ini_set('display_errors', 1);
require_once __DIR__ . '/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;


$fb = new Facebook\Facebook([
  'app_id' => '244389902599042',
  'app_secret' => 'b9c8986606cb1a3e720d0dba3325e1e7',
  'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'user_likes']; // optional

$loginUrl = $helper->getLoginUrl('', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
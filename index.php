<!DOCTYPE html>
<html>
<head>
	<!-- Login Facebook -->
	<?php
		if(!session_id()) {
    session_start();
		}
		require_once __DIR__ . '/facebook-sdk/autoload.php';

		use Facebook\FacebookSession;
		use Facebook\FacebookRequest;
		use Facebook\GraphUser;
		use Facebook\FacebookRedirectLoginHelper;


		$fb = new Facebook\Facebook([
		  'app_id' => '584389999599743',
		  'app_secret' => 'a7c7856606cb1a3e789d0rea8466e1e7',
		  'default_graph_version' => 'v3.1',
		]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email', 'user_likes']; // optional

		$loginFacebookRedirect = $helper->getLoginUrl('http://localhost/facebookCallback.php', $permissions);
	?>
</head>
<body>
	<div class="row">
		<div class="col">
			<a class="btn" href="<?php echo $loginFacebookRedirect; ?>">
				facebook
			</a>
		</div>
		<div class="col">
			<?php
				$googleClientId  = '987774927991-o1tse45rbtolertynqkkert7vk83bert.apps.googleusercontent.com'
				$loginGoogleRedirect  = 'http://localhost/googleCallback.php'
			?>
			<a class="btn" href="<?= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode($loginGoogleRedirect) . '&response_type=code&client_id=' . $googleClientId . '&access_type=online' ?>">
				Google
			</a>
		</div>
	</div>
</body>


</html>

<?php
$errors = [];
$success = false;

if(isset($_POST['login_submit'])){
	
	if(empty($_POST['username']) || empty($_POST['password'])){
		$errors['username'] = 'Please fill up all the fields correctly.';
	}

	if(empty($_POST['g-recaptcha-response'])){
		$errors['recaptcha'] = 'Captcha field is required.';
	}

	// print_r($_POST);

	if(empty($errors)){
		$is_correct = validate_recaptcha();
		if($is_correct !== true){
			$errors['recaptcha'] = 'Please fill up the captcha correctly.';
		}
	}
	
	// Now start login functionality
	if(empty($errors)){
		$success = true;
	}

}//End if

/**
 * Send validation http request
 */
function validate_recaptcha(){
	$post_data = http_build_query(
	    array(
	        'secret' => '6Le9LjcUAAAAAF2pCxp2DO-yTfJRzIdZj6YVmV9o',
	        'response' => $_POST['g-recaptcha-response'],
	        'remoteip' => $_SERVER['REMOTE_ADDR']
	    )
	);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/x-www-form-urlencoded',
	        'content' => $post_data
	    )
	);

	$context  = stream_context_create($opts);
	$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
	$result = json_decode($response);
	
	if(empty($result->success)){
	    return false;
	}else{
		return true;
	}
}//End of validate_recaptcha
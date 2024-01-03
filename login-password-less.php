<?php
require_once('plugins/login-password-less.php');

function pass() {
	if (file_exists("/tmp/pass")) {
		$password = file_get_contents("/tmp/pass");
	} else {
		$password = bin2hex(random_bytes(16));
		$out = fopen('php://stdout', 'w');
		fputs($out, "$password\n");
		fclose($out);	
		file_put_contents("/tmp/pass", $password);
	}
	return $password;
}

/** Set allowed password
	* @param string result of password_hash
	*/
return new AdminerLoginPasswordLess(
	$password_hash = password_hash(pass(), PASSWORD_DEFAULT)
);

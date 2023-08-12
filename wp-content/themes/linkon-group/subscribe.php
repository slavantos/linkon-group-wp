<?php
		
	$t = explode('wp-content',dirname(__FILE__));
		require_once($t[0].'/wp-load.php');
		require_once($t[0].'/wp-config.php');	
	
	$email = $_POST['email'];

	$email = htmlspecialchars(stripslashes($email));

	$post_data = array(
		 'post_title'    => $email. ':Subscribe form',
		 'post_content'  => "Email: " . $email,
		 'post_status'   => 'private',
		 'post_author'   => 1,
		 'post_type' => 'subscribe'
	   );
	
	$post_id = wp_insert_post($post_data);

?>
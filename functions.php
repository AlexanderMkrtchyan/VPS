<?php
/**
 * wordpress framework functions and definitions
 *
 * @package qs
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
if ( ! function_exists( 'qs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late forcron some features, such
	 * as indicating support for post thumbnails.
	 */
	// Add Header Menu Walker
    require_once 'libs/walker.php';
	function qs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wordpress framework, use a find and replace
		 * to change 'qs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'qs', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        // This theme uses wp_nav_menu() in one location.
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'header-menu' => __('Header Menu'),
            'header-menu-logged-in' => __('Header Menu Login')
        ));
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );



	}

endif;

add_action( 'after_setup_theme', 'qs_setup' );



/**

 * Functions which enhance the theme by hooking into WordPress.

 */

require get_template_directory() . '/inc/template-functions.php';



/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';



/**

 * Load Jetpack compatibility file.

 */

if ( defined( 'JETPACK__VERSION' ) ) {

	require get_template_directory() . '/inc/jetpack.php';

}



/**

 * Woocommerce

 */

    
    
/**
 * Theme
 **/
//  Enqueue styles scripts
require get_template_directory() . '/theme/theme-enqueue.php';
//  Dequeue styles scripts
require get_template_directory() . '/theme/theme-dequeue.php';

//  Widgets

require get_template_directory() . '/theme/theme-widgets.php';

//  Thumbs

require get_template_directory() . '/theme/theme-thumbs.php';

//  Hooks

require get_template_directory() . '/theme/theme-hooks.php';

//  Template Tags

require get_template_directory() . '/theme/theme-template-tags.php';

//  ACF Options

require get_template_directory() . '/theme/theme-acf-options.php';

//  Faq posts

require get_template_directory() . '/theme/theme-faq-post.php';

//  Alex Function.php

require get_template_directory() . '/theme/theme-functions.php';



//  Questions posts

require get_template_directory() . '/theme/theme-question-post.php';


add_action('wp_ajax_nopriv_email_send', 'email_send_function');

add_action('wp_ajax_email_send', 'email_send_function');

function email_send_function(){

	$to = "alexander88m@gmail.com";

	$subject = "Mail verification";

	$txt = "Hello world!";

	$headers = "From: quigleyshores.com" . "\r\n" .

	"CC: about193@mail.ru";
	$klir  = mail($to,$subject,$txt,$headers);
	echo json_encode($klir);
	wp_die();
}


// Registration step 1
add_action('wp_ajax_nopriv_register_user', 'register_user_function');
add_action('wp_ajax_register_user', 'register_user_function');
function register_user_function(){
	






	global $wpdb, $PasswordHash, $current_user, $user_ID;
	$first_name = $wpdb->escape(trim($_REQUEST['data']['first-name']));
	$last_name = $wpdb->escape(trim($_REQUEST['data']['last-name']));
	$city = $wpdb->escape(trim($_REQUEST['data']['city']));
	$state = $wpdb->escape(trim($_REQUEST['data']['state']));
	$email = $wpdb->escape(trim($_REQUEST['data']['email']));
	$email_confirm = $wpdb->escape(trim($_REQUEST['data']['email-confirm']));
	$username = $wpdb->escape(trim($_REQUEST['data']['username']));
	$zip = $wpdb->escape(trim($_REQUEST['data']['zip']));
	$password = $wpdb->escape(trim($_REQUEST['data']['password']));
	$password_confirm = $wpdb->escape(trim($_REQUEST['data']['password-confirm']));
	$birth_date = $wpdb->escape(trim($_REQUEST['data']['birth-date']));
	$checkbox = $wpdb->escape(trim($_REQUEST['data']['checkbox']));


	

	if($email !== $email_confirm){
		echo json_encode('Emails not match');
	}elseif($password !== $password_confirm){
		echo json_encode("Passwords not match");
	}elseif($checkbox == false || $first_name == "" || $last_name == "" || $city == "" || $state == "" || $email == "" || $username == "" || $zip == "" || $password == "" || $birth_date == ""){
		echo json_encode('Some data isn\'t filled');
	}elseif($email !== $email_confirm){
		echo json_encode('mail not match bozi txa');
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo json_encode('Invalid email address');
	}elseif(email_exists($email)){
		echo json_encode('Email already exist');
	}elseif(filter_var($username, FILTER_VALIDATE_EMAIL)) {
		echo json_encode('username should not contain email address');
   	}elseif(!preg_match("/^\d{5}$/", $zip)){
		echo json_encode('zip is wrong');
	}else{
		$user_id = wp_insert_user(array('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber'), [ 'show_in_rest' => true ]);
		$cookie_id = strval($user_id);
		$uuid = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
		setcookie('user_id', $cookie_id, mktime(0, 0, 0, 0, 0, 2027), '/', 'quigleyoat22.net', true, false);

		//Getting user IP and insert into DB
		if (!empty($_SERVER['HTTP_CLIENT_IP'])){
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		}
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		//whether ip is from remote address
		else{
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}
		update_user_meta( $user_id, 'ip_address', $ip_address );

		update_user_meta( $user_id, 'zip', $zip);
		update_user_meta( $user_id, 'birth-date', $birth_date);
		update_user_meta( $user_id, 'city', $city);
		update_user_meta( $user_id, 'state', $state);
		update_user_meta( $user_id, 'skey', $uuid);

		
		$user = get_user_by( 'id', $user_id ); 
		if( $user ) {
			wp_set_current_user( $user_id, $user->user_login );
			wp_set_auth_cookie( $user_id );
			update_user_meta($user_id, 'verified', false);
			// do_action( 'wp_login', $user->user_login );
			update_user_meta($user_id, 'activation', $uuid);




			$to      = $email;
$subject = 'Validation';
$message = 'quigleyshores.com/activation?uid='.$user_id.'&key='.$uuid.'';
$headers = 'From: webmaster@quigleyshores.com' . "\r\n" .
    'Reply-To: pidor@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail('alexander88m@gmail.com', 'boz@ ara', $ip_address, 'From: localhost');
		}
		echo json_encode('success');
	}
wp_die();
}
//REGISTRATION STEP 2
add_action('wp_ajax_nopriv_questions_and_answers', 'questions_and_answers');
add_action('wp_ajax_questions_and_answers', 'questions_and_answers');

function questions_and_answers(){
	if($_REQUEST['data']['user_id_cookie'] == '' || $_REQUEST['data']['question_1'] == '' || $_REQUEST['data']['question_2'] == '' || $_REQUEST['data']['answer_1'] == '' || $_REQUEST['data']['answer_2'] == ''){
		echo "fill all fields";
	}else{
		$servername = "localhost";

		$username = "quigleyo_date";
	
		$password = "Date@321!";
	
		$dbname = "quigleyo_date";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$user_id = $_REQUEST['data']['user_id_cookie'];
		$question_one = $_REQUEST['data']['question_1'];
		$question_two = $_REQUEST['data']['question_2'];
		$answer_one = $_REQUEST['data']['answer_1'];
		$answer_two = $_REQUEST['data']['answer_2'];

		$sql = "INSERT INTO questions_and_answers (user_id, question_one, answer_one, question_two, answer_two)	VALUES ($user_id, '$question_one', '$answer_one','$question_two', '$answer_two')";

		if ($conn->query($sql) === TRUE) {
			echo json_encode("success");
		} else {
    	    echo json_encode("Error: " . $sql . "<br>" . $conn->error);
		}

		$conn->close();
	}
	wp_die();
	
}

//REGISTRATION STEP 3 (upload blob(file) to server)
function ai_to_server(){

	if(isset($_FILES['file']) and !$_FILES['file']['error']){
		$fname = 'temp_file' .get_current_blog_id(). '.jpeg';
		$wp_upload_dir = wp_upload_dir();
		// echo $_SERVER['DOCUMENT_ROOT'] . 'wp-content/themes/dating/images/temp_ai_images/' . $fname; 
		$fle = move_uploaded_file($_FILES['file']['tmp_name'], $wp_upload_dir['basedir'] . '/user_faces/' . $fname);

	
		$filename = $wp_upload_dir['basedir'] . '/user_faces/' . $fname;
		$filetype = wp_check_filetype( basename( $filename ), null );

		$attachment = array(
			'guid'           => $wp_upload_dir['basedir'] . '/user_faces/' . get_current_user_id(  ) . '_is_ai_image.jpeg', 
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);
		
		// Insert the attachment.
		$attach_id = wp_insert_attachment( $attachment, $filename );
		
		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		
		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );
		update_post_meta($attach_id, 'camera_ai_image', true);

				
		echo $attach_id;
	}
	
	wp_die();
} 



add_action( 'wp_ajax_ai_to_server', 'ai_to_server' );

add_action( 'wp_ajax_nopriv_ai_to_server', 'ai_to_server' );

function wpdocs_log_me_shortcode_fn() {
 
  $args = array(
    'echo'            => true,
    'redirect'        => get_permalink( get_the_ID() ),
    'remember'        => true,
    'value_remember'  => true,
  );
 
  return wp_login_form( $args );
 
}
add_shortcode( 'wpdocs_log_me', 'wpdocs_log_me_shortcode_fn' );

function get_folder_context(){
	$filez = scandir(get_template_directory() . '/images/celebrity_images/' . $_REQUEST['data']['gender']);


	$servername = "localhost";

	$username = "quigleyo_date";

	$password = "Date@321!";

	$dbname = "quigleyo_date";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}


		$descriptors = $_REQUEST['data']['descriptors'];
		$user_ip = json_encode($_REQUEST['data']['user_ip']);
		$user_id = json_encode($_REQUEST['data']['user_id']);
		$user_long = json_encode($_REQUEST['data']['user_long']);
		$user_lat = json_encode($_REQUEST['data']['user_lat']);
		update_user_meta($user_id, 'longitude', $user_long);
		update_user_meta($user_id, 'latitude', $user_lat);

		setcookie('user_ip', $user_ip, mktime(0, 0, 0, 0, 0, 2027), '/', 'quigleyoat22.net', true, false);

		
		
		$sql = "INSERT INTO sign_in_ai (user_id, user_ip, descriptors)	VALUES ($user_id, '$user_ip', '$descriptors')";

		if ($conn->query($sql) != TRUE) {
			echo json_encode("Error: " . $sql . "<br>" . $conn->error);
		}

		$conn->close();

	echo json_encode($filez);
	wp_die();
}


add_action( 'wp_ajax_get_folder_context', 'get_folder_context' );

add_action( 'wp_ajax_nopriv_get_folder_context', 'get_folder_context' );



function predefined_celebrities(){
	$servername = "localhost";

	$username = "quigleyo_date";

	$password = "Date@321!";

	$dbname = "quigleyo_date";






	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection

	if ($conn->connect_error) {

	die("Connection failed: " . $conn->connect_error);

	}



	$gender = $_REQUEST['gender'];



	$sql = mysqli_query($conn,"SELECT $gender FROM predefined_celebrities");

	// $sql = "SELECT * FROM `questions_and_answers`";





	while($data = mysqli_fetch_array($sql))

	{

	echo json_encode($data); 

	}





	if ($sql) {

	

		while($data = mysqli_fetch_array($sql)){

		echo json_encode($data);

		}

	} else {

	echo json_encode("Error: " . $sql . "<br>" . $conn->error);

	}



	$conn->close();

	wp_die();

}

add_action( 'wp_ajax_predefined_celebrities', 'predefined_celebrities' );

add_action( 'wp_ajax_nopriv_predefined_celebrities', 'predefined_celebrities' );





function new_descriptors(){

	$pidor = $_POST['descriptors'];

	$servername = "localhost";

	$username = "quigleyo_date";

	$password = "Date@321!";

	$dbname = "quigleyo_date";






	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection

	if ($conn->connect_error) {

	die("Connection failed: " . $conn->connect_error);

	}



	$sql = "UPDATE predefined_celebrities SET female='$pidor'";



	if ($conn->query($sql) === TRUE) {

	echo json_encode("success");

	} else {

	echo json_encode("Error: " . $sql . "<br>" . $conn->error);

	}

	$conn->close();

	wp_die();

}





add_action( 'wp_ajax_new_descriptors', 'new_descriptors' );

add_action( 'wp_ajax_nopriv_new_descriptors', 'new_descriptors' );











function load_descriptores(){





	if ( isset($_FILES) && !empty($_FILES) ) {

		



		//Include the required files from backend

		require_once( ABSPATH . 'wp-admin/includes/image.php' );

		require_once( ABSPATH . 'wp-admin/includes/file.php' );

		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		 

		 

		$files = $_FILES['file'];

		

		$file = array(

			'name' => $files['name'],

			'type' => $files['type'],

			'tmp_name' => $files['tmp_name'],

			'error' => $files['error'],

			'size' => $files['size'],

		);

		$attaachment_id = media_handle_sideload( $file, 0 );

		update_post_meta($attaachment_id, 'image_descriptor', true);

		echo $attaachment_id;

	}

	wp_die();

}



add_action( 'wp_ajax_load_descriptores', 'load_descriptores' );

add_action( 'wp_ajax_nopriv_load_descriptores', 'load_descriptores' );









function celebrities_similarity(){

	$servername = "localhost";

	$username = "quigleyo_date";

	$password = "Date@321!";

	$dbname = "quigleyo_date";




	$user_scores = $_POST['user_scores'];

	$user_id = $_POST['user_id'];

	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection

	if ($conn->connect_error) {

	die("Connection failed: " . $conn->connect_error);

	}

	foreach ($user_scores as $key => $value) {



		$name = $value['name'];

		$score = $value['distance'];

		$sql = "INSERT INTO celebrities_similarity (celebrity_name, user_id, user_score) VALUES ('$name','$user_id','$score')";

		$conn->query($sql);

	}





	if ($conn->error) {

		echo json_encode("some error");

	} else {

		echo json_encode("success");

	}



	$conn->close();

	wp_die();

}



add_action( 'wp_ajax_celebrities_similarity', 'celebrities_similarity' );

add_action( 'wp_ajax_nopriv_celebrities_similarity', 'celebrities_similarity' );





/// UPLOAS IMAGW FROM PROFILE PAGW



function profile_upload(){



	// Need to require these files

    if ( !function_exists('media_handle_upload') ) {

        require_once(ABSPATH . "wp-admin" . '/includes/image.php');

        require_once(ABSPATH . "wp-admin" . '/includes/file.php');

        require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    }

	if ( isset($_FILES) && !empty($_FILES) ) {

		$public_images = [];

		$public_video = [];

		$private_images = [];

		$private_videos = [];

			$args = array(

				'post_type' => 'attachment',

				'post_mime_type' => array('image/jpeg', 'image/png', 'video/mp4', 'image/gif'),

				'post_status' => 'inherit',

				'posts_per_page' => 500,

				'author' => get_current_user_id(),

				'orderby' => 'title',

				);

			$query_images = new WP_Query($args);



			foreach ($query_images->posts as $image) {

				if( get_post_meta($image->ID, 'privacy_status')[0] == 'public_image'){

					// wp_delete_attachment( $image->ID );

					array_push($public_images, $image->ID);						

					update_user_meta( $_POST['user_id'], 'profile_image', wp_get_attachment_url($public_images[0]));

						

				}elseif( get_post_meta($image->ID, 'privacy_status')[0] == 'public_video'){

					// wp_delete_attachment( $image->ID );



					array_push($public_video, $image->ID);

				}elseif( get_post_meta($image->ID, 'privacy_status')[0] == 'private_image'){

					// wp_delete_attachment( $image->ID );

					array_push($private_images, $image->ID);

				}

				elseif( get_post_meta($image->ID, 'privacy_status')[0] == 'private_video'){

					array_push($private_videos, $image->ID);

						

				}

			}

			// return;

			// echo json_encode($public_images);

			// echo json_encode($public_video);

			// echo json_encode($private_images);

			// echo json_encode($private_videos);





		// return;

			

		

		if(count($public_images) > 4 && $_POST['privacy'] == 'public_image'){wp_die( 'klri glox your limit is 5');}

		if(count($public_video) > 0 && $_POST['privacy'] == 'public_video'){wp_die( 'klri glox 1');}

		if(count($private_images) > 24 && $_POST['privacy'] == 'private_image'){wp_die( 'klri glox 25');}

		if(count($private_videos) > 2 && $_POST['privacy'] == 'private_video'){wp_die( 'klri glox 3');}





		$img_id = media_handle_sideload( $_FILES['file'], array('author' => $_POST['user_id']) );

		if ( ! is_wp_error( $img_id ) ) {

			$img_url =  wp_get_attachment_url($img_id);

			$img_path = wp_get_original_image_path($img_id, false);



			// CHECKING USERS ON NUDITY/PORN

			// $params = array(

			// 	'media' => new CurlFile($img_path),

			// 	'workflow' => 'wfl_ar4KXAlsqq8oKs5WAj0rM',

			// 	'api_user' => '725670736',

			// 	'api_secret' => 'qFGPg9J73qxGd7J7t6hh',

			//   );

			  

			//   // this example uses cURL

			//   $ch = curl_init('https://api.sightengine.com/1.0/check-workflow.json');

			//   curl_setopt($ch, CURLOPT_POST, true);

			//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			//   curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

			//   $response = curl_exec($ch);

			//   curl_close($ch);

			  

			//   $output = json_decode($response, true);

			//   if($output['summary']['action']=='reject') {

			// 	// handle image rejection

			// 	// the rejection probability is provided in $output['summary']['reject_prob']

			// 	echo json_encode($output);

			//   }else{

			// 	  echo json_encode($img_id);

			//   }



			update_post_meta($img_id, 'privacy_status', $_POST['privacy']);

			// $attach = get_post( $img_id );

			// $the_post = array();

			// $the_post['ID'] = $img_id;

			// $the_post['privacy_status'] = $_POST['privacy'];

			// wp_update_attachment_metadata($img_id, $the_post);

			echo json_encode(get_post_meta(  $img_id));



			// wp_update_post( $the_post );

			

			wp_die($img_id);

		 } else {

			return  $img_id->get_error_message();

			wp_die();

		}

		wp_die();

	}

	wp_die();

}



add_action( 'wp_ajax_profile_upload', 'profile_upload' );

add_action( 'wp_ajax_nopriv_profile_upload', 'profile_upload' );









function profile_upload_dummy(){

	if ( isset($_FILES) && !empty($_FILES) ) {

		$img_id = media_handle_sideload( $_FILES['file'], array('author' => $_POST['user_id']) );

		if ( ! is_wp_error( $img_id ) ) {

			$img_url =  wp_get_attachment_image_src($img_id, 'thumbnail', false)[0];

			$img_path = wp_get_original_image_path($img_id, false);

			update_user_meta( $_POST['user_id'], 'profile_image', $img_url);





			update_post_meta($img_id, 'privacy_status', 'public_image');

			$attach = get_post( $img_id );



			$the_post = array();

			$the_post['ID'] = $img_id;

			$the_post['post_author'] = $_POST['user_id'];



			wp_update_post( $the_post );

			

			wp_die($img_url);

		 } else {

			return  $img_id->get_error_message();

			wp_die();

		}

	}

	wp_die();

}







add_action( 'wp_ajax_profile_upload_dummy', 'profile_upload_dummy' );

add_action( 'wp_ajax_nopriv_profile_upload_dummy', 'profile_upload_dummy' );



function delete_image(){

	if($_POST['image-id']){

		echo json_encode($_POST['image-id']);

		wp_delete_attachment( $_POST['image-id'],true );

	}else{

		echo json_encode('something gone wrong');

	}

	wp_die('done');

}



add_action( 'wp_ajax_delete_image', 'delete_image' );

add_action( 'wp_ajax_nopriv_delete_image', 'delete_image' );



	

function upload_dummy_pudz() {



	$url = $_POST['url'];

	$tmp = download_url( $url );

	

	$file_array = array(

		'name' => basename( $url ),

		'tmp_name' => $tmp

	);

	

	if ( is_wp_error( $tmp ) ) {

		@unlink( $file_array[ 'tmp_name' ] );

		return $tmp;

	}

	

	$img_id = media_handle_sideload( $file_array, array('author' => $_POST['user_id']) );



	if ( is_wp_error( $img_id ) ) {

		@unlink( $file_array['tmp_name'] );

		return $img_id;

	}



	update_post_meta($img_id, 'privacy_status', $_POST['privacy']);

	$attach = get_post( $img_id );



	$the_post = array();

	$the_post['ID'] = $img_id;

	$the_post['post_author'] = $_POST['user_id'];



	wp_update_post( $the_post ); 



	wp_die( $img_id );

}



add_action( 'wp_ajax_upload_dummy_pudz', 'upload_dummy_pudz' );

add_action( 'wp_ajax_nopriv_upload_dummy_pudz', 'upload_dummy_pudz' );







function generateEmailAddress($maxLenLocal=5, $maxLenDomain=3){

	$numeric        =  '0123456789';

	$alphabetic     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

	$extras         = '.-_';

	$all            = $numeric . $alphabetic . $extras;

	$alphaNumeric   = $alphabetic . $numeric;

	$alphaNumericP  = $alphabetic . $numeric . "-";

	$randomString   = '';

	for ($i = 0; $i < 4; $i++) {

		$randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];

	}

	$rndNum         = rand(20, $maxLenLocal-4);

	for ($i = 0; $i < $rndNum; $i++) {

		$randomString .= $all[rand(0, strlen($all) - 1)];

	}

	$randomString .= "@";

	for ($i = 0; $i < 3; $i++) {

		$randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];

	}

	$rndNum2        = rand(15, $maxLenDomain-7);

	for ($i = 0; $i < $rndNum2; $i++) {

		$randomString .= $all[rand(0, strlen($all) - 1)];

	}

	$randomString .= ".com";

	return $randomString;

}



function register_dummy_users(){

$first_male_names = ['Wesley','Tristan','Dennis','Kamren','Carlo','Emery','Clarence','Amare','Leonel','Kael','Morgan','John','Talon','Ace','Ahmad','Diego','Rashad','Gunnar','Juan','Angelo','Milton','Deangelo','Johnny','Taylor','Alfonso','Trenton','Jaylen','Xavier','Dereon','Tyrese','Jeremy','Dallas','Elliott','Rudy','Cornelius','Carmelo','Dangelo','Conrad','Prince','Kelvin','Martin','Ronin','Franco','Finley','Davian','Gael','Thomas','Darian','Mateo','Eugene',];

$first_names = ['Eileen','Cora','Miya','Jayla','Serenity','Jacquelyn','Amira','Hailie','Cecilia','Yasmin','Emely','Destinee','Aryana','Rihanna','Kamari','Layla','Joslyn','Mariyah','Monica','Abril','Reese','Joyce','Anaya','Natalia','Krystal','Deanna','Genevieve','Brooklynn','Harmony','Emmy','Leslie','Nyla','Carley','Rayne','Ruby','Zaria','Shania','Phoenix','Tia','Amani','Lucy','Lorelai','Delaney','Brenna','Zaniyah','Julianna','Crystal','Susan','Marisa','Gisselle','Mya','Kristin','Khloe','Liberty','Kianna','Alisa','Melany','Malia','Esperanza','Kiera','Jaqueline','Paola','Mara','Yazmin','Ashleigh','Zoe','Liliana','Celeste','Dayanara','Denise','Alena','Kailyn','Anika','Celia','Mariela','Selina','Bailee','Karly','Kenna','Talia','Daniella','Paityn','Akira','Kathryn','Kendra','Anabelle','Charlize','Eliana','Caitlin','Laney','Armani','Cara','Sanai','Brisa','Danica','Paisley','Nylah','Raven','Lisa','Ainsley','Christina','Rebekah','Victoria','Iris','Desiree','Kylie','Jakayla','Keyla','Jillian','Jazmine','Logan','Camryn','Elsa','Tessa','Cheyenne','Breanna','Kenya','Brylee','Eleanor','Brenda','Francesca','Tara','Fiona','Karsyn','Nina','Esther','Xiomara','Gloria','Isabela','Alexandra','Yadira','Siena','Valentina','Shayna','Hailey','Jocelynn','Scarlet','Joselyn','Kara','Amara','Jordan','Alexandria','Allisson','Eliza','Camila','Piper','Amina','Brynn','Melanie','Aspen','Kinsley','Kyleigh','Areli','Kaley','Ryann','Kailey','Baylee','Aubrie','Haylee','Nora','Milagros','Lexi','Makayla','Lara','Jaslene','Sadie','Leanna','Mollie','Irene','Izabella','Alondra','Jaiden','Kirsten','Johanna','Livia','Jaycee','Iyana','Abagail','Dana','Skylar','Isabella','Dayana','Yasmine','Cierra','Alyson','Leticia','Jaidyn','Noemi','Aurora','Giuliana','Alivia','Lesly','Nyasia','Hayley','Keira','Angelica','Aliana','Ali','Keely','Lindsey'];

$last_names = ['Sharp','Booker','Waters','Higgins','Keith','Mayer','Foley','Harris','Gaines','Wilkinson','Andersen','Wells','Daniel','Woods','Deleon','Fuller','Buchanan','Moses','Nelson','Pacheco','Spears','Morgan','Barnett','Osborne','Morse','Murphy','Coffey','Levy','Wise','Werner','Mathews','Mcclure','Short','Shepard','Watts','Ross','Arellano','Little','Ramos','Holland','Rush','Orozco','Carter','Wall','Clements','Vang','Davila','Norman','Rodgers','Khan','Romero','Bryan','Snyder','Hogan','Roach','Day','Stevenson','Rowland','Blake','Duffy','Hale','Simpson','Frazier','Garrett','Winters','Phillips','Haas','Lowery','Buck','Jacobson','Ortega','Church','Sloan','Lozano','Davis','Decker','Carroll','Hobbs','Schneider','Bautista','Medina','Kemp','Hanna','Warren','Merritt','Cooley','Villanueva','Gould','Ballard','Chambers','Melendez','Gutierrez','Kim','Barton','Payne','Burch','Guerra','Young','Peterson','Best','Cross','Walker','Graham','Webster','Santana','Frederick','Pratt','Butler','Gamble','Vasquez','Boyer','Bolton','Torres','Gillespie','Hodge','James','Mckenzie','Tapia','Cannon','Cantrell','Campos','Hopkins','Sanders','Maxwell','Berg','Rivera','Hutchinson','Quinn','Stout','Santiago','Craig','Trujillo','Pitts','Francis','Mack','Cobb','Moyer','Tran','Goodwin','Wu','Cortez','Leach','Ward','Huang','Mann','Pineda','Luna','Pope','Reed','Lara','Perry','Gray','Gomez','Schmidt','Nash','Fernandez','White','Browning','Haley','Hubbard','Phelps','Arias','Taylor','Mckinney','Hester','Zuniga','Zhang','Shea','Stone','Juarez','Benton','Maldonado','Walter','Alvarado','Lamb','Washington','Brady','Glenn','Mills','Munoz','Bird','Prince','Carrillo','Blackburn','Calderon','Golden','Crawford','Morales','Whitehead','Rangel','Sosa','Kline','Proctor','Burgess','Rocha','Fowler','Massey','Atkinson','Ayala','Sanford'];

$usermnames = ['obsequiousorder','tribeguillemot','funpuzzling','kosherchannel','thumbsdownliberated','smithingadventure','newspaperbreathe','undresspole','pacecheap','surveyscaly','peltdirt','vanishattend','honestvacuous','taigacobblestone','seepolitician','spritebore','molarjersey','balaclavakickball','dewsoupy','diligencesullen','weepyconfide','discreetinsecure','estonianunselfish','longingobject','snarlamiable','starehumongous','preservesneeze','bazaartinkle','ryecount','remindresource','austriancharcoal','housecannelloni','nativeguyanan','blackfishasparagus','waitingwildcat','lowlywary','disturbedicy','delightedoden','fuelpumpdriver','apronclank','innatesundress','drowsybelief','pasandamail','camberlarge','oryxalert','carrotstorso','wingunfolded','linnetfinish','ocelotyak','zestycalm','thinkarsonist','electionjersey','worldlysecretive','omeletteengage','droppergeorgian','balancechange','firsthang','foremasttopgallant','tranquilcornetto','housecoatchase','fieldbluet','raspberrypesky','drawwelloff','muleonerous','sunglassesattracted','ringjellied','comparatorsatisfying','momentten','hugepotential','classicdiorite','attentivefarmland','hummuscoffee','jovialbackground','spartorpid','directlovable','stridervulture','piercerjet','fortunategreedy','cooksurvive','nullcupcake','hellorichesse','labgleeful','fingerhornet','pillagermodel','irritatingegg','dingalingexcept','robustardent','executivegiraffe','faintperky','bogusphobic','ickyattached','flowerbazaar','pingpongconverting','volcanopart','cowardicelace','clancymutation','borderstar','agentyield','finkbus','verifiablehippie'];









 













$usernames = ['Moose','Ghoulie','Dreamey','Maestro','Fido','Babe','Sweetums','Gummi Bear','Hot Pepper','Betty Boop','Cinnamon','Mountain','Beautiful','Piglet','Hubby','Frauline','Pearl','Starbuck','Spicy','Butterfinger','Music Man','Mouse','Tarzan','Bubba','Babs','Nerd','Junior','Big Guy','Mistress','Tootsie','T-Dawg','Mad Max','Brutus','Genius','Hammer','Stitch','Harry Potter','Cookie','Con','Rosebud','Dingo','Angel','Flyby','Smoochie','Snake','Chicken Wing','Flower','Pansy','Creedence','Halfmast','Mini Mini','Raindrop','Cotton','DJ','Grease','Dinosaur','Silly Gilly','Giggles','Mini Skirt','Creep','Cindy Lou Who','Anvil','Stud','Snuggles','Kid','Baby Carrot','Amore','Brown Sugar','Eagle','Rapunzel','Shuttershy','Dottie','Sunshine','Beast','Guy','Cricket','Cookie Dough','Dear','Chump','Autumn','Dropout','Cheeky','Foxy','Bellbottoms','Gingersnap','Righty','Dumbledore','Ash','Pig','Beef','Rubber','Shorty','Chance','Oompa Loompa','Snickers','Twinkie','C-Dawg','Bandit','Tata','Coach','Bubbles','Dragonfly','Frau Frau','Rabbit','Tater Tot','Lovey','Cloud','Master','Doll','Baby Cakes','Hot Sauce','Cold Brew','Papito','Manatee','Sassafras','Itchy','Prego','Coke Zero','Gizmo','Biscuit','Tough Guy','Backbone','Braniac','Dino','Gordo','Swiss Miss','Apple','Boo','Ticklebutt','Thumper','Thunder Thighs','Einstein','Cheerio','Red Velvet','Rainbow','Wifey','Chain','Honey Pie','Toodles','Gumdrop','Lobster','Half Pint','Snow White','Buds','Belle','Salt','Ami','Bumpkin','Mini Me','Dimples','Scarlet','Squirt','Skunk','Sassy','Champ','Skipper','Shrinkwrap','Fattykins','Highbeam','Knucklebutt','Bubblegum','Darling','Cat','Senior','Green Giant','Dolly','Peppa Pig','Peep','Loser','Bello','Honey Locks','Mr. Clean','Lovely','Biffle','Homer','Schnookums','Short Shorts','Kit-Kat','Big Nasty','Cold Front','Fly','Chickie','Sugar','Red Hot','Lil Mama','Bub','Bootsie','Luna','Pyscho','Superman','Sweety','Slim','Baby Boo','Pop Tart','Tyke','Golden Graham','Miss Piggy','Bridge','Halfling','Pookie'];

$cities = array ("Ceres"=>"California","Bolingbrook"=>"Illinois","Boynton Beach"=>"Florida","Ann Arbor"=>"Michigan","Kokomo"=>"Indiana","Santa Monica"=>"California","Huntington Beach"=>"California","Gaithersburg"=>"Maryland","Findlay"=>"Ohio","Centennial"=>"Colorado","St. Clair Shores"=>"Michigan","Long Beach"=>"California","Winston-Salem"=>"North Carolina","West Haven"=>"Connecticut","Orange"=>"California","South San Francisco"=>"California","Pocatello"=>"Idaho","San Diego"=>"California","Rohnert Park"=>"California","Wichita"=>"Kansas","Sarasota"=>"Florida","San Angelo"=>"Texas","Murfreesboro"=>"Tennessee","Culver City"=>"California","Parker"=>"Colorado","Miami"=>"Florida","Yucaipa"=>"California","Biloxi"=>"Mississippi","Campbell"=>"California","Indio"=>"California","Decatur"=>"Alabama","Riverside"=>"California","Hollywood"=>"Florida","Richland"=>"Washington","Fayetteville"=>"North Carolina","Salem"=>"Massachusetts","Alexandria"=>"Louisiana","Palo Alto"=>"California","Oakley"=>"California","St. Peters"=>"Missouri","Kansas City"=>"Missouri","Cleveland Heights"=>"Ohio","Bullhead City"=>"Arizona","St. Louis"=>"Missouri","Baytown"=>"Texas","Omaha"=>"Nebraska","The Colony"=>"Texas","Rogers"=>"Arkansas","Odessa"=>"Texas","Westminster"=>"California","Lincoln Park"=>"Michigan","San Marcos"=>"Texas","Pharr"=>"Texas","Wyoming"=>"Michigan","Orland Park"=>"Illinois","Blacksburg"=>"Virginia","Chicopee"=>"Massachusetts","Downey"=>"California","Coconut Creek"=>"Florida","Boston"=>"Massachusetts","Spanish Fork"=>"Utah","Haverhill"=>"Massachusetts","Menifee"=>"California","Redondo Beach"=>"California","Spokane Valley"=>"Washington","Stanton"=>"California","Kalamazoo"=>"Michigan","Tigard"=>"Oregon","Mansfield"=>"Texas","Mission Viejo"=>"California","Pocatello"=>"Idaho","Royal Oak"=>"Michigan","Prescott Valley"=>"Arizona","Whittier"=>"California","Port Orange"=>"Florida","Monrovia"=>"California","Oakley"=>"California","Modesto"=>"California","Sugar Land"=>"Texas","Temple"=>"Texas","Lenexa"=>"Kansas","Jacksonville"=>"Florida","Winston-Salem"=>"North Carolina","Chelsea"=>"Massachusetts","South San Francisco"=>"California","National City"=>"California","Colton"=>"California","Lakewood"=>"California","Keller"=>"Texas","Calexico"=>"California","Enid"=>"Oklahoma","Waltham"=>"Massachusetts","Macon"=>"Georgia","Campbell"=>"California","Duluth"=>"Minnesota","Urbandale"=>"Iowa","Glendora"=>"California","Park Ridge"=>"Illinois","Lakewood"=>"Ohio","Cleveland Heights"=>"Ohio","Oklahoma City"=>"Oklahoma","Redondo Beach"=>"California","Conroe"=>"Texas","Norwalk"=>"Connecticut","Folsom"=>"California","Arcadia"=>"California","Scranton"=>"Pennsylvania","Longview"=>"Texas","Downers Grove"=>"Illinois","Cuyahoga Falls"=>"Ohio","Frederick"=>"Maryland","Noblesville"=>"Indiana","Keizer"=>"Oregon","Fort Smith"=>"Arkansas","Columbus"=>"Indiana","Gilroy"=>"California","Jackson"=>"Tennessee","Albany"=>"Oregon","Meridian"=>"Mississippi","Rochester"=>"New York","Chandler"=>"Arizona","Lancaster"=>"Pennsylvania","Independence"=>"Missouri","Green Bay"=>"Wisconsin","Prescott Valley"=>"Arizona","Frederick"=>"Maryland","Brea"=>"California","Manhattan"=>"Kansas","Hallandale Beach"=>"Florida","Des Plaines"=>"Illinois","San Gabriel"=>"California","Dubuque"=>"Iowa","Oxnard"=>"California","North Las Vegas"=>"Nevada","West New York"=>"New Jersey","St. Charles"=>"Missouri","Athens-Clarke County"=>"Georgia","The Colony"=>"Texas","Attleboro"=>"Massachusetts","Port Orange"=>"Florida","Des Moines"=>"Iowa","Pittsfield"=>"Massachusetts","Elgin"=>"Illinois","Fort Pierce"=>"Florida","Alhambra"=>"California","Dublin"=>"California","Redwood City"=>"California","Largo"=>"Florida","Fayetteville"=>"Arkansas","Salinas"=>"California","Norwalk"=>"Connecticut","Bowling Green"=>"Kentucky","Wylie"=>"Texas","Greenfield"=>"Wisconsin","Woburn"=>"Massachusetts","Rosemead"=>"California","Manchester"=>"New Hampshire","Bristol"=>"Connecticut","Corpus Christi"=>"Texas","Burnsville"=>"Minnesota","Tracy"=>"California","DeKalb"=>"Illinois","Mission"=>"Texas","Dothan"=>"Alabama","Rio Rancho"=>"New Mexico","Concord"=>"North Carolina","Tyler"=>"Texas","Berkeley"=>"California","Overland Park"=>"Kansas","Arlington"=>"Texas","Brea"=>"California","Pueblo"=>"Colorado","Lawton"=>"Oklahoma","Palm Desert"=>"California","Hanover Park"=>"Illinois","Auburn"=>"Washington","Charleston"=>"West Virginia","Summerville"=>"South Carolina","Shelton"=>"Connecticut","Minneapolis"=>"Minnesota","Sierra Vista"=>"Arizona","Noblesville"=>"Indiana","Warren"=>"Michigan","Davenport"=>"Iowa","Lynn"=>"Massachusetts","Prescott Valley"=>"Arizona","Wilmington"=>"North Carolina","Lexington-Fayette"=>"Kentucky","Walnut Creek"=>"California","Roswell"=>"Georgia","Cincinnati"=>"Ohio","Shelton"=>"Connecticut","Bellevue"=>"Washington","Jurupa Valley"=>"California","Denver"=>"Colorado","Walnut Creek"=>"California","Union City"=>"New Jersey","Westminster"=>"Colorado","Schenectady"=>"New York","Bellingham"=>"Washington");





	global $wpdb, $PasswordHash, $current_user, $user_ID;

	$first_male_name = esc_sql(trim($first_names[rand(0, 100)]));

	$last_name = esc_sql(trim($last_names[rand(0, 100)]));

	$rand_number = rand(0, 100);

	$keys   = array_keys( $cities );

	$values = array_values( $cities );

	$city = esc_sql(trim($keys[$rand_number]));

	$state = esc_sql(trim($values[$rand_number]));

	$email = esc_sql(trim(generateEmailAddress()));

	$username = esc_sql(trim($usermnames[rand(0, count($usermnames))]));

	$password = esc_sql(trim('Boxing1112_!'));

	$timestamp = mt_rand(1, time());

	echo $timestamp;



	$randomDate = date("Y-m-d", $timestamp);



	$birth_date = esc_sql(trim($randomDate));



	$user_id = wp_insert_user(array('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber'), [ 'show_in_rest' => true ]);

	update_user_meta( $user_id, 'gender', 'male');

	update_user_meta( $user_id, 'birth-date', $birth_date);

	update_user_meta( $user_id, 'city', $city);

	update_user_meta( $user_id, 'state', $state);



wp_die($user_id);

}



add_action( 'wp_ajax_register_dummy_users', 'register_dummy_users' );

add_action( 'wp_ajax_nopriv_register_dummy_users', 'register_dummy_users' );







// $args = array(

//     'post_type' => 'attachment',

//     'post_mime_type' => array('image/jpeg', 'image/png', 'video/mp4', 'image/gif'),

//     'post_status' => 'inherit',

//     'posts_per_page' => -1,

//     // 'author' => get_current_user_id(),

//     'orderby' => 'title',

//     );

    // $query_images = new WP_Query($args);



    // // deleting all images

    // foreach($query_images->posts as $img){

    //     $img_id =$img->guid;

    //     echo 'user is: ';

    //     var_dump($img);

    //     echo 'image id is: </br>';

    //     var_dump($img_id);

    //     update_user_meta( $img->ID, 'profile_image', $img_id);



    // }







	function birth_date(){

		$timestamp = mt_rand(1, time()-567993600);

		$randomDate = date("Y-m-d", $timestamp);

		$birth_date = esc_sql(trim($randomDate));

		$user_id = $_POST['user_id'];

		update_user_meta( $user_id, 'birth-date', $birth_date);



		echo json_encode($birth_date);

		wp_die();

	}



add_action( 'wp_ajax_birth_date', 'birth_date' );

add_action( 'wp_ajax_nopriv_birth_date', 'birth_date' );





/*search start */ 



function get_user(){

	$get_age = $_POST['age'];

	// print_r($get_age);

	// die();

	$lat = $_POST['Lat']; 

	$lang = $_POST['Lang'];

	$explode = explode('-',$get_age);

	$explode1 = $explode[0];

	$explode2= $explode[1];

	$explode3= explode('+',$get_age);

	$explode4= $explode3[0];

	$users = get_users();

	foreach($users as $user){

		global $wpdb;

		$users1 = $wpdb->get_results( "SELECT * FROM $wpdb->usermeta WHERE user_id = '$user->ID' AND (meta_key = 'birth-date' OR meta_key = 'latitude' OR meta_key = 'longitude')");

		foreach($users1 as $user1)

		{

			$dob= $user1->meta_value;

			$newDate = date("Y-m-d", strtotime($dob));

			$today = date("Y-m-d");

			$diff = date_diff(date_create($newDate), date_create($today));

			$age = $diff->format('%y');

			if(!empty($get_age))

			{

				if(($age >= $explode1 && $age <= $explode2) || ($age >= $explode1 && $age <= $explode2) || ($age >= $explode1 && $age <= $explode2) || ($age >= $explode1 && $age <= $explode2))

				{

				?>

					<div class="col-md-4">

						<?php

						$name = $user->user_nicename;

						$get_author_id = get_the_author_meta($user->ID);

						$get_author_gravatar = get_avatar_url($get_author_id, array('size' => 450));



						if(has_post_thumbnail()){

							the_post_thumbnail();

						} else {

							echo '<img src="'.$get_author_gravatar.'" alt="'.get_the_title().'" />';

						}

						?>

						<p><?php echo $name; ?> </p>

						<p><?php echo $age; ?> </p>

					</div>

				<?php

				}

			}

			

			// if($user1->meta_key=='latitude' || $user1->meta_key=='longitude')

			// {

			// 	print_r("test");

			// }

		}

	}

die();	

}

add_action( 'wp_ajax_search', 'get_user' );

add_action( 'wp_ajax_nopriv_search', 'get_user' );

/* search end */


// Asking for friend request

// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
            $url = $_SERVER['REQUEST_URI'];    
            $url = explode('/',$url);
            $attr = $url[3];
            if($attr=="men-articles"){
                $cate_name = "men";
            }
            if($attr=="women-articles"){
                $cate_name = "women";
            }
            if($attr=="women-men"){
                $cate_name = "women, men";
            }
           
		$the_query = new WP_Query( array('category_name' => $cate_name,'posts_per_page' => 9) );
		$total = $the_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'class'         => 'pagination',
				'prev_text'		=> "«",
				'next_text'		=> "»",
			 ) );
		}
	}
	
}

function askForFriend(){

	if(isset($_POST['user_id'])){

		$arr_to_send = [];

		$user_id = $_POST['user_id'];

		$user_profile_image = get_user_meta($user_id, 'profile_image')[0];

		array_push($arr_to_send, $user_profile_image);

		$user = get_userdata( $user_id );

		$user_name = $user->first_name;

		array_push($arr_to_send, $user_name);

		echo json_encode($arr_to_send);

		wp_die();

	}

}

add_action( 'wp_ajax_askForFriend', 'askForFriend' );

add_action("wp_ajax_my_user_vote", "my_user_vote");
function my_user_vote() {
    if(isset($_REQUEST["add_emo"])){
       $smily['data'] = $_REQUEST["smily"];
       if($smily['data'] == "128521;"){
           $smily_data = 'wink';
       }
       if($smily['data'] == "128522;"){
           $smily_data = 'smile';
       }
       if($smily['data'] == "128536;"){
           $smily_data = 'kiss';
       }
       if($smily['data'] == "heart"){
           $smily_data = 'heart';
       }
       $my_user_id = $_REQUEST["my_user_id"];
       $user_id = $_REQUEST["user_id"];
       $smily['type'] = "success";
       
       $emoji = get_user_meta($my_user_id, 'emoji_send_'.$user_id);
      
       $t=0;
       if(empty($emoji)){ 
           $data['u_id'] = $user_id;
           $data['smily'] = $smily_data;
           add_user_meta($my_user_id, 'emoji_send_'.$user_id, json_encode($data));
        }else{
          for($r=0;$r<sizeof($emoji);$r++){
               if(!empty($emoji[$r])){
                   $old_data = json_decode($emoji[$r]);
                   $data['u_id'] = $user_id;
                   $data['smily'] = $old_data->smily.','. $smily_data;
               
                   if($data['u_id']==$old_data->u_id){
                      update_user_meta($my_user_id, 'emoji_send_'.$user_id, json_encode($data));
                        $t=1;
                  }
               }
           }
           if($t==0){
               $data['u_id'] = $user_id;
               $data['smily'] = $smily_data;
               add_user_meta($my_user_id, 'emoji_send_'.$user_id, json_encode($data));  
           }
        }
       print_r(json_encode($smily));
       die();
    }
    
    
    if(isset($_REQUEST["unblock"])){
       $smily['data'] = $_REQUEST["msg"];
       $my_user_id = $_REQUEST["my_user_id"];
       $user_id = $_REQUEST["user_id"];
       $unblock = $_REQUEST["unblock"];
       $smily['type'] = "success";
       
       $emoji = get_user_meta($my_user_id, 'block_user'.$user_id);
      print_r($emoji);
       $t=0;
       if(empty($emoji)){ 
           $data['u_id'] = $user_id;
           $data['msg'] = $smily_data;
           add_user_meta($my_user_id, 'block_user'.$user_id, json_encode($data));
        }else{
          for($r=0;$r<sizeof($emoji);$r++){
               if(!empty($emoji[$r])){
                   $old_data = json_decode($emoji[$r]);
                   $data['u_id'] = $user_id;
                   $data['msg'] = $smily['data'];
                   $data['unblock'] = $unblock;
                   if($data['u_id']==$old_data->u_id){
                      update_user_meta($my_user_id, 'block_user'.$user_id, json_encode($data));
                        $t=1;
                  }
               }
           }
           if($t==0){
               $data['u_id'] = $user_id;
               $data['msg'] = $smily['data'];
               $data['unblock'] = $unblock;
               add_user_meta($my_user_id, 'block_user'.$user_id, json_encode($data));  
           }
        }
       print_r(json_encode($smily));
       die();
    }
    
    
    
   if(isset($_REQUEST["delete_emo"])){
   $smily['type'] = "success";
   $user_id = $_REQUEST["user_id"];
   $my_user_id = $_REQUEST["my_user_id"];
   $emoji = get_user_meta($my_user_id, 'emoji_send');
   if(!empty($emoji[0])){
       $old_data = json_decode($emoji[0]);
       if($user_id==$old_data->u_id){
            delete_user_meta($my_user_id, 'emoji_send');
       }
   }
   print_r(json_encode($smily));
       die();
   }
}

function dashboard_links_func(){ 
    
  
?>
<style>
    .step5.proff.container {
	position: relative;
	z-index: 99999;
}.dashboard_links {
	position: absolute;
	top: 20px;
}.dashboard_links {
	background: #fff;
	padding: 0px;
	border-radius: 5px;
	font-size: 19px;
	text-align: center;
	float: left;
	width: 160px;
}.dashboard_links ul {
	margin: 0px;
	padding: 0px !important;
	list-style: none;
	text-align: center;
}.dashboard_links ul li {
	margin: 0px;
	padding: 0px;
	padding-bottom: 0px;
	float: left;
	width: 100%;
}.dashboard_links ul li a {
	color: #333;
	font-size: 17px;
	border-bottom: 1px solid #f5f5f5;
	padding: 10px 0px;
	float: left;
	width: 100%;
}.dashboard_label {
	font-weight: bold;
	cursor:pointer;
	padding: 10px 0px;
}.dashboard_links ul {
	display: none;
	border-top: 1px solid #ccc;
}
</style>
    <div class="dashboard_links">
        <div class="dashboard_label">Dashboard <i class="fa fa-angle-down"><i></i></i></div>
            <ul>
                <li><a href="<?php echo get_site_url(); ?>/edit-my-personal-profile/">Edit my Profile</a></li>
                <li><a href="<?php echo get_site_url(); ?>/private-videos/">Private Videos</a></li>
                <li><a href="<?php echo get_site_url(); ?>/edit-public-profile/">Edit Public Profile</a></li>
                <li><a href="<?php echo get_site_url(); ?>/blocked-box/">Blocked Box</a></li>
                <li><a href="<?php echo get_site_url(); ?>/chat/">Chat</a></li>
                <li><a href="<?php echo get_site_url(); ?>/choose-your-plan/">Select Plan</a></li>
                <li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
            </ul>
    </div>
    <script>
        jQuery('.dashboard_links .dashboard_label').click(function(){
            jQuery('.dashboard_links').find('ul').toggle('show');
        });
    </script>
<?php }

add_shortcode('dashboard_links', 'dashboard_links_func');

function admin_default_page() {
    $user = get_current_user_id();
    if($user!=1){
        return get_site_url().'/edit-public-profile/';
    }else{
        wp_redirect(admin_url());
    }
}

add_filter('login_redirect', 'admin_default_page');


add_action( 'init', 'my_script_enqueuer' );
function my_script_enqueuer() {
    wp_enqueue_script( 'ajax-script', get_theme_file_uri() . '/js/script.js', array( 'jquery' ), true );
   wp_localize_script( 'ajax-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
  // wp_enqueue_script( 'my_voter_script' );

}

function myprefix_custom_cron_schedule( $schedules ) {
    $schedules['every_twelve_hours'] = array(
        'interval' => 43200, // Every 12 hours
        'display'  => __( 'Every 12 hours' ),
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'myprefix_custom_cron_schedule' );


if ( ! wp_next_scheduled( 'myprefix_cron_hook' ) ) {
    wp_schedule_event( time(), 'every_twelve_hours', 'myprefix_cron_hook' );
}

///Hook into that action that'll fire every six hours
 add_action( 'myprefix_cron_hook', 'myprefix_cron_function' );


// here's the function we'd like to call with our cron job
function myprefix_cron_function() {
    
      define( 'DB_NAME', 'harryent_qr' );

/** Database username */
define( 'DB_USER', 'harryent_qr' );

/** Database password */
define( 'DB_PASSWORD', 'Datin@321!' );

$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);  

    
    // Fetch transaction and subscription info from the database 
    $sqlQ = "SELECT * FROM `wp_users` WHERE subscription_id != 0"; 
    
    
   $result = $db->query($sqlQ);
   $subscrData = $result->fetch_all();
   foreach($subscrData as $userdata){
        $sqlQ = "SELECT * FROM `user_subscriptions` WHERE user_id = ".$userdata[0]; 
        $result1 = $db->query($sqlQ);
        $subscrData1 = $result1->fetch_all();
        foreach($subscrData1 as $pland){
            $timestamp = strtotime($pland[8]);
            $date = date('d-m-Y', $timestamp);
           
            if($pland[2]==1){
                $next_date = date('d-m-Y', strtotime($date .' +30 day'));
                $planame = "Monthly Plan";
            }
            if($pland[2]==2){
                $next_date = date('d-m-Y', strtotime($date .' +180 day'));
                $planame = "6-Month Plan";
            }
            if($pland[2]==3){
                $next_date = date('d-m-Y', strtotime($date .' +365 day'));
                $planame = "Yearly Plan";
            }
            //$now = date('d-m-Y'); // or your date as well
            $now = date('24-07-2022');
            $your_date = date('d-m-Y', strtotime($next_date));
            
           
            $date1=date_create($now);
            $date2=date_create($your_date);
            $diff=date_diff($date1,$date2);
             if($diff->days==15){
                 $msg = "Your ".$planame." will Renew Automatically on ".$next_date;
             }
             if($diff->days==2){
                 $msg = "Your ".$planame." will Renew Automatically on ".$next_date;
             }
             $recepients = $userdata[4];
            
             $subject = "Quigleyshores Membership Plan";
             $email_from = "mail@quigleyshores.com";
             $headers = "MIME-Version: 1.0" . "\r\n";
             $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
             $headers .= "From: info@quigleyshores.com\r\n".
            
            'Reply-To: '.$email_from."\r\n" .
            
            'X-Mailer: PHP/' . phpversion();
        
        
        
        
            mail($recepients, $subject, $msg, $headers);
        }
   }
   
}



/* NEW CODE ADDED */


function red_notification(){
	if(isset($_POST['id'])){
		$servername = "localhost";

		$username = "quigleyo_date";
	
		$password = "Date@321!";
	
		$dbname = "quigleyo_date";


		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "UPDATE notifications SET status=1 WHERE id=".$_POST['id']."";

		if ($conn->query($sql) === TRUE) {
		echo json_encode("success");
		} else {
		echo json_encode("Error: " . $sql . "<br>" . $conn->error);
		}

		$conn->close();
		mysqli_close($conn);
		}
	wp_die();
}
add_action( 'wp_ajax_red_notification', 'red_notification' );
// DELETE FROM table_name WHERE condition;


// Delete nogification

function delete_notification(){
	if(isset($_POST['id'])){
		$servername = "localhost";

		$username = "quigleyo_date";
	
		$password = "Date@321!";
	
		$dbname = "quigleyo_date";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "DELETE FROM notifications WHERE id=".$_POST['id']."";

		if ($conn->query($sql) === TRUE) {
		echo json_encode("success");
		} else {
		echo json_encode("Error: " . $sql . "<br>" . $conn->error);
		}

		$conn->close();
		mysqli_close($conn);
		}
	wp_die();

}
add_action( 'wp_ajax_delete_notification', 'delete_notification' );



function upload_audio_message(){
	if ( isset($_FILES) && !empty($_FILES) ) {

		//Include the required files from backend
		// require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		$files = $_FILES['file'];
		
		$file = array(
			'name' => $files['name'],
			'type' => 'audio/mp3',
			'tmp_name' => $files['tmp_name'],
			'error' => $files['error'],
			'size' => $files['size'],
		);
		$attaachment_id = media_handle_sideload( $files, 0 );
		echo wp_get_attachment_url( $attaachment_id );
	}
	wp_die();
}

add_action( 'wp_ajax_upload_audio_message', 'upload_audio_message' );






// ALLOW ALL USERS TO UNFILTERED UPLOADS !!!!!!!!!!!!!!!!! IMPORTANT SECURITY RISK !!!!!!!!!!!!!!!

function unfiltered_upload( $caps )
{
    $caps['unfiltered_upload'] = 1;
    return $caps;
}
add_filter( 'user_has_cap', 'unfiltered_upload' );



//////// GETTING USER DESCRIPTORS ///////////////

function get_user_descriptors(){
	$servername = "localhost";

	$username = "quigleyo_date";

	$password = "Date@321!";

	$dbname = "quigleyo_date";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	  }
	  $user_id = $_REQUEST['data']['user_id'];
	  $user_ip = $_REQUEST['data']['user_ip'];
	  if(!$user_id){
		$sql = "SELECT * FROM sign_in_ai WHERE user_ip LIKE '%$user_ip%' LIMIT 1";
	  }else{
		$sql = "SELECT * FROM sign_in_ai WHERE user_id=$user_id";
	  }
	  $result = $conn->query($sql);
	  
	  if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		  echo json_encode($row);
		}
	  } else {
		echo "0 results";
	  }

	$conn->close();
	wp_die();

}
add_action( 'wp_ajax_get_user_descriptors', 'get_user_descriptors' );
add_action('wp_ajax_nopriv_get_user_descriptors', 'get_user_descriptors');



function authorize_user(){
	$user_id = $_REQUEST['data'];
	wp_set_auth_cookie( $user_id );
	echo json_encode('success');
	wp_die();

}
add_action( 'wp_ajax_authorize_user', 'authorize_user' );
add_action('wp_ajax_nopriv_authorize_user', 'authorize_user');



@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '400' );

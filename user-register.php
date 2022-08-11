<?php /* Template Name: User Register */
//include "header.php";
session_start();
$password = $_POST['password'];
$user_id = wp_insert_user( array(
  'user_login' => $_POST['email'],
  'user_pass' => $password ,
  'user_email' => $_POST['email'],
  'first_name' => $_POST['f_name'],
  'last_name' => $_POST['l_name'],
  'display_name' => $_POST['f_name'].' '.$_POST['l_name'],
  'role' => 'subscriber'
));

if(isset($user_id->errors['existing_user_login'][0])){
	echo "error";
}else{
	echo $user_id;
    $_SESSION['user_id']=$user_id;
}
?>
<?php //include "footer.php"; ?>
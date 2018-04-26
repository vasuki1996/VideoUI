<?php  
//Start the Session
session_start();

require('submit.php');
//3. If the form is submitted or not.

//3.1 If the form is submitted

if (isset($_POST['username']) and isset($_POST['password'])){

//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];

//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `dexdrone_ui` WHERE username='$username' and password='$password'";


$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error $
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "You are being redirected";
echo "This is the Members Area";
header("Location: http:/\/grounstonehouse.ga:19999", true, 301);
exit();

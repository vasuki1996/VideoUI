<?php  
//Start the Session
session_start();
$servername = "localhost";
$username = "dbadmin";
$password = "Vasu@1996";
$dbname = "dexdrone_ui";

require('login.php');
//3. If the form is submitted or not.

//3.1 If the form is submitted

if (isset($_POST['username']) and isset($_POST['password'])){

//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
    
// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `USER` WHERE username='$username' and password='$password'";


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
header("Location: mainpage.php");
exit();
}
?>
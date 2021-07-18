<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{
// Define $username and $password
$username = $_POST['username'];
$password = $_POST['password'];

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = "eu-cdbr-west-01.cleardb.com";
$cleardb_username = "bef5a235e91f3c";
$cleardb_password = "b5905b17";
$cleardb_db = "heroku_079b024c13bf738";
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = new mysqli($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

// mysqli_connect() function opens a new connection to the MySQL server.
//$conn = mysqli_connect("localhost", "root", "", "website");
// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT username, password1 from signup where username=? AND password1=? LIMIT 1";
// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
$_SESSION['username_'] = $username;


$query1 = "SELECT address1, priv from signup where username='$username' LIMIT 1";
# Query the database
// Build the query
// Prepare it
$stmt1 = $conn->prepare($query1);
// Bind in the user input data so as to avoid SQL injection
$stmt->bind_param("ss", $ad, $pt);

// Execute the query
$stmt1->execute();
// Bind the results to some variables
$stmt1->bind_result($ad, $pt);
// Fetch the data
$stmt1->fetch();
// Close the query



if($stmt->fetch()) {
$_SESSION['login_user'] = $username; // Initializing Session
$_SESSION['ad_'] = $ad;
$_SESSION['PT'] = $pt;

header("location: index.php"); // Redirecting To Profile Page
}
else{
    header("location: login.php");

}
}
mysqli_close($conn); // Closing Connection
}




?>


// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
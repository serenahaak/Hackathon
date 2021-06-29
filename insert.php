<?php
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['newemail']) && isset($_POST['newpassword']) && isset($_POST['ad']) &&
       isset($_POST['newusername'])) {
        
        $username = $_POST['newusername'];
        $password = $_POST['newpassword'];
        $email = $_POST['newemail'];
        $address = $_POST['ad'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "website";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);


        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT Email FROM signup WHERE Email = ? LIMIT 1";
            $Insert = "INSERT INTO signup(Username, Password1, Email, Address1) values(?, ?, ?, ?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss",$username, $password, $email, $address);
                if ($stmt->execute()) {
                    print "Account Created Successfully";
                    header('Refresh: 3; URL=login.php');
                        }
                
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email, Select another.";
                header('Refresh: 3; URL=login.php');
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        header('Refresh: 3; URL=login.php');

        die();
    }
}
else {
    echo "Submit button is not set";
}

?>


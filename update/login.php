<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="login.css">
    <script type="text/javascript" src="https://unpkg.com/bsv@1.5.3/bsv.min.js"></script>
<script 
    type="text/javascript" src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js">
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    
<form action="logincheck.php" method="post">

  
    <div class="container">
        <img class = "bitcoin-icon" src="bitcoin-btn.svg" alt="">
                    
        <h1 class="logo">Logo</h1>
        <form>
      <label class = "username" for="username"><b>Username</b></label>
      <input class="usernametext" name="username" type="text" placeholder="Enter Username" name="username" id="username" required>
  
      <label class="pass" for="psw"><b>Password</b></label>
      <input class="passtext" name="password" type="password" placeholder="Enter Password" name="psw" required>
  
      <button class="submitbutton" name="submit" type="submit" onclick="login()">Login</button>
    </form>
      <label class="check">
        <input  type="checkbox" checked="checked" name="remember"> Remember me
      </label>
      <a href="login.php">
      <button type="button" class="cancelbtn" >Cancel</button>
        </a>

  </form>
  
    <button  class="createbtn" onclick="document.getElementById('mod').style.display='block'">Create An Account</button>

    <div id="mod" class="modal">
      <span onclick="document.getElementById('mod').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form class="modal-content" action="insert.php" method="POST">

        <div class="container">
          <h1 class="signuptext">Create an Account</h1>
          
          
          <label class="emaillabel"><b>Email</b></label>
          <input  type="text"  placeholder="Enter Email" name="newemail" class="emailplace" required>
    
          <label class="passlab"><b>Password</b></label>
          <input  type="password"  placeholder="Enter Password" name="newpassword" class="passt" required>
          <label class="name"><b>Username</b></label>
          <input   type="text" placeholder="Username" name="newusername" class="nametext" required>
          <input name="ad" id="addressText" value=""  type="hidden" required>
          <input name="pk" id="privText" value=""  type="hidden" required>


              
          <div class="clearfix">
            <button type="button" onclick="document.getElementById('mod').style.display='none'" class="cancelbtn1">Cancel</button>
            <td><input type="submit" value="Create Account" name="submit" class="signupbtn"></td>        
            

          <img class = "bitcoin-icon1" src="bitcoin-btn.svg" alt="">
          
          

          <h1 class="logo1">Logo</h1>
        </div>
      </form>

    </div>

   
    <script>
    // Get the modal
    var modal = document.getElementById('mod');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

<script> 

    
var privateKey = bsv.PrivateKey.fromRandom();
document.getElementById("privText").value = privateKey

var address = bsv.Address.fromPrivateKey(privateKey).toString();
document.getElementById("addressText").value = address





</script>    
    </body>
    </html>
    

</body>




</html>
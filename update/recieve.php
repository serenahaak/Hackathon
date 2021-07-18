<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receive Payment</title>
    <link rel="stylesheet" href="recieve.css">
    <script type="text/javascript" src="https://unpkg.com/bsv@1.5.3/bsv.min.js"></script>
    <script 
    type="text/javascript" 
    src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
    <div class="nav-container">
        <div class="wrapper">
            <nav>
                
                <ul class="nav-items">
                    <li>
                        <a href="index.php"> <img src="home.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="transactions.html"><img src="transactions.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="notif.php"><img src="notif.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="settings.html"><img src="settings.svg" alt=""></a>
                    </li>
                    <li>
                        <a href="login.php"><img src="logout.svg" alt=""></a>
                    </li>
                    
                </ul>
            </nav>
        </div>
    </div>
     <div class= "titlepage">
     <img class = "bitcoin-icon" src="bitcoin-btn.svg" alt="">
     <button onclick="myFunction()" class="copy">Copy Address</button>

     <h1 class="logo">Logo</h1>
     <div id="block2" class = "block-2">
                   <p id="addressText" class="ad"> </p>
                   </div>
                   
                   <div id="block3" class = "block-3">
                        <p id="qrcode" class="qr"></p>
                   </div>
<h3 class="t"> Scan the QR code or enter the wallet address </h3>
     <button class="goback" onclick="goBack()">Back</button>
     <script>
     function goBack() {
       window.history.back();
     }
     </script>







<script>
var address = '<?php echo $_SESSION['ad_'] ?>'.toString()
// var p = document.querySelector("#privText");
 //p.innerHTML = privateKey.toString();
 
 var y = document.querySelector("#addressText");
 y.innerHTML = address;

 var addressCode = 'bitcoinsv:' + address;

 new QRCode(document.getElementById("qrcode"), addressCode);
 sessionStorage.setItem("QRstore", "qrcode");

 var config = {
    method: 'get',
    url: "https://api.whatsonchain.com/v1/bsv/main/address/" +
    address + "/balance",
  };


function myFunction() {
  
  var input = document.body.appendChild(document.createElement("input"));
  input.value = address;
  input.focus();
  input.select();
  document.execCommand('copy');
  input.parentNode.removeChild(input);
  alert("Copied the text: " + input.value);

}

</script>
    
</body>
</html>
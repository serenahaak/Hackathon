<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Home</title>
    <link rel="stylesheet" href="style.css">
    
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
    <div class="header-container">
        <div class="wrapper">
            <header>
                
                <div class= "titlepage">
                    
                        <img class = "bitcoin-icon" src="bitcoin-btn.svg" alt="">
                    
                    <h1 class="logo">Logo</h1>
                    <h2 class="user">
                    <?php
                    echo $_SESSION["login_user"];

                    ;
                    
                  
                    ?>'s Wallet</h2>
                    <h3 class = "cb">Current Balance</h3> 
                    

                    <img class = "conversion-icon" src="conversion.svg" alt=""> 
                    <h6 class="liveconversion"> live conversion</h6>
                    <button class="paybutton" type="button" onclick="window.location.href='tim.php'">Make a Payment</button>

                    <button class = "recievebutton" type="button" onclick="window.location.href='recieve.php'">Recieve a Payment</button>
                    <h3 class="GDP"> GBP</h3>
                    <h3 class="BSV"> BSV</h3>
                    <h1 class = "bit"> <span id="balance"></span> </h1>
                    <h1 class= "pounds"> <span id = "prc"></span> </h1>
                    
                   
                    <div id="block2" class = "block-2">
                   <p id="addressText"> </p>
                   </div>
                   
                   <div id="block3" class = "block-3">
                        <p id="qrcode"></p>
                   </div>
                   <div id="block4" class = "block-4">
                    <p id="balance"></p>
               </div>
                    
                



                </div>
                
            </header>
        </div>
    </div>
    <script> 

    
    var name = "<?php
                    echo $_SESSION["login_user"];

                    ;
                    
                  
                    ?>"

    if ( name == ""){
                    window.location.href = "login.php";}

    
        //var privateKey = bsv.PrivateKey.fromRandom();
        //var address = bsv.Address.fromPrivateKey(privateKey).toString();

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
  axios(config)
  .then((response) => {
   let data = JSON.stringify(response.data.confirmed);
   let p = document.getElementById("balance");
   p.innerHTML = data/100000000;
   data2 = data/100000000

    
    


const my_api_key = 'bd558eb5933ae0d1ed646689a0ad9cd32f8437b19fdb04d417ea6e67480ce591'  

var config1 = {
    method: 'get',
    url: "https://min-api.cryptocompare.com/data/price?fsym=BSV&tsyms=GBP&" +
    my_api_key,
  };
  axios(config1)
  .then((response) => {
   let data1 = JSON.stringify(response.data.GBP);
   val= id="balance"
   let j = document.getElementById("prc");
   j.innerHTML = parseFloat((data1*data2).toFixed(5)) 

})
})
</script>


 


</body>
</html>
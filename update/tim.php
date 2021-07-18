<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make a Payment</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="tim.css">
    
    <script type="text/javascript" src="https://unpkg.com/bsv@1.5.3/bsv.min.js">
    </script>
    <script src='https://unpkg.com/filepay@2.2.12/dist/filepay.min.js'></script>

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
                        <a href="#"><img src="transactions.svg" alt=""></a>
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
 
        
                    
                        <img class = "bitcoin-icon" src="bitcoin-btn.svg" alt="">
                    
                    <h1 class="logo">Logo</h1>



     <div id="block">
      <h1 id="title" class="Title">Send A Transaction</h1>
      <p id="privText"></p>
     </div>
 
              <div class="input-container">
                <input
                class="priv"
                  type="hidden"
                  id="from"
                  value="<?php echo $_SESSION['PT'] ?>"
                 
                  />
              </div>
          </div>
          <br>
     
          <h4 class = "adt">Address of Recipient:</h4>
          <form id="sendTo" style="width: 50%" action="">
              <div class="input-container">
                <input
                class="adt1"
                  type="text"
                  id="sendToText"
                  placeholder=" Wallet Address"
                  style=""
                  value=""
                  />
              </div>
            </form>
          </div>
          
          <br>

    <h4 class = "amount1">Amount: (BSV, Satoshi's) </h4>
            <form id="amount " action="" style="width: 100%">
              <div class="input-container">
                <input
                class = "amount2"
                  onsubmit="return false"
                  oninput=""
                  type="text"
                  id="amountText"
                  placeholder="Enter an amount e.g. 1000"
                  style="word-wrap: break-word"
                  value=""
                  />
              </div>
            </form>
          </div>
         
          <button class="goback1" onclick="goBack()">Back</button>
          <script>
          function goBack() {
            window.history.back();
          }
          </script>
          </div>
      
          <br>
        <button
        class="sendb"
            
            id="sendTransaction"
            onclick="sentFunction()"
          >
          Confirm Transaction
        </button>
          

        <script>
   

            var from_input, sent_input, amount_input 
            function sentFunction() {

             from_input = document.getElementById("from").value;
                sent_input = document.getElementById("sendToText").value;
                amount_input = document.getElementById("amountText").value;
                amount_input = parseInt(amount_input);
                
               // var hdPrivateKey = bsv.HDPrivateKey.fromString(from_input);
                //var privateKeyStandard = hdPrivateKey.deriveChild("m/44'/0'/0'/0/0");
                var privateKey = from_input
                var config = {
                    safe: true,
                    data: ["0x6d02", "Transaction Send"],
                    pay: {
                        key: privateKey,
                        rpc: "https://api.mattercloud.net",
                        feeb: 0.5,
                        to: [{
                            address: sent_input,
                            value: amount_input
                        }]
                    }
                }
           filepay.send(config, function(err, res, fee, rawtx) {
               let p = document.querySelector("#privText");
               p.innerHTML = res
             
             

              


            })
            sent_input1 = document.getElementById("sendToText");

            if (amount_input < 1000){

window.location.href = "deny.html";

}
else{
window.location.href = "confirm.html";

}
if (sent_input1 == ""){
  window.location.href = "deny.html";

}

           
            }

            
            //Private_Key_funtion
            function Frominput() {
                var from_input = document.getElementById("from").value;
                window.alert(from_input);
            }
           
        </script>
    


        </body>
       
        
       
</html>


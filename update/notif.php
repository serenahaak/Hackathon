<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="notif.css">
    
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
    <div class="rect1"> 
                    <div class="rect2"> 
                    <div class="rect3"> 
                    <div class="rect4"> 
                        <div class="rect5">
</div>
</div>
</div>
</div>
</div>
<img class = "notiflogo" src="notif.svg" alt="">

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
                    </div>
                    <h2 class="not"> No New Notifications </h2>
                  






</div>

<button class="goback1" onclick="goBack()">Back</button>

<script>
    function goBack() {
      window.history.back();
    }

        
    var name = "<?php
                    echo $_SESSION["login_user"];

                    ;
                    
                  
                    ?>"

    if ( name == ""){
                    window.location.href = "login.php";}

    
    </script>
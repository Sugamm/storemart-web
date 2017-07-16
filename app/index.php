<?php
include 'dbconfig.php';
//redirector code start 
if (isset($_GET['url']) && isset($_GET['un_id'])) {
  $url =  $_GET['url'];
  $comp_id = $_GET['un_id'];
  $user_ip = get_client_ip();
  
  $ret = insertToLinkOnClick_table($user_ip,$comp_id,$con);
  if ($ret == "Success") {
    redirect($url);
  }else{
    echo "Sorry";
  }
}


function insertToLinkOnClick_table($ip,$id,$con){
  $query = "INSERT INTO linkOnClick_table(user_ip,comp_id) VALUES('".$ip."','".$id."')";
  $result = mysqli_query($con,$query) or die("Query");
  if ($result) {
    $ret = "Success";
  }else{
    $ret = "Fail";
  }
  return $ret;
}

function redirect($url){
  header("LOCATION:$url");
}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

//end redirector code

?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <style type="text/css">
        img{
          height: 150px;
        }
        a{
          color: #e2704c;
        }
      </style>
      <script>
         function showHint(str) {
              if (str.length == 0) { 
                  document.getElementById("result").innerHTML = "";
                  return;
              } else {
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          document.getElementById("result").innerHTML = this.responseText;
                      }
                  }
                  xmlhttp.open("GET", "search.php?city="+str, true);
                  xmlhttp.send();
              }
          }
        </script>

    </head>

    <body>
      <div class="container">
        <div class="row">
          <form action="javascript:myFunction(); return false;">
          <div class="col s12">
            <div class="row">
              <div class="input-field col s12 m12">
                <h1 style="text-align: center;font-size: 16px;font-weight: 500">Search City To Get Local Store.</h1>
                <input type="text" name="city" autocomplete="off" onkeyup="showHint(this.value)" placeholder="Enter your City">
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
      
        <div id="result"></div>
        <h1 style="text-align: center;font-size: 16px;font-weight: 500">Market's Big Players.</h1>
        <div class="container">
            <div class="row">
              <a href="http://www.amazon.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/amazonLogo.jpg">
                    </div>
                    <div class="card-action">
                      Amazon.in
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://dl.flipkart.com/dl/">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/flipkartLogo.png">
                    </div>
                    <div class="card-action">
                      Flipkart.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.snapdeal.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/snapdealLogo.png">
                    </div>
                    <div class="card-action">
                      Snapdeal.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.ebay.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/ebayLogo.jpg">
                    </div>
                    <div class="card-action">
                      ebay.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.shopclues.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/shopcluesLogo.jpg">
                    </div>
                    <div class="card-action">
                      Shopclues.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.shopclues.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/homeshopLogo.jpg">
                    </div>
                    <div class="card-action">
                      HomeShop18.com
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <ul class="collapsible">
        <li class="active">
          <div class="collapsible-header"><span class="new badge">6</span><i class="material-icons">filter_drama</i>Genral Stores</div>
          <div class="collapsible-body">
          <div class="container">
            <div class="row">
              <a href="http://www.amazon.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/amazonLogo.jpg">
                    </div>
                    <div class="card-action">
                      Amazon.in
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://dl.flipkart.com/dl/">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/flipkartLogo.png">
                    </div>
                    <div class="card-action">
                      Flipkart.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.snapdeal.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/snapdealLogo.png">
                    </div>
                    <div class="card-action">
                      Snapdeal.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.ebay.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/ebayLogo.jpg">
                    </div>
                    <div class="card-action">
                      ebay.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.shopclues.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/shopcluesLogo.jpg">
                    </div>
                    <div class="card-action">
                      Shopclues.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.HomeShop18.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/homeshopLogo.jpg">
                    </div>
                    <div class="card-action">
                      HomeShop18
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        </li>
        <li>
          <div class="collapsible-header"><span class="badge">4</span><i class="material-icons">shopping_basket</i> Fashion</div>
          <div class="collapsible-body">
             <div class="container">
            <div class="row">
              <a href="https://www.jabong.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/jabongLogo.jpg">
                    </div>
                    <div class="card-action">
                      Jabong.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.yepme.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/yepmeLogo.png">
                    </div>
                    <div class="card-action">
                      YepMe.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.myntra.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/myntraLogo.jpg">
                    </div>
                    <div class="card-action">
                      Myntra.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.limeroad.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/limeroadLogo.png">
                    </div>
                    <div class="card-action">
                      Limeroad.com
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          </div>
        </li>
         <li>
          <div class="collapsible-header"><span class="badge">4</span><i class="material-icons">battery_charging_full</i> Mobile Recharge</div>
          <div class="collapsible-body">
             <div class="container">
            <div class="row">
              <a href="https://www.paytm.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/paytmLogo.png">
                    </div>
                    <div class="card-action">
                      PayTM.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.freecharge.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/freechargeLogo.jpg">
                    </div>
                    <div class="card-action">
                      Freecharge
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.airtel.com/">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/airtelLogo.jpg">
                    </div>
                    <div class="card-action">
                      airtel.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="http://www.rechargeitnow.com/">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/rechargeitnowLogo.png">
                    </div>
                    <div class="card-action">
                      rechargeitnow
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          </div>
        </li>
         <li>
          <div class="collapsible-header"><span class="badge">2</span><i class="material-icons">shopping_cart</i>Grocery & Food</div>
          <div class="collapsible-body">
             <div class="container">
            <div class="row">
              <a href="https://www.bigbasket.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/bigbasketLogo.png">
                    </div>
                    <div class="card-action">
                      bigbasket.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://grofers.com/">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/grofersLogo.png">
                    </div>
                    <div class="card-action">
                      Grofers.com
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          </div>
        </li>
         <li>
          <div class="collapsible-header"><span class="badge">4</span><i class="material-icons">flight_takeoff</i> Travels & Hotel</div>
          <div class="collapsible-body">
             <div class="container">
            <div class="row">
              <a href="https://www.oyo.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/oyoLogo.png">
                    </div>
                    <div class="card-action">
                      Oyo.com
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.makemytrip.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/makemytripLogo.jpg">
                    </div>
                    <div class="card-action">
                      Makemytrip
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.yatra.com">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/yatraLogo.jpg">
                    </div>
                    <div class="card-action">
                      Yatra
                    </div>
                  </div>
                </div>
              </a>
              <a href="https://www.redbus.in">
                <div class="col s6 m6">
                  <div class="card">
                    <div class="card-image">
                      <img src="images/redbusLogo.png">
                    </div>
                    <div class="card-action">
                      Red Bus
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          </div>
        </li>
      </ul>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
          $(document).ready(function () {
            $('input.autocomplete').autocomplete({
              data: {
                "Indore": null,
                "Bhopal": null,
                "Chennai": 'http://placehold.it/250x250'
              }
            });
          });
      </script>
       <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-83716760-1', 'auto');
      ga('send', 'pageview');

    </script>
    </body>
  </html>
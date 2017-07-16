<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
include 'dbconfig.php';

//start search code
if (isset($_GET['city'])) {
  getResult($_GET['city'], $con);
}
function getResult($value, $con)
{
	if ($value) {
			$city_id = getCityId($_GET['city'], $con);
			$query = "SELECT * from registercompany where city_id ='".$city_id."'";
			$result = mysqli_query($con, $query) or die("Query Error");

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    echo '<div class="container">
            <div class="row">';
             echo '<h1 style="text-align: center;font-size: 16px;font-weight: 500">Stores in "'.$_GET['city'].'".</h1>';
			    while($row = mysqli_fetch_assoc($result)) {
			    	$cat = getCategory($row['comp_category_id'],$con);
			        echo '
					    <a href="http://www.informci.com/flamart/search.php?url='.$row['comp_link'].'&un_id='.$row['comp_id'].'">
		                <div class="col s6 m6">
		                  <div class="card">
		                    <div class="card-image">
		                      <img src="'.$row['comp_image'].'">
		                    </div>
		                    <div class="card-action">
		                      '.$row['comp_name'].'
		                      <p style="font-size:10px;margin:0px;"> '.$cat.' </p>
		                    </div>
		                  </div>
		                </div>
		              </a>';
			    }
			  echo "</div></div>";
			} else {
			    echo '<p style="text-align:center;">No result of "'.$_GET['city'].'"</p>';
			}
		}	
}

function getCityId($value,$con){
	$queryforCity = "SELECT * FROM cities_table where city_name LIKE '%".$value."%'";
	$resultCity = mysqli_query($con,$queryforCity) or die("City Error");
	if (mysqli_num_rows($resultCity) > 0) {
		$rowCity = mysqli_fetch_assoc($resultCity);
		$ret = $rowCity['city_id'];
	}else {
	    $ret = "No Such City in Our Database";
	}
	return $ret;
}

function getCategory($value,$con){
	$query = "SELECT * from category_table where category_id ='".$value."'";
	$result = mysqli_query($con, $query) or die("Query Error");
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$ret = $row['category_name'];
	}else {
	    $ret = "Unknown";
	}
	return $ret;
}
//end search code
//redirector code start 
if (isset($_GET['url'])) {
  $url =  $_GET['url'];
  $user_ip = get_client_ip();
  if (isset($_GET['un_id'])) {
  	$comp_id = $_GET['un_id'];
  	$ret = insertToLinkOnClick_table($user_ip,$comp_id,$url,$con);
	  if ($ret == "Success") {
	    redirect($url);
	  }else{
	    echo "Sorry";
	  }
  }else{
  	$id = 0;
  	$ret = insertToLinkOnClick_table($user_ip,$id,$url,$con);
	  if ($ret == "Success") {
	    redirect($url);
	  }else{
	    echo "Sorry";
	  }
  }
}


function insertToLinkOnClick_table($ip,$id,$url,$con){
  $query = "INSERT INTO linkOnClick_table(user_ip,comp_id,comp_url) VALUES('".$ip."','".$id."','".$url."')";
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

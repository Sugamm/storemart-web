<?php
    
    /*
    ** test for username/password
    */
    if( ( isset($_SERVER['PHP_AUTH_USER'] ) && ( $_SERVER['PHP_AUTH_USER'] == "Sugam" ) ) AND
      ( isset($_SERVER['PHP_AUTH_PW'] ) && ( $_SERVER['PHP_AUTH_PW'] == "Password@321" )) )
    {}
    else
    {
        //Send headers to cause a browser to request
        //username and password from user
        header("WWW-Authenticate: " .
            "Basic realm=\"Sugam's Protected Area\"");
        header("HTTP/1.0 401 Unauthorized");

        //Show failure text, which browsers usually
        //show only after several failed attempts
        print("This page is protected by HTTP " .
            "Authentication.<br>\nUse <b>Sugam</b> " .
            "for the username, and <b>secret</b> " .
            "for the password.<br>\n");
    }

include 'dbconfig.php';
if (isset($_POST['submit'])) {
	$comp_name = $_POST['comp_name'];
	$comp_link = $_POST['comp_link'];
	$comp_image = $_POST['comp_image'];
	$comp_category = $_POST['comp_category'];
	$comp_city = $_POST['comp_city'];
	$comp_user = $_POST['comp_user'];

	$query = "INSERT INTO registercompany(comp_name,	comp_link,comp_image,comp_category_id,city_id) VALUES ('".$comp_name."','".$comp_link."','".$comp_image."','".$comp_category."','".$comp_city."')";
	$result = mysqli_query($con, $query) or die("Page die because ". mysqli_error($con));

	if ($result) {
		$msg = '<div class="alert alert-success" role="alert"><b>Sexy</b> inserted succesfully</div>';
	}else{
		$msg = '<div class="alert alert-success" role="alert"><b>Sorry</b> Some problem!</div>';
	}

}

function showCat($con){
	$query = "SELECT * FROM category_table";
	$result = mysqli_query($con, $query) or die("ERR_SHOWCAT".mysqli_error($con));
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
    }
	} else {
	    echo "0 results";
	}
}
function showCity($con){
	$query = "SELECT * FROM cities_table";
	$result = mysqli_query($con, $query) or die("ERR_SHOWCITY" . mysqli_error($con));
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
    }
	} else {
	    echo "0 results";
	}
}

// function showUser($con){
// 	$query = "SELECT * FROM tbl_user";
// 	$result = mysqli_query($con, $query) or die("ERR_SHOWUSER" . mysqli_error($con));
// 	if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
//     }
// 	} else {
// 	    echo "0 results";
// 	}
// }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Storemart Dashboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
		<style type="text/css">
			body{
				background-color: #000;
			}
			#header h1{
				color: #fff;
				font-family: 'Poiret One', cursive;
			}
			.alert{
				color: #3c763d;
			}
			label{
				color: #fff;
			}
			
		</style>
	</head>
<body>
<div class="container">
<div class="row">
<div id="header">
<form method="post" class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12"> 
	<h1>Register Company</h1>
	<?php 
	echo $msg;
	?>
	<div class="form-group">
	    <label for="exampleInputPassword1">Enter Company name</label>
	    <input style="color:#fff;" type="text" class="form-control" name="comp_name" required placeholder="Enter Company name">
	</div>
	<div class="form-group">
	    <label for="exampleInputPassword1">Enter Company Web link</label>
	    <input style="color:#fff;" type="text" class="form-control" name="comp_link" required placeholder="Enter Company web store Link">
	</div>
	<div class="form-group">
	   <label for="exampleInputPassword1">Enter Company Image link</label>
	   <input style="color:#fff;" type="text" class="form-control" name="comp_image" required placeholder="Enter Company Image link">
	</div>
	<label for="exampleInputPassword1">Select Company's category</label>
	<select name="comp_category" class="form-control">
		<option>Select a category</option>
		<?php showCat($con); ?>
	</select>
	<a href="addcat.php" style="color: #fff;">Add category</a><br><br>
	<label for="exampleInputPassword1">Select Company city</label>
	<select name="comp_city" class="form-control">
		<option>Select a city</option>
		<?php showCity($con); ?>
	</select>
	<a href="addcity.php" style="color: #fff;">Add City</a><br><br>
	

	<input type="submit" class="btn " name="submit" value="Submit" style="width: 100%;">
</form>
</div>
</div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>
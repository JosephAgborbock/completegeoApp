<?php 
	require_once("../src/FoursquareApi.php");
	
	// This file is intended to be used as your redirect_uri for the client on Foursquare
	
	// Set your client key and secret
	$client_key = "DY3S3P302ZG3A3SKARKVH03TNZZANEHIAB5IV1TXVUG22PJV";
	$client_secret = "XS4Z15OOW43TTPW212Y0IYFY5AMWSC3KAQ4G14D5OD03PIBC";
	$redirect_uri = "http://localhost/project/geoApp/foursquare/examples/tokenrequest.php";
	
	// Load the Foursquare API library
	$foursquare = new FoursquareApi($client_key,$client_secret);
	
	// If the link has been clicked, and we have a supplied code, use it to request a token
	if(array_key_exists("code",$_GET)){
		$token = $foursquare->GetToken($_GET['code'],$redirect_uri);
	}
	
?>
<!doctype html>
<html>
<head>
	<title>PHP-Foursquare :: Token Request Example</title>
</head>
<body>
<h1>Token Request Example</h1>
<p>
	<?php 
	// If we have not received a token, display the link for Foursquare webauth
	if(!isset($token)){ 
		echo "<a href='".$foursquare->AuthenticationLink($redirect_uri)."'>Connect to this app via Foursquare</a>";
	// Otherwise display the token
	}else{
		echo "Your auth token: $token";
	}
	
	?>
	
</p>
<hr />
<?php 
	
?>
</body>
</html>

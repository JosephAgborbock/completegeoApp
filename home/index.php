	<?php 
		require_once("../foursquare/src/FoursquareApi.php");
		$name = array_key_exists("name",$_GET) ? $_GET['name'] : "Foursquare";
		error_reporting(0);

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Geo App</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../bootstrap/css/style.css">
		<script src="../jquery/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>

			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-43091346-1', 'devzone.co.in');
				ga('send', 'pageview');
		</script>
	</head>

	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" 
					  data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand black" href="#">GeoApp</a>
				</div>

				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li class="black"><a href="#">Home</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						<form class="form-inline" role="form" method="GET">
							<div class="form-group">
								<input type="search" name="name" class="form-control" placeholder="Search places....">
							</div>

							<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					    </form>	      
				    </ul>
				</div>
			</div>
		</nav>

		<section class="container">

			<h1 class="text-center">GeoApp</h1>
			<h4>Searching for name with name similar to <?php echo $name; ?></h4>

			<?php 
				// Set your client key and secret
				$client_key = "DY3S3P302ZG3A3SKARKVH03TNZZANEHIAB5IV1TXVUG22PJV";
				$client_secret = "XS4Z15OOW43TTPW212Y0IYFY5AMWSC3KAQ4G14D5OD03PIBC";  
				// Set your auth token, loaded using the workflow described in tokenrequest.php
				$auth_token = "E31J2DDR3FQP2GSTLMCGIAAAGMDKUCLUVT31SBB21YQEHGHX";
				// Load the Foursquare API library
				$foursquare = new FoursquareApi($client_key,$client_secret);
				$foursquare->SetAccessToken($auth_token);
				
				// Prepare parameters
				$params = array("near"=>$name);
				
				// Perform a request to a authenticated-only resource
				$response = $foursquare->GetPublic("venues/search",$params);
				$venue1 = json_decode($response); 
				
				// NOTE:
				// Foursquare only allows for 500 api requests/hr for a given client (meaning the below code would be
				// a very inefficient use of your api calls on a production application). It would be a better idea in
				// this scenario to have a caching layer for user details and only request the details of users that
				// you have not yet seen. Alternatively, several client keys could be tried in a round-robin pattern 
				// to increase your allowed requests.
				
			?>

			<ul>
			 <?php foreach($venue1->response as $venue): ?>

				<?php foreach($venue as $Place):?>
				<div ></div>
				<li>
					<?php 

					
						if(property_exists($Place,"categories")) echo "<img src='".$Place->categories[0]->icon->prefix
							.$Place->categories[0]->icon->suffix."' /><br> ";
						if(property_exists($Place,"name")) echo "<p>Name: ".$Place->name. " </p>";
						if(property_exists($Place,"categories")) echo "<p>Categories: ".$Place->categories[0]->name. " </p>";
						if(property_exists($Place,"location")) echo "<p>Location: ".$Place->location->cc. " - ";
						if(property_exists($Place,"location")) echo $Place->location->country. " </p> ";
						if(property_exists($Place,"stats")) echo "<p>Number of checkins: ".$Place->stats->checkinsCount	. " </p> ";
						if(property_exists($Place,"location")) echo "<p>Latitude: ".$Place->location->lat. " </p> ";
						if(property_exists($Place,"location")) echo "<p>Longitude: ".$Place->location->lng. " </p> ";
					?>
				</li>

				<?php

                   $arraylong = array("Longitude");
                   $arraylat  = array("Latitude"); 

                   //Merging arrays together
                   $result = array_merge($arraylong, $arraylat);
                  print_r($result);
				?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</ul>
		</section>	
	</body>
	</html>
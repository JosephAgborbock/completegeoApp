<!DOCTYPE html>
<html lang="en">
 <head>
  <title>Geo App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">
  <script src="jquery/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="">
  <!-- this section is the search part -->
  <div class="textpart">
    <h2 class="">GEO APP</h2>
    <div class="title">
      <p>Find the nearest restaurants, shopping mall, hotels... with just a click</p>
    </div>
    
    <div class="search">
      <form class="form-inline" role="form" method="GET" action="home/index.php" >
        <div class="form-group">
          <input type="search" name="name" class="form-control" id="name" placeholder="Search places....">
        </div>
        <button type="submit" class="btn btn-default"><span class=""></span> Search</button>
      </form>
    </div>
  </div>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="images/afgrey2.jpg" alt="Los Angeles" style="width:100%; height:650px;">
      </div>

      <div class="item">
        <img src="images/afgrey3.jpg" alt="Chicago" style="width:100%; height:650px;">
      </div>

      <div class="item">
        <img src="images/afgrey4.jpg" alt="New York" style="width:100%; height:650px;">
      </div>

      <div class="item">
        <img src="images/afgrey5.jpg" alt="New York" style="width:100%; height:650px;">
      </div>

      <div class="item">
        <img src="images/afgrey6.jpg" alt="New York" style="width:100%; height:650px;">
      </div>

      <div class="item">
        <img src="images/afgrey7.jpg" alt="New York" style="width:100%; height:650px;">
      </div>

    </div>
  </div>
</div>

 </body>
</html>

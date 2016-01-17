<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hütteldorf</title>

    <!-- CSS -->
    <link href="dist/bootstrap.min.css" rel="stylesheet">
    <link href="css/offcanvas.css" rel="stylesheet"> <!-- css für offcanvas Navigation-->
    <link href="assets/ie10-viewport-bug-workaround.css" rel="stylesheet"> <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="sass/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="icon" href="bilder/favicon.png" type="image/png" />
  </head>


<body>

    <div class="container"> <!-- Container, indem der ganze Content enthalten ist -->
    <div class="row">

    <a href="#content" class="sr-only sr-only-focusable">Menü überspringen</a> <!-- wenn man einmal den Tab drückt, kann man das Menü überspringen um zum eigentlichen Inhalt zu gelangen -->
    
    <!-- NAVBAR
================================================== -->

<!-- Kleiner Display - offcanvas -->
    <div class="visible-xs">
      <div class="navbar-header">
       <a class="navbar-brand" href="index.php">Hütteldorf</a>
      </div>
    <button class="btn btn-primary btn-xs" data-toggle="offcanvas">Menü</button>
  </div>

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-left">
        <div class="visible-xs col-xs-12 sidebar-offcanvas">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="lokale.php">Lokale</a></li>
            <li><a href="sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
            <li><a href="erholungsraeume.php">Erholungsräume</a></li>
            <li><a href="login.html">Loginseite</a></li>
          </ul>
        </div>
      </div>
    </div> <!-- Ende visible -->


<!-- Großer Display -->

      <div class="navi visible-lg visible-md visible-sm" >

        <nav class="navbar navbar-static-top navbar-inverse">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Hütteldorf</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="lokale.php">Lokale</a></li>
            <li><a href="sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
            <li><a href="erholungsraeume.php">Erholungsräume</a></li>
            <li class="visible-md visible-sm"><a href="login.html">Loginseite</a></li>
          </ul>
        <div class="visible-lg">

<?php 
    if(!$_SESSION['login']){
  ?>
    
     <form action="login.html" method="POST">
    
    <div class="btn-group" role="group" aria-label="...">
      <button type="submit" class="btn btn-default" name="login">Login</button>
  </div>

    </form> 
    
     <?php 
  }else{ 
   ?>
     <form action="php/logout.php" method="POST">
    
    <div class="btn-group" role="group" aria-label="...">
      <button type="submit" class="btn btn-default" name="logout">Logout</button>
  </div>
</form>

           
  <?php
   }
  ?>
</div>
      </div><!-- Ende navbar header-->
    </div><!-- Ende container -->
    </nav>

  </div> <!-- Ende visible-lg -->



<!-- LIST ITEMS
================================================== -->

<div class="row row-offcanvas row-offcanvas-left"> <!-- Inhalt wird nach rechts verschoben aufgrund der offcanvas Navigation-->
<div class="inhalt" id="content" tabindex="-1"> <!-- hier wird hingesprungen, wenn man das Menü überspringen will-->
<div class="container marketing"> 

<!-- Listenelement von Bootstrap-->

  <h4 class="list-group-item active"> 
    Café
  </h4>
  <a href="lokale/corner.php" class="list-group-item">Cafe Corner</a>
  <a href="#" class="list-group-item">Cafe Kozian</a>
  <a href="#" class="list-group-item">Optimahl</a>
  <a href="#" class="list-group-item">Poky's Cafe</a>
  <a href="#" class="list-group-item">Segafredo</a>

  <h4 class="list-group-item active">
    Italienisch
  </h4>
  <a href="#" class="list-group-item">Francesco</a>
  <a href="#" class="list-group-item">Per Sempre</a>

  <h4 class="list-group-item active">
    Asiatisch
  </h4>
  <a href="#" class="list-group-item">L421</a>
  <a href="#" class="list-group-item">Yume</a>

   <h4 class="list-group-item active">
    Österreichisch
  </h4>
  <a href="#" class="list-group-item">Europa Haus</a>
  <a href="#" class="list-group-item">Fuhrmannhaus</a>
  <a href="#" class="list-group-item">Gastwirtschaft</a>
  <a href="#" class="list-group-item">Hütteldorfer</a>
  <a href="#" class="list-group-item">Prilisauer</a>
  <a href="#" class="list-group-item">Stags' Head</a>
  <a href="#" class="list-group-item">Stüberl</a>





      <!-- FOOTER
    ================================================== -->
      <footer>
        <p>&copy; 2015 Veronika Gerstner &middot; | <a href="mailto:veronika.gerstner@gmx.at">Kontakt</a> | <a href="#">Top</a></p>
      </footer>


      </div><!-- Ende container marketing -->
    </div><!-- Ende Inhalt-->
  </div><!--Ende row-offcanvas -->
</div> <!-- Ende row -->
</div> <!-- Ende container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="assets/ie-emulation-modes-warning.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/ie10-viewport-bug-workaround.js"></script>
    <script src="js/offcanvas.js"></script><!-- js für offcanvas -->
  </body>
</html>

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
    <link href="../dist/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/ie10-viewport-bug-workaround.css" rel="stylesheet">  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/offcanvas.css" rel="stylesheet"> <!-- css für offcanvas Navigation-->
    <link href="../sass/main.css" rel="stylesheet">
   <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <!-- Favicon -->
    <link rel="icon" href="../bilder/favicon.png" type="image/png" />
  </head>



  <body>

    <div class="container"><!-- Container, indem der ganze Content enthalten ist -->
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
    </div><!-- Ende visible-xs -->


<!-- Großer Display - Menüleiste -->
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
          <a class="navbar-brand" href="../index.php">Hütteldorf</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li class="active"><a href="../lokale.php">Lokale</a></li>
            <li><a href="../sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
            <li><a href="../erholungsraeume.php">Erholungsräume</a></li>
            <li class="visible-md visible-sm"><a href="../login.html">Loginseite</a></li>
          </ul>
        <div class="visible-lg">

<?php 
    if(!$_SESSION['login']){
  ?>
    
     <form action="../login.html" method="POST">
    
    <div class="btn-group" role="group" aria-label="...">
      <button type="submit" class="btn btn-default" name="login">Login</button>
  </div>

    </form> 
    
     <?php 
  }else{ 
   ?>
     <form action="../php/logout.php" method="POST">
    
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



<div class="row row-offcanvas row-offcanvas-left"><!-- Inhalt wird nach rechts verschoben aufgrund der offcanvas Navigation-->
<div class="inhalt" id="content" tabindex="-1"> <!-- hier wird hingesprungen, wenn man das Menü überspringen will-->
<div class="container marketing">


<!-- FEARURETTES
================================================== -->


  <div class="row featurette">
        <div class="col-md-7"> <!-- Beschreibung von Lokal -->
          <h2 class="featurette-heading">Cafe  Corner</h2>
          <p class="lead">Das Cafe Corner befindet sich in der Nähe des Hütteldorfer Bahnhofes und des Fußballstadions. Es ist deshalb sehr beliebt bei den Fußball-Fans. Außerdem hat man hier die Gelegenheit für Live-wetten.</p>
          <p class="lead">Der Name kommt daher, dass es sich an der Ecke Deutschordenstraße und Keißlergasse befindet.</p>
        </div>
        <div class="col-md-4"> <!-- Bild von Lokal-->
          <img class="featurette-image img-responsive center-block" src="../bilder/corner.jpg" alt="Cafe Corner">
        </div>
      </div>

      <hr class="featurette-divider">
      
<!-- EINTRÄGE
================================================== -->


<?php 

if($_SESSION['login']){

  ?>
  <h2>Kommentare</h2>
    <form class="kommentare" action="../php/neuerBeitrag.php" method="POST">
    <input type ="text" name="message" title="Um einen Kommentar hinterlassen zu können, müssen Sie sich registrieren." />
    <input type="hidden" name="topic" value="<?php $corner?>"/>
    <input type="submit" value="Beitrag senden" class="submitbtn" />
    </form>
  <?php

  
require_once('../config.inc.php');

try{
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW);  
  }catch(PDOException $e){
      echo "Verbindung fehlgeschlagen";
      die(); //hört auf mit allem, Abbruch
    }

$corner = $db->query("SELECT 'corner' FROM hue_topic"); 

$messages = $db->query('SELECT * FROM hue_beitrag WHERE topic="corner"');
$messages = $messages->fetchAll();
  
foreach($messages as $m){
    ?>
    <p><?php echo htmlentities($m['message']); ?></p>
        <p><?php echo $m['user']." | ".$m['date']; ?></p>
        <hr />
    
        
<?php

}?><?php
}else{?>

<h2>Kommentare</h2>
    <form class="kommentare" action=" " method="POST">
    <input type ="text" name="message" title="Um einen Kommentar hinterlassen zu können, müssen Sie sich registrieren." />
    <input type="hidden" name="topic" value="<?php $corner?>"/>
    <input id="trigger_btn" type="submit" value="Beitrag senden" class="submitbtn" /> <!-- Trigger Button, wenn ich den klicke...-->
    </form>
<div class="alert" id="alert_container" role="alert">Um einen Kommentar zu hinterlassen, müssen Sie sich registrieren</div><!--... wird der Text rot unterlegt-->

<?php 
 }

?>





<!-- FOOTER
================================================== -->
  <footer>
    <p>&copy; 2015 Veronika Gerstner &middot; | <a href="mailto:veronika.gerstner@gmx.at">Kontakt</a> | <a href="#">Top</a></p>
  </footer>

</div><!-- Ende container marketing -->
</div><!-- Ende inhalt-->
</div><!-- Ende row-offcanvas -->
</div><!-- Ende row -->
</div> <!-- Ende container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/ie-emulation-modes-warning.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/ie10-viewport-bug-workaround.js"></script>
    <script src="../js/offcanvas.js"></script><!-- js für offcanvas -->
    

    <!-- ToogleEffekt
    ================================================== -->
    <script>
    $(document).ready(function() {
      $("#trigger_btn").click(function() {
        $("#alert_container").toggleClass("alert-danger", 1000, "easeOutSine");  
      });
    });
 
    </script>
    

  </body>
</html>

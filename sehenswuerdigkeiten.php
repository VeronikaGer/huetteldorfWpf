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
    <link type="text/css" href="css/jquery.ui.all.css" rel="stylesheet" />   <!-- css für Accordion --> 
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

<!-- Kleiner Display-->
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
            <li><a href="lokale.php">Lokale</a></li>
            <li class="active"><a href="sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
            <li><a href="erholungsraeume.php">Erholungsräume</a></li>
            <li><a href="login.html">Loginseite</a></li>
          </ul>
        </div>
      </div>
    </div><!-- Ende visible -->


<!-- Großer display-->
      <div class="navi visible-lg visible-md visible-sm">

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
            <li><a href="lokale.php">Lokale</a></li>
            <li class="active"><a href="sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
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


<!-- ACCORDION
================================================== -->

<div class="row row-offcanvas row-offcanvas-left"><!-- Inhalt wird nach rechts verschoben aufgrund der offcanvas Navigation-->
<div class="inhalt" id="content" tabindex="-1"> <!-- hier wird hingesprungen, wenn man das Menü überspringen will-->
  <div class="container marketing">


<div id="accordion"> <!-- Element von Hans Hillen-->
  <h3><a href="#">Ernst Fuchs Museum</a></h3>
  <div>
    <img class="media-object col-lg-3 col-md-3 col-xs-12" src="bilder/ernstFuchsVilla.jpg" alt="Ernst Fuchs Museum">
    <p>
    Das heute als "Fuchs-Villa" bekannte Haus an der Hüttelbergstraße ist ein wertvolles Architekturdenkmal, das lange Zeit vom Verfall bedroht war und 1963 schließlich sogar demoliert werden sollte: Daß das nicht eintrat, verdankt die Villa ihrem jetzigen Besitzer und "heros eponymos", dem Zeichner und Maler Ernst Fuchs. Ernst Fuchs rettete die Villa nicht nur vor dem Abbruch, sondern er machte sie in Form eines Museums auch der Öffentlichkeit zugänglich.
    </p>
    <p>Öffnungszeiten: Dienstag bis Sonntag 10:00 - 16:00 Uhr </p>

    <p class="pBottom">Preise: Ticket € 11,- | Wiencard € 8,- | Studenten / Senioren € 6,-</p>
  </div>

  <h3><a href="#">Wagner Villa II</a></h3>
  <div>
    <img class="media-object col-lg-3 col-md-3 col-xs-12" src="bilder/ottowagner.jpg" alt="Otto Wagner Villa">
    <p>
    Die Villa wurde 1912/13 gebaut, die Entwürfe gehen aber bis ins Jahr 1905 zurück. Die stilistische Weiterentwicklung Wagners ist deutlich sichtbar, als Stahlbetonkonstruktion ist die Villa auch bautechnisch auf dem damals modernsten Stand. Sie ist ein kubischer Bau mit hochrechteckigen Öffnungen und einem eingezogenen Kranzgesims. Der aus blauen Glasstreifen und Aluminiumnägeln bestehende Dekor ist stilistisch eigenständig und sparsam eingesetzt. Die Glasfenster und das Glasmosaik über dem Eingangsportal stammen von Koloman Moser.
    </p>
    </div>

  <h3><a href="#">Pestsäule</a></h3>
  <div>
    <img class="media-object col-lg-2 col-md-2 col-xs-12" src="bilder/pestsaeule.jpg" alt="Pestsäule">
    <p>In der Nähe des Hütteldorfer Pfarrkirche findet man die Pestsäule, welche als Denkmal an die Zeit der Pest erinnern.</p>
    <p>Auf einem Vierkantsockel erhebt sich eine schlanke Säule mit ionischen Kapitell, auf der eine Skulptur der Dreifaltigkeit in Form eines Gnadenstuhls ruht.
    </p>
  </div>

</div> <!-- Ende accordion-->




<!-- FOOTER
================================================== -->
      <footer>
        <p>&copy; 2015 Veronika Gerstner &middot; | <a href="mailto:veronika.gerstner@gmx.at">Kontakt</a> | <a href="#">Top</a></p>
      </footer>

    </div><!-- Ende container marketing -->
  </div><!-- Ende Inhalt-->
</div><!-- Ende row-offcanvas-->
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


  <!-- ACCORDION -->
  <script type="text/javascript" src="jquery-1.4.2.js"></script>
  <script type="text/javascript" src="ui/jquery.ui.core.js"></script>
  <script type="text/javascript" src="ui/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="ui/jquery.ui.accordion.js"></script>
  <script type="text/javascript">
  $(function() {
    $("#accordion").accordion({
        collapsible: true
    });
  });
  </script>

  </body>
</html>

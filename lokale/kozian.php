<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Hütteldorf</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../assets/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">


  </head>


<!-- NAVBAR
================================================== -->
  <body>

    <a href="#content" class="sr-only sr-only-focusable">Menü überspringen</a> <!-- wenn man einmal den Tab drückt, kann man das Menü überspringen um zum eigentlichen Inhalt zu gelangen -->
    
    <div class="navbar navbar-default navbar-fixed-top"> <!-- fixierter Header -->
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
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
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li class="active"><a href="../lokale.php">Lokale</a></li>
                <li><a href="../sehenswuerdigkeiten.php">Sehenswürdigkeiten</a></li>
                <li><a href="../erholungsraeume.php">Sehenswürdigkeiten</a></li>
              </ul>
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
	require_once('../config.inc.php');

	try{
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PW); 	
	}catch(PDOException $e){
		echo "Verbindung fehlgeschlagen";
		die(); //hört auf mit allem, Abbruch
		}

	//$corner = $db->query('SELECT "corner" FROM hue_topic');	
	
	}
	?>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- FEARURETTES
    ================================================== -->

    <div class="container marketing">


  <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Cafe <span class="text-muted">Kozian</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
      
 <!-- EINTRÄGE
    ================================================== -->

<h2>Kommentare</h2>
<form action="../php/neuerBeitrag.php" method="POST">
<input type ="text" name="message" />
<input type="hidden" name="topic" value="kozian"/>
<input type="submit" value="Beitrag senden" name="senden" style="background-color:#FFF; font-family:Verdana, Geneva, sans-serif"/>
</form>   

<?php 

if($_SESSION['login']){

$messages = $db->query('SELECT * FROM hue_beitrag WHERE topic="kozian"');
$messages = $messages->fetchAll();
	
foreach($messages as $m){
		?>
		<p><?php echo htmlentities($m['message']); ?></p>
        <p><?php echo $m['user']." | ".$m['date']; ?></p>
        <hr />


    
        
<?php

	}

}else{?>

<p>Um einen Kommentar zu hinterlassen, müssen sie sich <a href="../login.html">registrieren</a></p>

<?php 
 }
?>

    


 <!-- FOOTER
    ================================================== -->
      <footer>
        <p class="pull-right"><a href="#">Top</a></p>
        <p>&copy; 2015 Veronika Gerstner &middot; <a href="mailto:veronika.gerstner@gmx.at">Kontakt</a> </p>
      </footer>

    </div><!-- Ende container marketing -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../assets/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>

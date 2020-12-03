<?php
  // Start the session
  session_start();
  if (isset($_POST['admin'])) {
    if ($_POST['admin'] == "true") {      
    } else {
      header("location:index.php");
    }              
  }    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Panel de Control</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand headerFont text-lg"><strong>Voto Automatizado</strong></a>
        </div>
      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px solid gray;">
          
          <div class="page-header">
            <h2 class="specialHead">Panel de Control</h2>
            <p class="normalFont">Este es el panel administrativo.</p>
          </div>
          
          <div class="col-sm-12">
            <span class="normalFont"><a href="cruds/candidatos/" class="btn btn-default"><strong>Candidatos</strong></a></span></button>
          </div>
          <br/>
          <div class="col-sm-12">
            <span class="normalFont"><a href="cruds/ciudadano/" class="btn btn-default"><strong>Ciudadano</strong></a></span></button>
          </div>
          <br/>
          <div class="col-sm-12">
            <span class="normalFont"><a href="cruds/eleccion/" class="btn btn-default"><strong>Eleccion</strong></a></span></button>
          </div>
          <br/>
          <div class="col-sm-12">
            <span class="normalFont"><a href="cruds/partido/" class="btn btn-default"><strong>Partido</strong></a></span></button>
          </div>
          <br/>
          <div class="col-sm-12">
            <span class="normalFont"><a href="cruds/puesto/" class="btn btn-default"><strong>Puesto</strong></a></span></button>
          </div>
          <div class="col-sm-12">
            <span class="normalFont"><a href="resultados/" class="btn btn-default"><strong>Resultados</strong></a></span></button>
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

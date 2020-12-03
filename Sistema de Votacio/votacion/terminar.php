<?php
  // Start the session
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Panel de Votaciones</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

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
          <a href="../" class="navbar-brand headerFont text-lg"><strong>Voto automatizado</strong></a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
          </ul>
          

          <span class="normalFont"><a href="admin.html" class="btn btn-success navbar-right navbar-btn"><strong>Panel Administrativo</strong></a></span>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
          
          <div class="page-header">
            <h2 class="specialHead">Gracias por votar.</h2>
          </div>
          <?php
          // Include config file
          require_once "../config.php";
              
          // Check input errors before inserting in database
          if($_SESSION["presidente"] != null and 
              $_SESSION["alcalde"] != null and 
              $_SESSION["senador"] != null and 
              $_SESSION["diputado"] != null) {
              // Prepare an insert statement
              $sql = "REPLACE INTO voto (cedula, presidente, alcalde, senador, diputado, eleccion, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
                  
              if($stmt = mysqli_prepare($link, $sql)){
                  // Bind variables to the prepared statement as parameters
                  $cedula = $_SESSION["cedula"];
                  $presidente = $_SESSION["presidente"];
                  $alcalde = $_SESSION["alcalde"];
                  $senador = $_SESSION["senador"];
                  $diputado = $_SESSION["diputado"];
                  $eleccion = $_SESSION["eleccion"];
                  $estado = 1;

                  mysqli_stmt_bind_param($stmt, "siiiiii", $cedula, $presidente,$alcalde,$senador,$diputado,$eleccion, $estado);
                  
                  // Attempt to execute the prepared statement
                  if(mysqli_stmt_execute($stmt)){
                      // Records created successfully. Redirect to landing page
                      echo "Voto realizado con exito.";
                      exit();
                  } else{
                      echo "Something went wrong. Please try again later.";
                  }
              }
                  
              // Close statement
              mysqli_stmt_close($stmt);
          }
          // Close connection
          mysqli_close($link);
          ?>
      </div>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

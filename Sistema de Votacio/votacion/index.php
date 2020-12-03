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
            <h2 class="specialHead">Puestos</h2>
          </div>       
            <?php
              // Include config file
              require_once "../config.php";

              if (isset($_POST['voterID'])){
                $_SESSION["cedula"] =  $_POST['voterID'];
              }
              if (isset($_POST['presidenteID'])) {
                $_SESSION["presidente"] =  $_POST['presidenteID'];               
              }         
              if (isset($_POST['alcaldeID'])) {
                $_SESSION["alcalde"] =  $_POST['alcaldeID'];               
              }      
              if (isset($_POST['senadorID'])) {
                $_SESSION["senador"] =  $_POST['senadorID'];               
              }      
              if (isset($_POST['diputadoID'])) {
                $_SESSION["diputado"] =  $_POST['diputadoID'];               
              }

              echo "Su cedula es " . $_SESSION["cedula"] . ".<br>";

              // Attempt select query execution
              $sql = 'SELECT * FROM ciudadano WHERE cedula = ' . $_SESSION["cedula"]. ' AND estado = 1';
              if($result = mysqli_query($link, $sql)){
                  if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_array($result)){
                              if($_SESSION["presidente"] != null){
                                echo '<a href="presidente.php" disabled class="btn btn-default "><strong>Presidente</strong></a>';
                              } else{
                                echo '<a href="presidente.php" class="btn btn-default "><strong>Presidente</strong></a>';
                              }
                              if($_SESSION["alcalde"] != null){
                                echo '<a href="alcalde.php" disabled class="btn btn-default "><strong>Alcalde</strong></a>';
                              } else{
                                echo '<a href="alcalde.php" class="btn btn-default "><strong>Alcalde</strong></a>';
                              }
                              if($_SESSION["senador"] != null){
                                echo '<a href="senador.php" disabled class="btn btn-default "><strong>Senador</strong></a>';
                              } else{
                                echo '<a href="senador.php" class="btn btn-default "><strong>Senador</strong></a>';
                              }
                              if($_SESSION["diputado"] != null){
                                echo '<a href="diputado.php" disabled class="btn btn-default "><strong>Diputado</strong></a>';
                              } else{
                                echo '<a href="diputado.php" class="btn btn-default "><strong>Diputado</strong></a>';
                              }
                              if($_SESSION["presidente"] != null and 
                              $_SESSION["alcalde"] != null and 
                              $_SESSION["senador"] != null and 
                              $_SESSION["diputado"] != null) {
                                echo  '<a href="terminar.php" class="btn btn-danger"><strong>terminar</strong></a>';
                              }
                              
                          }
                      // Free result set
                      mysqli_free_result($result);
                  } else{
                      echo "<p class='lead'><em>El ciudadano no existe.</em></p>";
                  }
              } else{
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
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
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

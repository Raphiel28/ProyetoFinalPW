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
    <title>Diputados</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

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
          <a href="cpanel.php"><button type="submit" class="btn btn-success navbar-right navbar-btn"><span class="normalFont"><strong>Panel Administrativo</strong></span></button></a>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
      <div class="col-sm-3" style="border:2px solid gray;"><label>Nombre</label>
        <p>Ninguno</p><img src="" class="img img-thumbnail" style="width:200px;height:200px;"
          alt=""><label>Partido</label>
        <p>Ninguno</p><img src="" class="img img-thumbnail" style="width:200px;height:200px;"
          alt=""><label>Cargo al que aspira</label>
        <p>Ninguno</p><button name="buttoncandidato" id="0" onclick="myFunction(this)">Seleccionar</button>
      </div>
        <?php
                // Include config file
                require_once "../config.php";
                
                // Attempt select query execution
                $sql = "SELECT * FROM candidatos";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo '<div class="col-sm-3" style="border:2px solid gray;">';          
                                echo     '<label>Nombre</label>';
                                echo     '<p>' . $row['nombre'] .'</p>';
                                echo     '<img src="../images/' . $row['foto'] . '" class="img img-thumbnail" style="width:200px;height:200px;" alt="">';
                                echo     '<label>Partido</label>';
                                echo     '<p>' . $row['partido'] .  '</p>';
                                echo     '<img src="../images/partido'. $row['partido'] .'.png" class="img img-thumbnail" style="width:200px;height:200px;" alt="">';  
                                echo     '<label>Cargo al que aspira</label>';
                                echo     '<p>'. $row['puesto'] .  '</p>';
                                echo     '<button name="buttoncandidato" id="'. $row['id'] .  '" onclick="myFunction(this)">Seleccionar</button>';
                                echo '</div>';
                            }
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }

                // Close connection
                mysqli_close($link);
            ?>
      
      </div>
      <form action="index.php" method="POST">
          <div class="form-group">
            <input id="diputadoID" hidden type="text" name="diputadoID" value="" required><br>
            <button id="botonVotar" disabled type="submit" name="submit" class="btn btn-primary"><strong>Votar</strong></button>
          </div>
       </form>
    </div>
    <script>
      function myFunction(elemento) {        
        var elements = document.getElementsByName("buttoncandidato");
        elements.forEach(botones);
        function botones(item, index) {
          item.disabled = true;
        }
        elemento.disabled = true;
        document.getElementById('diputadoID').value = elemento.id;
        document.getElementById('botonVotar').disabled = false;
      }
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
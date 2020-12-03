<?php
// Include config file
require_once "../../config.php";
 
// Define variables and initialize with empty values
$nombre = $apellido = $partido = $puesto = $foto = $estado = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $partido = trim($_POST["partido"]);
    $puesto = trim($_POST["puesto"]);
    $foto = trim($_POST["foto"]);

    // Prepare an insert statement
    $sql = "INSERT INTO candidatos (nombre, apellido, partido, puesto, foto, estado) VALUES (?, ?, ?, ?, ?, ?)";
        
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssiisi", $param_nombre, $param_apellido, $param_partido,$param_puesto,$param_foto,$param_estado);
        
        // Set parameters
        $param_nombre = $nombre;
        $param_apellido = $apellido;
        $param_partido = $partido;
        $param_puesto = $puesto;
        $param_foto = $foto;
        $param_estado = 1;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records created successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
        
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear candidato</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Crear candidato</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>apellido</label>
                            <input type="text" name="apellido" class="form-control" value="<?php echo $apellido; ?>">
                        </div>
                        <div class="form-group">
                            <label>partido</label>
                            <input type="number" name="partido" class="form-control" value="<?php echo $partido; ?>">
                        </div>
                        <div class="form-group">
                            <label>puesto</label>
                            <input type="number" name="puesto" class="form-control" value="<?php echo $puesto; ?>">
                        </div>
                        <div class="form-group">
                            <label>foto</label>
                            <input type="text" name="foto" class="form-control" value="<?php echo $foto; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
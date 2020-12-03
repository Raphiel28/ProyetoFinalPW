<?php
// Include config file
require_once "../../config.php";
 
// Define variables and initialize with empty values
$nombre = $descripcion = $logo = $estado = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $param_id = trim($_GET["id"]);

    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $logo = trim($_POST["logo"]);
    $estado = trim($_POST["estado"]);

    // Prepare an insert statement
    $sql = "REPLACE INTO partido (id, nombre, descripcion, logo, estado) VALUES (?, ?, ?, ?, ?)";
        
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "isssi", $param_id , $param_nombre, $param_descripcion, $param_logo, $param_estado);
        
        // Set parameters
        $param_nombre = $nombre;
        $param_descripcion = $descripcion;
        $param_logo = $logo;
        $param_estado = $estado;
        
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
    <title>Editar partido</title>
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
                        <h2>Editar partido</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>descripcion</label>
                            <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <label>logo</label>
                            <input type="text" name="logo" class="form-control" value="<?php echo $logo; ?>">
                        </div>
                        <div class="form-group">
                            <label>estado</label>
                            <input type="number" name="estado" class="form-control" value="<?php echo $estado; ?>">
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
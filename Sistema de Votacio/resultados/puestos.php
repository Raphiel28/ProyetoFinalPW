<?php
  // Start the session
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Resultados puestos</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "../config.php";

                    $id = trim($_GET["id"]);

                    $_SESSION["eleccion"] = $id;
                    
                    ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>PRESIDENTE</td>
                                <td>PRESIDENTE</td>
                                <td><a href="presidente.php" title="" data-toggle="tooltip" data-original-title="Ver resultados"><span
                                            class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>ALCALDE</td>
                                <td>ALCALDE</td>
                                <td><a href="alcalde.php" title="" data-toggle="tooltip" data-original-title="Ver resultados"><span
                                            class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>SENADOR</td>
                                <td>SENADOR</td>
                                <td><a href="senador.php" title="" data-toggle="tooltip" data-original-title="Ver resultados"><span
                                            class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>DIPUTADO</td>
                                <td>DIPUTADO</td>
                                <td><a href="diputado.php" title="" data-toggle="tooltip" data-original-title="Ver resultados"><span
                                            class="glyphicon glyphicon-pencil"></span></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="page-header clearfix">
                        <a href="index.php" class="btn btn-success pull-right">Atras</a>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
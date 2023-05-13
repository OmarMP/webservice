<?php
if(isset($_POST["usuario"])){
require "vendor/autoload.php";
$url="http://172.19.1.52/webservice/ws.php?wsdl";
$cliente = new nusoap_client($url,'wsdl');
$error=$cliente->getError();
if ($error){
    echo "Error en coneccion : $error";
}

$parametro = array("usuario"=>$_POST["usuario"]);
$resultado=$cliente->call('hola',$parametro);
print_r($resultado);
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Hola</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" class="form-horizontal">
                        digite su nombre : <input type="text" name="usuario" id= "usuario"><br>
                        <input type="submit" value="Enviar">
                    </form>
</body>
<?php } 
?>
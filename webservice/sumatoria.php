<?php  
if(isset($_POST["v1"])&& isset($_POST["v2"])){ 
require "vendor/autoload.php";
$url="http://172.19.1.52/webservice/ws.php?wsdl";
$cliente=new nusoap_client($url,'wsdl');
$error=$cliente->getError();
if ($error){
    echo $error;
}
$parametros=array("v1"=>$_POST["v1"], "v2"=>$_POST["v2"]);
$resultado = $cliente->call('sumatoria',$parametros);
print_r($resultado);
}else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>sumatoria</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="POST" class="form-horizontal">
                        escriba numero 1 : <input type="int" name="v1" id= "v1"><br>
                        escriba numero 1 : <input type="int" name="v2" id= "v2"><br>
                        <input type="submit" value="Enviar">
                    </form>
</body>
</html>
<?php } ?>
<?php
require "vendor/autoload.php";
$url="http://dneonline.com/calculator.asmx?WSDL";
$cliente = new nusoap_client($url,"wsdl");
$error=$cliente->getError();
if($error){
    echo"Error de conexcion con el webservice: $error";
}
$parametros=array("intA"=>25,"intB"=>10);
$suma=$cliente->call('Add',$parametros);
//print_r($suma);
echo "<h1>El resultado de sumar {$parametros["intA"]} con {$parametros["intB"]} es :{$suma["AddResult"]}</h1>";

$resta = $cliente->call('Subtract',$parametros);
echo "<h1>El resultado de restar {$parametros["intA"]} con {$parametros["intB"]} es :{$resta["SubtractResult"]}</h1>";

$multiplicar = $cliente->call('Multiply',$parametros);
echo "<h1>El resultado de multiplicar {$parametros["intA"]} con {$parametros["intB"]} es :{$multiplicar["MultiplyResult"]}</h1>";


<?php
require "vendor/autoload.php";
$url="https://www.w3schools.com/xml/tempconvert.asmx?WSDL";
$cliente = new nusoap_client($url,"wsdl");
$error=$cliente->getError();
if($error){
    echo"Error de conexcion con el webservice: $error";
}

$parametros=array("Fahrenheit"=>80);
$grados=$cliente->call("FahrenheitToCelsius",$parametros);
echo "<h1>{$parametros["Fahrenheit"]} grados  Fahrenheit equivale a  {$grados["FahrenheitToCelsiusResult"]}</h1>";


$parametros=array("Celsius"=>35);
$grados=$cliente->call("CelsiusToFahrenheit",$parametros);
echo "<h1>{$parametros["Celsius"]} grados  Fahrenheit equivale a  {$grados["CelsiusToFahrenheitResult"]}</h1>";
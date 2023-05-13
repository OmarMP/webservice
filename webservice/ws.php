<?php
require "vendor/autoload.php";
$server=new nusoap_server;
$server->configureWSDL('server','urn:server');
$server->wsdl->schemaTargetNamespace="urn:server";
$server->register('hola',
array('usuario'=>'xsd:string'),
array('return'=>'xsd:string'),
'urn:server',
'urn:server#holaServer',
'rpc',
'encoded',
'Function hola mundo es un webservice'
);

$server->wsdl->addComplexType(
    'Persona',
    'complexType',
    'struct',
    'all',
    '',
    
    array(
        'id_user'=>array('name'=>'id_user', 'type'=>'xsd:int'),
        'fullname'=>array('name'=>'fullname', 'type'=>'xsd:string'),
        'email'=>array('name'=>'email', 'type'=>'xsd:string'),
        'msg'=>array('name'=>'msg', 'type'=>'xsd:string'),
        'level'=>array('name'=>'level', 'type'=>'xsd:int')
    )
    );

$server->register('sumatoria',
array('v1'=>'xsd:int','v2'=>'xsd:int'),
array('resultado'=>'xsd:int'),
'urn:server',
'urn:server#sumatoria',
'rpc',
'encoded',
'Function sumatoria mundo SUMA DEL NUMERO V1 AL V2');

function hola($usuario){
    return "bienvenido $usuario";
}


/** se espera dos parametros para si  */


function sumatoria($v1, $v2){
    $total=0;
    for($i=$v1;$i<=$v2;$i++){
        $total+= $i;
    }
    return $total;
}
$server->register(
    'login',
    array('username' => 'xsd:string', 'password' => 'xsd:string'),
        array('return' => 'tns:Persona'),
        'urn:server',
        'urn:server#loginServer',
        'rpc',
        'encoded',
        'Function para validar login'
);

function login($username,$password){
    if($username=="admin" && $password=="catolica"){
        $valor=array(
            'id_user'=>1,
            'fullname'=>"juana de lopes",
            'email'=>"admin@example.com",
           'msg'=>"usuario correcto",
           'level'=>1);
}else{
    $valor=array(
        'id_user'=>0,
        'fullname'=>'',
        'email'=>'',
       'msg'=>'usuario incorrecto',
        'level'=>0);
}
return $valor;
}
$server->service(file_get_contents("php://input"));
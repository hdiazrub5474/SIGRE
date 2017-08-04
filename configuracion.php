<?php

//Conexion a MySql Base de Datos S.I.G.R.E.

$s="localhost";
$bd="sigre";
$u="root";
$p="";


$conexion=new mysqli($s,$u,$p,$bd);

//if($conexion->connect_errno){
//	echo "No conectado";
//}else{
//	echo "Conectado a SIGRE";
//}


?>
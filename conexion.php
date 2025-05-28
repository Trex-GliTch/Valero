<?php
function connection(){
    $host="localhost";
    $user="root";
    $pass= "";

    $bd= "valero_automotive";

    $conexion=mysqli_connect($host,$user,$pass,$bd);

    mysqli_select_db($conexion,$bd);

    return $conexion;
};

?>
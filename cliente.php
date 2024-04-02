<?php
// Incluir la biblioteca NuSOAP
require_once "lib/lib/nusoap.php";

// Crear una instancia del cliente SOAP y especificar la URL del servidor
$cliente = new nusoap_client("http://localhost/PRACTICA4php/server.php");

// Verificar si hubo algún error al crear el cliente
$error = $cliente->getError();
if ($error) {
    // Si hubo un error, mostrarlo
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

// Llamar a la función getLATAM en el servidor SOAP
$result = $cliente->call("getLATAM", array("datos" => "LATAM"));

// Verificar si hubo algún error en la llamada al servidor
if ($cliente->fault) {
    // Si hubo un error, mostrarlo
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
    // Verificar si hubo algún otro error
    $error = $cliente->getError();
    if ($error) {
        // Si hubo otro error, mostrarlo
        echo "<h2>Error al mostrar 404 :( </h2><pre>" . $error . "</pre>";
    } else {
        // Si no hubo errores, mostrar el resultado de la llamada al servidor
        echo "<h2>PAISES LATINOS</h2><pre>";
        echo $result;
        echo "</pre>";
    }
}
?>
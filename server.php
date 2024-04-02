<?php
// Incluir la biblioteca NuSOAP
require_once "lib/lib/nusoap.php";

// Función que devuelve una lista de países de América Latina
function getLATAM($datos) {
    // Verificar si el parámetro $datos es igual a "LATAM"
    if ($datos == "LATAM") {
        // Si es así, devolver una cadena con los nombres de los países separados por comas
        RETURN JOIN(",", array("México", "Guatemala", "Panama", "Bolivia", "Cuba", "Peru"));
    } else {
        // Si el parámetro $datos no es "LATAM", devolver la cadena "No hay Paises"
        return "No hay Paises";
    }
}

// Crear una instancia del servidor SOAP
$server = new soap_server();

// Registrar la función getLATAM en el servidor SOAP
$server->register("getLATAM");

// Verificar si los datos de la solicitud POST están disponibles
if (!isset($HTTP_RAW_POST_DATA)) {
    // Si no están disponibles, leer los datos desde la entrada estándar
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

// Procesar la solicitud SOAP
$server->service($HTTP_RAW_POST_DATA);
?>


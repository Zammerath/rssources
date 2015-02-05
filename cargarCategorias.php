<?php

function conexionBD() {
    $servidor = "localhost";
    $usuarioDB = "rssadmin";
    $contrasenaDB = "rssadmin";
    $conexion = mysql_connect($servidor, $usuarioDB, $contrasenaDB) or die("Imposible conectar con el servidor.");
    mysql_select_db("rssources") or die("Imposible conectar con la Base de Datos.");
    return $conexion;
}

function cargarCategorias() {
    $conexion = conexionBD();
    $sentencia = "select * from categorias;";
    $resultados = mysql_query($sentencia, $conexion);
    if (mysql_num_rows($resultados) == 0) {
        return -1;
    } else {
        $res;
        for ($i = 0; $i < mysql_num_rows($resultados); $i++) {
            $res[$i] = mysql_fetch_array($resultados);
        }
        return $res;
    }
}

//header('Content-type: text/xml');
//$xmlDoc = new DOMDocument();
//$xmlDoc->load("http://datos.santander.es/api/rest/datasets/agenda_cultural.xml");
//echo $xmlDoc->saveXML();
$control = $_GET["control"];
switch ($control) {
    case 'categorias':
        $res = cargarCategorias();
        $texto = "{'categorias':{'categoria':";
        for ($i = 0; $i < count($res); $i++) {
            if ($i == 0) {
                $texto.= "[{'id_Cat':" . $res[$i][0] . ",'nombre_Cat':'" . $res[$i][1] . "'},";
            } else if ($i == count($res) - 1) {
                $texto.= "{'id_Cat':" . $res[$i][0] . ",'nombre_Cat':'" . $res[$i][1] . "'}]}}";
            } else {
                $texto.= "{'id_Cat':" . $res[$i][0] . ",'nombre_Cat':'" . $res[$i][1] . "'},";
            }
        }
        break;
    default:
        $texto="La polla de juanfri";
        break;
}

echo $texto;
?>
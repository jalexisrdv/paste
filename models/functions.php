<?php

function b10tobstr($b10) {
    $base = 'ijklGHLMcsFqraPQRtuvwVWXYZmnopIJdeNOyzABfgCDESTUKxbh';
    $strlen = strlen($base);
    $bstr = '';
    while ($b10 > 0) {
      $mod = $b10 % $strlen;
      $b10 = (int)($b10 / $strlen);
          $bstr = $base[$mod].$bstr;
    }
    return $bstr;
}
  
function bstrtob10($str) {
    $base = 'ijklGHLMcsFqraPQRtuvwVWXYZmnopIJdeNOyzABfgCDESTUKxbh';
    $strlen = strlen($base);
    $i = strlen($str)-1;
    $number = 0;
    $pos = 0;
    while ($i >= 0) {
        $aux = $str[$i];
        $aux2 = strpos($base,$aux);
        if (is_numeric($aux2)){
            $number = $number + ($aux2 * pow($strlen,$pos));
        } else {
            $i = 0;
            $number = false;
        }
        $pos++;
        $i--;
    }
    return $number;
}

/* 
-1: Error al abrir el archivo para escritura. El motivo más frecuente es que el usuario no tiene permisos para escribir en el directorio.
-2: Error al escribir en el archivo.
*/
function escribe_ini($matriz, $archivo, $multi_secciones = true, $modo = 'w') {
    $salida = '';

    # saltos de línea (usar "\r\n" para Windows)
    define('SALTO', "\n");

    if (!is_array(current($matriz))) {
        $tmp = $matriz;
        $matriz['tmp'] = $tmp; # no importa el nombre de la sección, no se usará
        unset($tmp);
    }

    foreach($matriz as $clave => $matriz_interior) {
        if ($multi_secciones) {
            $salida .= '['.$clave.']'.SALTO;
        }

        foreach($matriz_interior as $clave2 => $valor)
            $salida .= $clave2.' = "'.$valor.'"'.SALTO;

        if ($multi_secciones) {
            $salida .= SALTO;
        }
    }

    $puntero_archivo = fopen($archivo, $modo);

    if ($puntero_archivo !== false) {
        $escribo = fwrite($puntero_archivo, $salida);

        if ($escribo === false) {
            $devolver = -2;
        } else {
            $devolver = $escribo;
        }

        fclose($puntero_archivo);
    } else {
        $devolver = -1;
    }

    return $devolver;
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
#Tambien podemos usar filter para limpiar los datos
function clearDate($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);

	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);
	return $datos;
}
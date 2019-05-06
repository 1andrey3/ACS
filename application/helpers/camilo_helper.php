<?php

// if (!defined('BASEPATH'))
//     exit('No direct script access allowed');
// date_default_timezone_set("America/Bogota");

if (!function_exists('validarEnProduccion')) {

    //Funcion para validar si el proyecto ya se encuentra en produccion, tomando como referencia la coneccion a DB
    //Retorna 1.1 si la DB esta apuntando a local de lo contrario retorna la funcion time()
    function validarEnProduccion()
    {
        $version = "";
        $CI = &get_instance();
        $CI->load->database();
        if ($CI->db->hostname == 'zte-coldb.cwtksnwikcx3.us-west-2.rds.amazonaws.com') {
            $version = '3.09';
        } else {
            $version = time();
        }

        return $version;
    }
}

if (!function_exists('comparationsNames')) {

    // Funcion que compara dos nombres por lo general de fuentes distintas que humanamente es facil
    // Pero computacional es mas complejo por temas de mayusculas y cambios ortograficos o segundo
    // nombre omitido. Ejemplo comparar nombres de un excel con relacion con nombres de db
    // recibe 2 parametros, un array con los nombres deseados... por lo general de db y el nombre a comparar
    // Retorna "false" si no encontro similitud importante o retorna el nombre del array
    // con el que hay mayor similitud
    // IMPORTANTE.. PASAR NOMBREBASE CON MINIMO DOS PALABRAS
    function comparationsNames($arrayNames, $nameBase) {
        // Declaracion de variables a usar
        $pLastname1 = 0;
        $pLastname2 = 0;
        $pLastname3 = 0;
        $nameResult = false;
        $contador = 0;
        $similares = [];
        // secciono en partes el nombre base para comparacion
        $name = explode(" ", $nameBase);
        // ciclo hasta la cantidad de nombres q existe en el array
        for ($i = 0; $i < count($arrayNames); $i++) {
            //comparo su nombre Base con el primer y segundo nombre del nombre del array
            similar_text(explode(" ", $arrayNames[$i])[0], $name[0], $percentName);
            similar_text(explode(" ", $arrayNames[$i])[1], $name[0], $percentSecontName);
            //si la similitud es mayor al 70%
            if ($percentName > 70 || $percentSecontName > 70) {
                //Si apellido del nombre de su array existe
                if (explode(" ", $arrayNames[$i])[2]) {
                    similar_text(explode(" ", $arrayNames[$i])[2], $name[1], $pLastname1);
                    similar_text(explode(" ", $arrayNames[$i])[2], $name[2], $pLastname2);
                    similar_text(explode(" ", $arrayNames[$i])[2], $name[3], $pLastname3);
                }
                // si segundo apellido existe
                if (explode(" ", $arrayNames[$i])[3]) {
                    similar_text(explode(" ", $arrayNames[$i])[3], $name[1], $pLastname1B);
                    similar_text(explode(" ", $arrayNames[$i])[3], $name[2], $pLastname2B);
                    similar_text(explode(" ", $arrayNames[$i])[3], $name[3], $pLastname3B);
                }
                // si en alguna de las comparaciones con respecto al nombrebase es mayor al 69%
                if ($pLastname1 > 69 || $pLastname2 > 69 || $pLastname3 > 69 || $pLastname1B > 69 || $pLastname2B > 69 || $pLastname3B > 69) {
                    //lo capturo en una variables y lo agrego a arreglo de similares
                    $nameResult = $arrayNames[$i];
                    array_push($similares, $nameResult);
                    //uso el contador por si hay mas de un registro q cumple las condiciones
                    $contador++;
                }
            }
        }
        //si hay mas de 1 registro que cumple....
        if ($contador > 1) {
            // ciclo hasta la cantidad de registros que cumple...
            for ($j = 0; $j < count($similares); $j++) {
                // los comparo directamente con el nombre base completo sin seccionarlo y
                // guardo la similitud en una variable
                $sim[$j] = similar_text($nameBase, $similares[$j]);
            }
            //retorno el nombre que tubo mayor similitud con respecto al nombre base
            return $similares[array_keys($sim, max($sim))[0]];
        }
        // si solo hay una similitud que cumple (contador = 1) retorno ese nombre
        // si no hay ninguna similitud que cumpla retorna "false"
        return $nameResult;
    }

}
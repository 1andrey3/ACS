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
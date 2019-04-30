<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class LoadInformation extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('data/Dao_actividad_model');
        $this->load->model('data/Dao_sitio_model');
        $this->load->model('data/Dao_temp_model');
        $this->load->model('data/Dao_user_model');
    }

    public function loadInformationView() {
        $data['title'] = 'Cargar Actividades';
        $this->load->view('parts/header', $data);
        $this->load->view('loadInformation');
        $this->load->view('parts/footer');
    }

    public function uploadfile() {
        // $tam_max = 10; //PARA PRUEBAS
        $tam_max = 6500000;
        // $tam_max = 6414336;
        $MBexcel = $_FILES['file']['size'];
        if ($MBexcel > $tam_max) {
            $MBexcel /= 1000000;
            // echo("El tamaño del archivo es de ".$MBexcel."MB, y el maximo es de 6.41MB");
            // echo("El tamaño del archivo es de $_FILES['file']['size'], y el maximo es de 6,11MB");
            $response = new Response(EMessages::ERROR, "El tamaño del archivo que intenta subir es de <b>".$MBexcel."MB</b>, y el tamaño máximo permitido es de <b>6.41MB</b>");
            $this->json($response);
        }else{

            // echo("El tamaño del archivo ESTA BIEN ");
            $request = $this->request;
            $storage = new Storage();
            //Se activa la asignación de un prefijo para nuestro archivo...
            $storage->setPrefix(true);
            //Seteamos las extenciones válidas...
            $storage->setValidExtensions("xlsx", "xls");
            //Subimos el archivo...
            $storage->process($request);
            //Obtenemos el log de los archivos subidos...
            $files    = $storage->getFiles();
            $response = null;
            if (count($files) > 0) {
                $project  = $files[0];
                $response = new Response(EMessages::SUCCESS, "Se ha subido el archivo correctamente", $project);
            } else {
                $response = new Response(EMessages::ERROR_ACTION, "No se pudo subir el archivo.");
            }
        $this->json($response);
        }
    }

    public function countLinesFile() {
        error_reporting(E_ERROR);
        $request = $this->request;
        $file = $request->file;
        //fecha Actual
        date_default_timezone_set("America/Bogota");
        $f_actual_hora = date('Y-m-d H:i:s');
        $pesoKb = filesize($file) / 1000;

        $response = new Response(EMessages::SUCCESS);
        try {
            //Se procesa el archivo de comentarios...
            set_time_limit(-1);
            ini_set('memory_limit', '1500M');
            require_once APPPATH . 'models/bin/PHPExcel-1.8.1/Classes/PHPExcel/Settings.php';
            $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
            $cacheSettings = array(' memoryCacheSize ' => '15MB');
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
            $this->load->model('bin/PHPExcel-1.8.1/Classes/PHPExcel');

            $inputFileType = PHPExcel_IOFactory::identify($file);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);

            $objPHPExcel = $objReader->load($file);
            //
            $sheet = $objPHPExcel->getSheet(0);
            $row = 1;
            $validator = new Validator();
            while ($validator->required("", $this->getValueCell($sheet, "A" . $row))) {
                $row++;
            }
            $highestRowSheet1 = $row;

            $lines = [
                "sheet1" => $highestRowSheet1,
            ];

            $response->setData($lines);
            $this->json($response);
        } catch (DeplynException $ex) {
            $this->json($ex);
        }
    }

    public function processData() {
        error_reporting(E_ERROR);
        $request = $this->request;
        $response = new Response(EMessages::SUCCESS);
        $file = $request->file;

        //Verificamos si el archivo existe...
        if (file_exists($file)) {
            //Iniciamos el procedimiento de carga de datos...
            set_time_limit(-1);
            ini_set('memory_limit', '1500M');
            require_once APPPATH . 'models/bin/PHPExcel-1.8.1/Classes/PHPExcel/Settings.php';
            require_once APPPATH . 'models/bin/PHPExcel-1.8.1/Classes/PHPExcel/IOFactory.php';
            $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
            $cacheSettings = array(' memoryCacheSize ' => '15MB');
            PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
            PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

            try {
                //se envia el reporte automatico
                // $this->enviar_correo_cant_reportes_actualizacion();
                // envio de reportte automatico semanal...
                // $res_mail = $this->enviar_correo_cant_reportes_actualizacion();

                $inputFileType = PHPExcel_IOFactory::identify($file);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objReader->setReadDataOnly(true);
                //Leer el archivo...
                $objPHPExcel = $objReader->load($file);

                //Cambiar el archivo...
                // $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExce, $inputFileTypel);
                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

                //Obtenemos la página.
                $sheet = $objPHPExcel->getSheet(0);
                //Obtenemos el highestRow...
                $highestRow = 0;
                $row = $request->index;
                $limit = $row + $request->limit;
                $inserts = 0;
                $cnt_nvos = 0;
                $borrados = 0;
                $errores = "";
                $cantArchivos = $request->cantArchivos;


                $export = $request->export;

                //fecha Actual
                date_default_timezone_set("America/Bogota");
                $fActual = date('Y-m-d');
                $fActual_hora = date('Y-m-d H:i:s');
                $list_ing   = $this->Dao_user_model->getArrayAllEngineers();

                //Inicializamos un objeto de PHPExcel para escritura...
                //while para recorrer filas del excel...
                while ($this->getValueCell($sheet, 'A' . $row) > 0 && ($row < $limit)) {

                    $data_insert_sitio = array(
                        'ID_Site_Access' => $this->getValueCell($sheet, 'K' . $row),
                        'F_H_Solicitud' => $this->getDatePHPExcel($sheet, 'B' . $row),
                        'Estacion' => $this->id_parametrica($this->getValueCell($sheet, 'L' . $row), 'estacion'),
                        'Tecnologia' => $this->id_parametrica($this->getValueCell($sheet, 'M' . $row), 'tecnologia'),
                        'Banda' => $this->id_parametrica($this->getValueCell($sheet, 'N' . $row), 'banda'),
                        'Ente_ejecutor' => $this->getValueCell($sheet, 'X' . $row),
                        'Nombre_grupo_skype' => $this->getValueCell($sheet, 'E' . $row),
                        'Regional_skype' => $this->getValueCell($sheet, 'I' . $row),
                        'Persona_solicita' => $this->getValueCell($sheet, 'Z' . $row),//lider de cuadrilla
                        'Hora_apertura' => $this->getDatePHPExcel($sheet, 'G' . $row),
                        'Ingeniero_CreadorG' => $this->getValueCell($sheet, 'D' . $row),
                        'Incidente' => $this->getValueCell($sheet, 'AZ' . $row),
                        'hora_solicitud' => $this->getDatePHPExcel($sheet, 'C' . $row),
                    );

                    $data_insert_actividad = array(
                        'id_vm_zte' => 0,
                        'id_tipo_trabajo' => $this->id_parametrica($this->getValueCell($sheet, 'O' . $row), 'tipo_trabajo'),
                        'estado_vm' => $this->getValueCell($sheet, 'P' . $row),
                        'ap_motivo_estado' => $this->getValueCell($sheet, 'Q' . $row),
                        'ap_ingeniero_apertura' => $this->cedula_del_inegeniero($this->getValueCell($sheet, 'AK' . $row), $list_ing),
                        'ap_inicio_programado_sa' => $this->getDatePHPExcel($sheet, 'AE' . $row),
                        'ap_fin_programado_sa' => $this->getDatePHPExcel($sheet, 'AF' . $row),
                        'ap_tecnologias_afectadas' => $this->id_parametrica($this->getValueCell($sheet, 'AH' . $row), 'tecnologia'),
                        'ap_bandas_afectadas' => $this->id_parametrica($this->getValueCell($sheet, 'AI' . $row), 'banda'),
                        'ap_persona_solici_vm_lc' => $this->getValueCell($sheet, 'F' . $row),
                        'ap_ente_ejecutor' => $this->getValueCell($sheet, 'X' . $row),
                        'ap_fm_nokia' => $this->getValueCell($sheet, 'AB' . $row),
                        'ap_fm_claro' => $this->getValueCell($sheet, 'AC' . $row),
                        'ap_telefono_fm' => $this->getValueCell($sheet, 'BR' . $row),
                        'ap_wp' => $this->getValueCell($sheet, 'T' . $row),
                        'ap_crq' => $this->getValueCell($sheet, 'R' . $row),
                        'ap_id_rf_tool' => $this->getValueCell($sheet, 'S' . $row),
                        'ap_bsc_name' => $this->getValueCell($sheet, 'U' . $row),
                        'ap_rnc_name' => $this->getValueCell($sheet, 'V' . $row),
                        'ap_servidor_mss' => $this->getValueCell($sheet, 'AO' . $row),
                        'ap_integrador_backoffice' => $this->getValueCell($sheet, 'AD' . $row),
                        'ap_regional_cluster' => $this->getValueCell($sheet, 'W' . $row),
                        'ap_vistas_mm' => $this->getValueCell($sheet, 'AG' . $row),
                        'ap_hora_atencion_vm' => $this->getValueCell($sheet, 'AP' . $row),
                        'ap_hora_inicio_real_vm' => $this->getValueCell($sheet, 'J' . $row),
                        'ap_contratista' => $this->getValueCell($sheet, 'Y' . $row),
                        'ap_comentarios_apertura' => $this->getValueCell($sheet, 'AJ' . $row),
                        'pc_ingeniero_control' => $this->cedula_del_inegeniero($this->getValueCell($sheet, 'AU' . $row), $list_ing),
                        'pc_hora_revision' => $this->getValueCell($sheet, 'AS' . $row),
                        'pc_comentarios_control' => $this->getValueCell($sheet, 'AT' . $row),
                        'c_ret' => $this->getValueCell($sheet, 'BN' . $row),
                        'c_ampliacion_dualbeam' => $this->getValueCell($sheet, 'BO' . $row),
                        'c_sectores_dualbeam' => $this->getValueCell($sheet, 'BP' . $row),
                        'c_tipo_solucion' => $this->getValueCell($sheet, 'BQ' . $row),
                        'c_sub_estado' => $this->getValueCell($sheet, 'AM' . $row),
                        'c_inicio_vm_encontro' => $this->getValueCell($sheet, 'Q' . $row),//motivo del estado
                        'c_fallla_final' => $this->getValueCell($sheet, 'AL' . $row),
                        'c_tipo_falla_final' => $this->getValueCell($sheet, 'AN' . $row),
                        'c_vista_mm' => $this->getValueCell($sheet, 'AG' . $row),
                        'c_estado_notificacion' => $this->getValueCell($sheet, 'BL' . $row),
                        'c_ingeniero_cierre' => $this->cedula_del_inegeniero($this->getValueCell($sheet, 'BM' . $row), $list_ing),
                        'c_hora_atencion_cierre' => $this->getValueCell($sheet, 'AV' . $row),
                        'c_hora_cierrre_confirmado' => $this->getValueCell($sheet, 'AW' . $row),
                        'c_comentario_cierre' => $this->getValueCell($sheet, 'AY' . $row),
                    );

                    // inserto los campos a la tabla sitio
                    $se_insert_sitio = $this->Dao_sitio_model->insert_sitio($data_insert_sitio);
                    // si se inserto se suma al contador de insertados, si no se inserto se captura el error
                    if (is_numeric($se_insert_sitio)) {
                        $data_insert_actividad['id_vm_zte'] = $se_insert_sitio;
                        // inserto los campos a la tabla actividad
                        $se_insert_actividad = $this->Dao_actividad_model->insert_actividad($data_insert_actividad);
                        if ($se_insert_actividad === 1) {
                            $cnt_nvos += $se_insert_actividad;
                        } else {
                            $errores .= "insert_actividad => ticket " . $this->getValueCell($sheet, 'A' . $row) . " $se_insert_actividad<br>";
                        }
                    } else {
                        $errores .= "insert_sitio => ticket " . $this->getValueCell($sheet, 'A' . $row) . " $se_insert_sitio<br>";
                    }

                    $row++;
                }

                if (($limit - $row) > 2) {
                    $response->setCode(2);
                }

                $response->setData([
                    "nuevos" => $inserts,
                    "nuevos" => $cnt_nvos,
                    "borradas" => $borrados,
                    "row" => ($row - $request->index),
                    "data" => $this->objs,
                    "correo_enviado" => $res_mail,
                    "cantArchivos" => $cantArchivos,
                    "errores" => $errores
                ]);
            } catch (DeplynException $ex) {
                $response = new Response(EMessages::ERROR, "Error al procesar el archivo.");
            }
        } else {
            $response = new Response(EMessages::ERROR, "No se encontró el archivo " . $file);
        }

        $this->json($response);
        // $this->load->view('viewRF');
    }

    private function getValueCell(&$sheet, $cell) {
        $string = str_replace(array("\n", "\r", "\t"), '', $sheet->getCell($cell)->getValue());
        $string = str_replace(array("_x000D_"), "<br/>", $sheet->getCell($cell)->getValue());
        return $string;
    }

    private function getDatePHPExcel($sheet, $colum) {
        $cell = $sheet->getCell($colum);
        $validator = new Validator();
        $date = DB::NULLED;
        if ($validator->required("", $cell->getValue())) {
            $date = $cell->getValue();
            $date = date("Y-m-d H:i:s", PHPExcel_Shared_Date::ExcelToPHP($date));
            $date = Hash::addHours($date, 5);
        }
        if ($date == "NULLED") {
            $date = "0000-00-00 00:00:00";
        }
        if ($date == "1970-01-01 00:00:00") {
            $date = "1900-01-02 00:00:00";
        }
        return $date;
    }

    // funcion para buscar un nombre en una tabla dada en la base de datos
    // si no existe ese nombre en la db se inserta como nuevo registro
    // recibe 2 parametros, $nombre(lo que vamos a buscar), $tabla(tabla de la bd donde vamos a buscar, se inserta si no existe el nombre)
    // retorna el id del registro
    private function id_parametrica($nombre, $tabla) {
        $res = $this->Dao_temp_model->get_name_in_table($nombre, $tabla); // busca el nombre en la  tabla
        if ($res) {
            return $res->id;
        } else {
            return $this->Dao_temp_model->insert_in_table($nombre, $tabla);
        }
    }

    //calcula la cedula de los ingenieros a base del nombre dado en el excel
    private function cedula_del_inegeniero($nombre, $ingenieros) {
        $nombreP = strtoupper(str_replace(array("\n", "\r", "\t", ".", " "), '', $nombre));
        for ($i = 0; $i < count($ingenieros); $i++) {
            if ($nombreP == strtoupper(str_replace(array("\n", "\r", "\t", ".", " "), '', $ingenieros[$i]['name']))) {
                return $ingenieros[$i]['id'];
            }
        }

        $this->load->helper('camilo');

        $posible = comparationsNames($ingenieros, $nombre);
        if ($posible) {
            $inge = $this->Dao_user_model->get_user_by_concat_name($posible);
            return $inge->k_id_user;
        } else {
            return '3';
        }
    }

}

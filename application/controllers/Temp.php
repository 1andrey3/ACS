<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('data/Dao_temp_model');
		$this->load->helper('camilo');
	}


	// trae la ultima fecha de actualizacion
	public function getLastDateTemp(){
		$data = $this->Dao_temp_model->getTableTempMax();
		$retur = ($data) ? $data->actualizada : 'Ningun registro exportado';
		echo json_encode($retur);
	}

	// valida si existe una tabla en la base de datos
	public function exist_table(){
		$tabla = $this->input->post('tabla');
		$existe = $this->Dao_temp_model->m_exist_table($tabla);
		//  Valido si existe la tabla que deberia crearse en la base de datos
		if ($existe) {
			$registros = $this->Dao_temp_model->cant_registros($tabla);
			if ($registros > 0) {
				// validacion de la informacion
				$res = $this->load_information($tabla);

			} else {
				$res =	-2;	 //'La tabla exportada no tiene registros';
			}
		} else {
			$res = -1;	//'La tabla no fue exportada correctamente';
		}

		echo json_encode($res);
	}


	// tratamiento de la informacion al exportar una data nueva
	private function load_information($tabla){
		
		// $array_ticket = $this->Dao_ticket_model->getAllTickets(); // arreglo de la tabla ppal (ticket)
		$temp         = $this->Dao_temp_model->getAllTempFO($tabla); // objeto tabla temporal
		if (!$temp) {
			return -2;
		}
		$array_temp   = $temp->result(); // arreglo tabla temporal solo seguimiento FO
		$cant_temp    = $temp->num_rows(); // cantidad de elementos de array_temp
		
		// variables para verificar la finalidad del proceso
		$cnt_nvos = 0;
		$cnt_mod  = 0;
		$borrados  = -5;
		$errores  = "";

		// Campos para calcular la fecha actual
		date_default_timezone_set("America/Bogota");
		$f_actual_hora = date('Y-m-d H:i:s');
		$f_actual      = date('Y-m-d');


		// Recorrer las filas del array de temporal
		for ($i=0; $i < $cant_temp; $i++) {
			$ticket = $this->Dao_ticket_model->getTicketById($array_temp[$i]->id_on_air);// para verificar si existe
			// CODIGO PARA PROCESAR SI EXISTE EL REGISTRO
			if ($ticket) {
				$flag = false;// variable para validar si cambia correcionesptes y tambien subestado para controlar contadores
				// Validar si la fecha de correcciones ptes ha cambiado
				if ($array_temp[$i]->correccionpendientes != $ticket->correccion_pendiente) {
					// si cambió se deben calcular de nuevo la nueva fecha ingreso y por ende los sla
					$nva_fecha_base =  $this->horario_habil($array_temp[$i]->correccionpendientes);
					$sla_pre = $this->get_sla($nva_fecha_base);
					$sla_12 = $this->get_sla_seguimiento($sla_pre);
					$sla_24 = $this->get_sla_seguimiento($sla_12);
					$sla_36 = $this->get_sla_seguimiento($sla_24);

					$new_slas = array(
						'id_onair'             => $ticket->id_onair,
						'nueva_fecha_ingreso'  => $nva_fecha_base,
						'correccion_pendiente' => $nva_fecha_base,
						'sla_precheck'         => $sla_pre,
						'sla_12_horas'         => $sla_12,
						'sla_24_horas'         => $sla_24,
						'sla_36_horas'         => $sla_36
					);

					$se_update_correcciones = $this->Dao_ticket_model->update_ticket($new_slas);
					// si se actualiza bien se suma contador, sino se concatena el error
					if ($se_update_correcciones === 1) {
						// si se actualizó se inserta el log
						$data_new_log = array(
							'id_onair'    => $ticket->id_onair,
							'antes'       => $ticket->correccion_pendiente,
							'ahora'       => $array_temp[$i]->correccionpendientes,
							'columna'     => 'correccion_pendiente',
							'fecha_mod'   => $f_actual_hora,
							'usuario_mod' => 123,
							'duracion'    => null
						);
						
						$se_insert_log = $this->Dao_log_model->insert_log($data_new_log);

						$flag = true;
						$cnt_mod ++;
					} else {
						$errores .= "update => ticket " . $array_temp[$i]->id_on_air . " $se_update_correcciones<br>";
					}

				}				

				// SE VALIDA SI EL SUBESTADO ES EL MISMO
				$id_sub_temp = $this->id_parametrica($array_temp[$i]->Subestado ,'subestado');
				if ($ticket->id_subestado == $id_sub_temp) {
					// si el subestado es igual validamos en prorroga de access
					// SI ESTÁ EN PRORROGA se desasigna, se deja pendiente y se actualiza columna en prorroga
					if ((str_replace(array("\n", "\r", "\t","<br/>"), '', $array_temp[$i]->En_Prorroga) == 'VERDADERO' || str_replace(array("\n", "\r", "\t","<br/>"), '', $array_temp[$i]->En_Prorroga) == 'TRUE') && $array_temp[$i]->En_Prorroga != $ticket->en_prorroga) {

							// SE ACTUALIZA(subestado, ultfecharev,estado_ejecucion, se desasigna, en_prorroga)
							$en_pro = array(
								'id_onair'              => $ticket->id_onair,
								'fecha_ultima_revision' => $array_temp[$i]->Fechaultimarev,
								'estado_ejecucion'      => 'pendiente',
								'en_prorroga'           => $array_temp[$i]->En_Prorroga,
								'usuario_asignado'      => null
							);
							$se_update_pro = $this->Dao_ticket_model->update_ticket($en_pro);
							// si se actualiza bien se suma contador, sino se concatena el error
							if ($se_update_pro === 1) {
								if (!$flag) {// si flag es false quiere decir que no entro al if de correcciones ptes entonces puede aumentar el contador
									$cnt_mod += $se_update_pro;
								}
							} else {
								$errores .= "update => ticket " . $array_temp[$i]->id_on_air . " $se_update_pro<br>";
							}

					}// SI NO ESTÁ EN PRORROGA SE DEJA IGUAL

				}
				// SI EL SUBESTADO ES DISTINTO
				// SI ES DISTINTO SIGNIFICA QUE ACTUALIZARON EN ACCESS PERO NO EN ZOLID
				else{
					// SE ACTUALIZA(subestado, ultfecharev,estado_ejecucion, se desasigna, en_prorroga)
					$up_ticket = array(
						'id_onair'              => $ticket->id_onair,
						'id_subestado'          => $id_sub_temp,
						'fecha_ultima_revision' => $array_temp[$i]->Fechaultimarev,
						'estado_ejecucion'      => 'pendiente',
						'en_prorroga'           => 'VERDADERO',
						'usuario_asignado'      => null
					);
					$se_update = $this->Dao_ticket_model->update_ticket($up_ticket);
					// si se actualiza bien se suma contador, sino se concatena el error
					if ($se_update === 1) {
						if (!$flag) {
							$cnt_mod += $se_update;
						}
					} else {
						$errores .= "update => ticket " . $array_temp[$i]->id_on_air . " $se_update<br>";
					}

					//SE INSERTA EL CAMBIO EN LOG
					$data_log = array(
						'id_onair'    => $ticket->id_onair,
						'antes'       => $ticket->id_subestado,
						'ahora'       => $id_sub_temp,
						'columna'     => 'subestado',
						'fecha_mod'   => $f_actual_hora,
						'usuario_mod' => 123,
						'duracion'    => null
					);

					$se_insert_log = $this->Dao_log_model->insert_log($data_log);

				}
				$col_actualizar = $this->Dao_ticket_model->update_ticket(array('id_onair' => $ticket->id_onair,'actualizado' => $tabla));

			// SI NO EXISTE EL REGISTRO DE TEMP EL LA TABLA TICKET
			} else {

				$fecha_base = $this->horario_habil($this->nueva_fecha_ingreso($array_temp[$i]->fecha_ingreso_on_air, $array_temp[$i]->correccionpendientes));
				$sla_pre = $this->get_sla($fecha_base);
				$sla_12 = $this->get_sla_seguimiento($sla_pre);
				$sla_24 = $this->get_sla_seguimiento($sla_12);
				$sla_36 = $this->get_sla_seguimiento($sla_24);



				$data_insert = array(
				'id_onair'              => $array_temp[$i]->id_on_air,
				'id_tipo_trabajo'       => $this->id_parametrica($array_temp[$i]->Tipo_de_Trabajo, 'tipo_trabajo'),
				'id_subestado'          => $this->id_parametrica($array_temp[$i]->Subestado ,'subestado'),
				'id_tecnologia'         => $this->id_parametrica($array_temp[$i]->Tecnologia ,'tecnologia'),
				'id_banda'              => $this->id_parametrica($array_temp[$i]->Banda ,'banda'),
				'id_ciudad'             => $this->calcular_ciudad_region($array_temp[$i]->Ciudad, $array_temp[$i]->Regional_Ciudad),
				'id_estacion'           => $this->id_parametrica($array_temp[$i]->nombre_estacion ,'estacion'),
				'fecha_ingreso_onair'   => $array_temp[$i]->fecha_ingreso_on_air,
				'fecha_ultima_revision' => $array_temp[$i]->Fechaultimarev,
				'en_prorroga'           => $array_temp[$i]->En_Prorroga,
				'correccion_pendiente'  => $array_temp[$i]->correccionpendientes,
				'usuario_asignado'      => null,
				'nueva_fecha_ingreso'   => $fecha_base,
				'puntos'                => null, // definir
				'sla_precheck'          => $sla_pre, // definir
				'sla_12_horas'          => $sla_12, // definir
				'sla_24_horas'          => $sla_24, // definir
				'sla_36_horas'          => $sla_36, // definir
				'estado_ejecucion'      => 'pendiente',
				'actualizado'     		=> $tabla
				);

				// inserto los campos a la tabla ticket
				$se_insert = $this->Dao_ticket_model->insert_ticket($data_insert);
				// si se inserto se suma al contador de insertados, si no se inserto se captura el error
				if ($se_insert === 1) {
					$cnt_nvos += $se_insert;
				} else {
					$errores .= "insert => ticket " . $array_temp[$i]->id_on_air . " $se_insert<br>";
				}

			}// fin si no existe el refistro

		}// fin for de recorrido y comparacion

		$this->load->helper('camilo');
		$num_drop_menor = numeros_en_string($tabla) - 1;
		$borrados = $this->Dao_ticket_model->delete_ticket_by_actualizado($num_drop_menor);

		// Si al finalizar el proceso hay mas de 0 campos insertados o modificados
		if ($cnt_nvos > 0 || $cnt_mod > 0 || $borrados > 0) {
			// Inserto la nueva tabla activa en la tabla tem de bd
			$tabla_activa = $this->Dao_temp_model->insert_new_export($tabla, $f_actual_hora);

			if ($tabla_activa !== 1 ) {
				$errores .= "\n TABLA TEMPORAL NO FUE ACTUALIZADA => comunicarse con area de desarrollo.";
			} else {

				// se debe eliminar la tabla anterior a la que se exportó
				$num_drop_mayor = numeros_en_string($tabla) + 1;
				$this->Dao_temp_model->drop_table_temp("export_$num_drop_menor");// se elimina la tabla de la db
				$this->Dao_temp_model->drop_table_temp("export_$num_drop_mayor");// si se creo por error una tabla mayor... se elimina

			}
			// retorno las cantidades y errores capturados durante el proceso 
			$retornar = array('nuevos' => $cnt_nvos, 'actualizados' => $cnt_mod, 'errores' => $errores, 'borrados' => $borrados);
		} else {
			$this->Dao_temp_model->drop_table_temp($tabla);
			$this->Dao_ticket_model->reestablecer_actualizado($num_drop_menor);
			$retornar = array('error' => 'error'); // no se actualizó ningun campo ni se inserto
		}

		//*************** ELIMINAR REGISTROS Q NO EXISTEN EN LA DATA ***************
		return $retornar;
		
	}

	// funcion para buscar un nombre en una tabla dada en la base de datos
	// si no existe ese nombre en la db se inserta como nuevo registro
	// recibe 2 parametros, $nombre(lo que vamos a buscar), $tabla(tabla de la bd donde vamos a buscar, se inserta si no existe el nombre)
	// retorna el id del registro
	private function id_parametrica($nombre, $tabla){
	    $res = $this->Dao_temp_model->get_name_in_table($nombre, $tabla); // busca el nombre en la  tabla
	    if ($res) {
	    	return $res->id;
	    } else {
	    	return $this->Dao_temp_model->insert_in_table($nombre, $tabla);
	    }
	}

	// retorna el id de la ciudad dada, sino existe lo inserta, ysi regional no existe la inserta
	private function calcular_ciudad_region($city, $region){
	    $res = $this->Dao_ciudad_model->getCityByName($city);
	    if ($res) {
	     	return $res->id_ciudad;
	    } 
	     // si no existe la ciudad
	    else {
	     	// valiadr si existe la region
	     	$reg = $this->Dao_region_model->getRegionByName($region);
	     	// si existe region pero no la ciudad se inserta la ciudad
	     	if ($reg) {
	     		$ins_city = $this->Dao_ciudad_model->insert_city($city, $reg->id_region);
	     		return $ins_city;
	     	} 
	     	// si no existe region ni ciudad
	     	else {
	     		$ins_reg = $this->Dao_region_model->insert_region($region);
	     		$in_city = $this->Dao_ciudad_model->insert_city($city, $ins_reg);
	     		return $in_city;
	     	}

	    }
	}

	// retorna la nueva_fecha_ingreso calculada
	private function nueva_fecha_ingreso($f_ingreso, $f_correccion){
	    if ($f_correccion) {
	      	return $f_correccion;
	      }  else {
	      	return $f_ingreso;
	      }
	}

	// retorna la fecha en horario de 6 a 22 horas habiles si está fuera del rango
	private function horario_habil($fecha){
	    $format = new DateTime($fecha);
	    $hora = $format->format('H:i:s');
	    // valido la hora a la que llego
	    if ($hora < '06:00:00') {
	    	return $format->format('Y-m-d') . " 06:00:00";
	    } else if ($hora > '22:00:00'){
	    	return sumarORestarDiasAFecha($format->format('Y-m-d'), 1, '+') . " 06:00:00";
	    } else {
	    	return $fecha;
	    }
	}

	// elimina la tabla de la base de datos
	public function js_drop_table_temp(){
		$this->Dao_temp_model->drop_table_temp($this->input->post('tabla'));
	}

	// retorna la fecha optima a entregar trabajo para notificacion 7 precheck
	private function get_sla($fecha_base){
		$fechaBase = new DateTime($fecha_base);
		$dif = new DateTime(sumar_restar_hh_mm_ss_a_hora('22:00:00', '-', $fechaBase->format('H'), $fechaBase->format('i'), $fechaBase->format('s')));
		if ($dif->format('H:i:s') > '12:00:00') {
			$sla = sumar_restar_hh_mm_ss_a_fecha($fecha_base, '+', 12);
		} else {
			$dif2 = sumar_restar_hh_mm_ss_a_hora('18:00:00', '-', $dif->format('H'), $dif->format('i'),$dif->format('s'));
			$sla = sumarORestarDiasAFecha($fechaBase->format('Y-m-d'), 1, '+') . " " . $dif2;
		}
		return $sla;
	}

	// retorna el sla calculado para una actividad de seguimiento
	private function get_sla_seguimiento($fechaBase){
	    $this->load->helper('camilo');
		$sumada = new DateTime(sumar_restar_hh_mm_ss_a_fecha($fechaBase,'+',12));
		$base = new DateTime($fechaBase);
		if ($sumada->format('d') == $base->format('d') && $sumada->format('H:i:s') <= '18:00:00') {
			$sla = $sumada->format('Y-m-d H:i:s');
		} else {
			$diferencia = date_diff(date_create('18:00:00'),date_create($base->format('H:i:s')));
			$restante = sumar_restar_hh_mm_ss_a_hora('12:00:00', '-',$diferencia->format('%H'),$diferencia->format('%I'),$diferencia->format('%S'));
			$div = explode(':', $restante);
			$sla = sumarORestarDiasAFecha($fechaBase, 1, '+') . " " . sumar_restar_hh_mm_ss_a_hora('06:00:00', '+', $div[0], $div[1], $div[2]);
		}
		return $sla;
	}

	// //
	// public function prueba(){
	// 	$data = array(
	// 		'nombre' => 'xxxx',
	// 		'activo' => 'no',
	// 		'actualizada' => '2018-04-12'
	// 	);

	// 	$res = $this->Dao_temp_model->m_prueba($data);
		
	// }


  
}


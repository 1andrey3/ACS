<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_actividad_model extends CI_Model {

    public function __construct() {

    }

    // inserta registro en tabla ticket
    public function insert_actividad($data) {
        if ($this->db->insert('actividad', $data)) {
            return 1;
        } else {
            $error = $this->db->error();
            return $error['message'];
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dao_sitio_model extends CI_Model {

    public function __construct() {

    }

    // inserta registro en tabla sitio
    public function insert_sitio($data) {
        if ($this->db->insert('sitio', $data)) {
            return $this->db->insert_id();
        } else {
            $error = $this->db->error();
            return $error['message'];
        }
    }

}

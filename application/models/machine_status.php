<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  machine_status.php
    *  2009.03.10
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  class Machine_status extends CI_Model {

    // All columns except id
    var $mech_name = '';
    var $mech_status_basic = '';
    var $mech_uptime = '';
    var $mech_load1 = '';
    var $mech_load2 = '';
    var $mech_load3 = '';

    // Default Constructor
    function __construct() {
        parent::__construct();
    }

    // Returns basic status for requested machine
    function get_basic($name) {
      $this->db->select('mech_status_basic')->from('machine_statuss');
      $query = $this->db->get();
      return $query->result_array();
    }
  }

/* DPW */
/* END OF CODE */

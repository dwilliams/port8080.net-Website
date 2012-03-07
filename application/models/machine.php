<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  machine.php
    *  2009.03.10
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  class Machine extends CI_Model {

    // All columns except id
    var $mech_name = '';
    var $mech_desc = '';
    var $mech_desc_short = '';
    var $mech_thumb = '';

    // Default Constructor
    function __construct() {
        parent::__construct();
    }

    // Pull a number of entries from the table
    // Returns a 2D associative array
    function get_list() {
        $this->db->select('mech_name, mech_desc_short, mech_thumb')->from('machines')->order_by("mech_name", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    // Pull all of the data on a machine
    // Returns a 2D associative array
    function get_details($mech_name) {
      $this->db->select('mech_name, mech_desc, mech_thumb, id')->from('machines')->where('mech_name', $mech_name);
      $query = $this->db->get();
      return $query->result_array();
    }

    // Insert post into database
    function insert_entry($name, $desc = "", $desc_short = "", $thumb = "") {
        $this->mech_name = $name;
        $this->mech_desc = $desc;
        $this->mech_desc_short = $desc_short;
        $this->mech_thumb = $thumb;

        $this->db->insert('machines', $this);
    }

    // Update post in database
    function update_entry($name, $desc = "", $desc_short = "", $thumb = "", $user_id) {
        $this->mech_name = $name;
        $this->mech_desc = $desc;
        $this->mech_desc_short = $desc_short;
        $this->mech_thumb = $thumb;

        $this->db->update('machines', $this, array('id' => $user_id));
    }
  }

/* DPW */
/* END OF CODE */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  gas.php
    *  2010.02.10
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2010.08.06
   ***/

  class Gas extends CI_Model {

    // All columns except id
    var $vehicle_id = 0;
    var $date = '';
    var $cost = 0.0; // dollars
    var $volume = 0.0; // gallons
    var $distance = 0.0; // miles

    // Default Constructor
    function __construct() {
      parent::__construct();
      $this->date = date('Y-m-d');
    }

    // Pull a number of entries from the table
    function get_last_fillups($id_vehicle, $num_entries) {
      $this->db->select('vehicle_id, date, cost, volume, distance');
      $this->db->from('gas_fillups');
      $this->db->where('vehicle_id', $id_vehicle);
      $this->db->order_by('date', 'desc');
      $this->db->limit($num_entries);

      $query = $this->db->get();
      return $query->result_array();
    }

    // Insert post into database
    function insert_fillup($id_vehicle, $num_cost, $num_volume, $num_distance) {
      $this->vehicle_id = $id_vehicle;
      $this->cost = $num_cost;
      $this->volume = $num_volume;
      $this->distance = $num_distance;

      $this->db->insert('gas_fillups', $this);
    }
  }

/* DPW */
/* END OF CODE */

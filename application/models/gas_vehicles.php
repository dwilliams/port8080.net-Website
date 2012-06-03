<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  gas_vehicles.php
    *  2010.08.06
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2010.08.06
   ***/

  class Gas_vehicles extends CI_Model {

    // All columns except id
    var $make = '';
    var $model = '';
    var $year = ''; // Four digit year
    var $color = ''; // Three letter DMV code
    var $name = '';

    // Default Constructor
    function __construct() {
      parent::__construct();
    }

    // Pull vehicle infomation from the table
    //   if $id <= 0, list all vehicles
    function get_vehicles($id_vehicle = 0) {
      $this->db->select('id, make, model, year, color, name');
      $this->db->from('gas_vehicles');
      if($id_vehicle > 0) {
        $this->db->where('id', $id_vehicle);
      }
      $this->db->order_by('id', 'desc');

      $query = $this->db->get();
      return $query->result_array();
    }

    // Shouldn't need to post, can enter vehicles directly into DB
    /*
    // Insert post into database
    function insert_fillup($id_vehicle, $num_cost, $num_volume, $num_distance) {
      $this->vehicle_id = $id_vehicle;
      $this->cost = $num_cost;
      $this->volume = $num_volume;
      $this->distance = $num_distance;

      $this->db->insert('gas_fillups', $this);
    }
    */
  }

/* DPW */
/* END OF CODE */

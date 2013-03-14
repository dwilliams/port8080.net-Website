<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /***
    *  rest.php
    *  2013.03.07
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2013.03.14
   ***/
  
  // ReSTful API for Port8080.net
  
  // Using the library by philsturgeon available at:
  // https://github.com/philsturgeon/codeigniter-restserver
  require(APPPATH . 'libraries/REST_Controller.php');
  
  class Rest extends REST_Controller {
    function __construct() {
      parent::__construct();
      
      // Load needed things here
    }
    
    // Gas functions for reporting petrol usage
    function gas_get() {
      $this->load->model('gas_vehicles');
      $this->load->model('gas');
      
      if(!$this->get('vehicle') || (int)$this->get('vehicle') <= 0) {
        // Add in a validation to make sure this is an integer
        $this->response(array('error' => 'No entity specified'), 400);
      }
      $num_entries = 10;
      if((int)$this->get('num')) {
        // Add in a validation to make sure this is an integer
        $num_entries = (int)$this->get('num');
      }
      $vehicle = $this->gas_vehicles->get_vehicles((int)$this->get('vehicle'));
      // Need to use $vehicles[0]['id'] as $vehicles is a 2D array
      $gas = $this->gas->get_last_fillups($vehicle[0]['id'], $num_entries);
      if($vehicle) {
        $this->response($gas, 200);
      }
      $this->response(array('error' => 'Entity Not Found'), 404);
    }
    function gas_put() {
      $this->load->model('gas');
      
      // Should check to make sure the vehicle is valid in the DB
      if(!$this->get('vehicle') || (int)$this->get('vehicle') <= 0) {
        $this->response(array('error' => 'No entity specified'), 400);
      }
      // Need better checks for these: above zero, not unreasonable
      if(!is_numeric($this->get('cost'))) {
        $this->response(array('error' => 'No entity specified', 'debug' => $this->get('cost')), 400);
      }
      if(!is_numeric($this->get('volume'))) {
        $this->response(array('error' => 'No entity specified', 'debug' => $this->get('volume')), 400);
      }
      if(!is_numeric($this->get('distance'))) {
        $this->response(array('error' => 'No entity specified', 'debug' => $this->get('distance')), 400);
      }
      
      // Could probably stand a little improvement here, but it works
      $insert_id = $this->gas->insert_fillup((int)$this->get('vehicle'), $this->get('cost'), $this->get('volume'), $this->get('distance'));
      if($insert_id && $insert_id > 0) {
        $this->response($this->gas->get_last_fillups($this->get('vehicle'), 1), 201);
      }
      $this->response(array('error' => 'Entity Not Found'), 404);
    }
    function gas_post() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function gas_delete() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    
    // Vehicle functions for reporting petrol usage
    function vehicle_get() {
      $this->load->model('gas_vehicles');
      
      if(!$this->get('id') || (int)$this->get('id') <= 0) {
        // Add in a validation to make sure this is an integer
        $this->response(array('error' => 'No entity specified'), 400);
      }
      $vehicle = $this->gas_vehicles->get_vehicles((int)$this->get('id'));
      if($vehicle) {
        $this->response($vehicle, 200);
      }
      else {
        $this->response(array('error' => 'Entity Not Found'), 404);
      }
    }
    function vehicle_put() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function vehicle_post() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function vehicle_delete() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function vehicles_get() {
      $this->load->model('gas_vehicles');
      
      // Return a list of all of the vehicles
      $this->response($this->gas_vehicles->get_vehicles(), 200);
    }
    function vehicles_put() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function vehicles_post() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
    function vehicles_delete() {
      $this->response(array('error' => 'Forbidden'), 403);
    }
  }

/* DPW */
/* END OF CODE */

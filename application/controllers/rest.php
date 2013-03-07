<?php defined('BASEPATH') OR exit('No direct script access allowed');
  /***
    *  rest.php
    *  2013.03.07
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2013.03.07
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
      
      if(!$this->get('vehicle')) {
        // Add in a validation to make sure this is an integer
        $this->response(NULL, 400);
      }
      $num_entries = 10;
      if($this->get('num')) {
        // Add in a validation to make sure this is an integer
        $num_entries = $this->get('num');
      }
      $vehicle = $this->gas_vehicles->get_vehicles($this->get('vehicle'));
      // Need to use $vehicles[0]['id'] as $vehicles is a 2D array
      $gas = $this->gas->get_last_fillups($vehicle[0]['id'], $num_entries);
      if($vehicle) {
        $this->response($gas, 200);
      }
      else {
        $this->response(NULL, 404);
      }
    }
    function gas_put() {
      $this->response(array('error' => 'Forbidden'), 403);
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
      
      if(!$this->get('id')) {
        // Add in a validation to make sure this is an integer
        $this->response(NULL, 400);
      }
      $vehicle = $this->gas_vehicles->get_vehicles($this->get('id'));
      if($vehicle) {
        $this->response($vehicle, 200);
      }
      else {
        $this->response(NULL, 404);
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
    
  }

/* DPW */
/* END OF CODE */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  petrol.php
    *  2010.02.10
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2013.03.07
   ***/

  // Gas Controller for port8080

  class Petrol extends CI_Controller {
    // Default Constructor
    function __construct() {
            parent::__construct();
            
            // Load up needed things
            $this->config->load('petrol');
    }
    // Default function to run when controller is loaded
    function index() {
      // Load the gas model
      $this->load->model('Gas_vehicles');
      $this->load->model('Gas');
      // Pull posts from database
      $array_fills = array();
      $array_vehicles = $this->Gas_vehicles->get_vehicles(0);
      foreach($array_vehicles as $vehicle) {
        $array_fills[$vehicle['id']] = $this->Gas->get_last_fillups($vehicle['id'], 20);
      }
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'gas',
                    'page_title' => 'GAS :: PORT8080.NET',
                    'page_title_sub' => 'Gasoline Milage History for the things that get me around...',
                    'array_vehicles' => $array_vehicles,
                    'array_fills' => $array_fills);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('gas/page_body_gas', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    // Displays index formatted for mobile devices
    function mindex() {
      // Load the gas model
      $this->load->model('Gas_vehicles');
      $this->load->model('Gas');
      // Pull posts from database
      $array_fills = array();
      $array_vehicles = $this->Gas_vehicles->get_vehicles(0);
      foreach($array_vehicles as $vehicle) {
        $array_fills[$vehicle['id']] = $this->Gas->get_last_fillups($vehicle['id'], 1);
      }
      // Setup all the data to be shown on the webpage
      $data = array('array_vehicles' => $array_vehicles,
                    'array_fills' => $array_fills);
      // Open the page
      $this->load->view('gas/page_mobile_gas', $data);
    }

    // Display Gas Entry Screen
    function entry() {
      // Load models
      $this->load->model('Gas_vehicles');
      // Load helpers
      $this->load->helper('form');
      // Setup all the data to be shown on the webpage
      $array_vehicles = $this->Gas_vehicles->get_vehicles(0);
      $data = array('page_content' => 'gas',
                    'page_title' => 'GAS ENTRY :: PORT8080.NET',
                    'page_title_sub' => 'How much did YOU spend on petrol today?',
                    'array_vehicles' => $array_vehicles);
      // -- vehicle dropdown population array --
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('gas/page_body_gas_entry', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    // Display Mobile Gas Entry Screen
    function mentry() {
      // Load models
      $this->load->model('Gas_vehicles');
      // Load helpers
      $this->load->helper('form');
      // Setup all the data to be shown on the webpage
      $array_vehicles = $this->Gas_vehicles->get_vehicles(0);
      $data = array('array_vehicles' => $array_vehicles);
      // Open the page
      $this->load->view('gas/page_mobile_gas_entry', $data);
    }

    // Process Post to fillups
    function insert() {
      // Load models
      $this->load->model('Gas');
      // Load helpers
      $this->load->helper('url');
      // Sanitize data (move to the model)
      $id_ui = $this->input->post('ins_ui');
      $id_key = $this->input->post('ins_key');
      $id_vehicle = $this->input->post('ins_vehicle');
      $num_cost = $this->input->post('ins_cost');
      $num_volume = $this->input->post('ins_volume');
      $num_distance = $this->input->post('ins_distance');
      //echo $id_ui . ':' . $id_key . ':' . $id_vehicle . ':' . $num_cost . ':' . $num_volume . ':' . $num_distance . "<br />\n";
      // Check key (need to move this to the database. But who cares?)
      if($id_key != $this->config->item('key', 'petrol')) {
        // redirect to form on error
        // This should really be made to come from a config file...
        if($id_ui == 'm') {
          // -- redirect to mentry --
          redirect('/petrol/mentry/', 'refresh');
        } else {
          // -- redirect to entry --
          redirect('/petrol/entry/', 'refresh');
        }
      } else {
        // Insert into DB and redirct to mtable on success
        $this->Gas->insert_fillup($id_vehicle, $num_cost, $num_volume, $num_distance);
        if($id_ui == 'm') {
          // -- redirect to mindex --
          redirect('/petrol/mindex/', 'refresh');
        } else {
          // -- redirect to index --
          redirect('/petrol/index/', 'refresh');
        }
      }
    }
  }

/* DPW */
/* END OF CODE */

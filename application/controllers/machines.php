<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  machines.php
    *  2009.03.08
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  // Main Controller for port8080

  class Machines extends CI_Controller {
    // Default Constructor
    function __construct() {
            parent::__construct();
    }

    // Default function to run when controller is loaded
    function index() {
      // Load Machine model
      $this->load->model('Machine');
      $this->load->model('Machine_status');
      // Pull posts from database
      $array_mechs = $this->Machine->get_list();
      // Pull basic status for each machine
      $array_status = array();
      foreach ($array_mechs as $mech) {
        $array_status[$mech['mech_name']] = $this->Machine_status->get_basic($mech['mech_name']);
      }
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'Machines',
                    'page_title' => 'Machines of PORT8080.NET',
                    'page_title_sub' => 'The beauties that keep the environment sane...',
                    'array_mechs' => $array_mechs,
                    'array_status' => $array_status);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('machines/page_body_machine_list', $data);
      // Load the menu sidebar
      $this->load->view('machines/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    // Function to display details of each machine
    function detail($machine_name) {
      // Load Machine Model
      $this->load->model('Machine');
      //$this->load->model('Machine_stat');
      //$this->load->model('Machine_status');
      // Pull details from database for machine
      $array_details = $this->Machine->get_details($machine_name);
      // Pull machine stats out of a stats table
      //$array_stats = $this->Machine_stat->get_stats($array_details[0]['id']);
      // Pull machine status out of status table
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => $array_details[0]['mech_name'] . ' :: Machines',
                    'page_title' => $array_details[0]['mech_name'] . '.PORT8080.NET',
                    'page_title_sub' => 'One beauty that keeps the environment sane...',
                    'array_details' => $array_details);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('machines/page_body_machine_detail', $data);
      // Load the menu sidebar
      $this->load->view('machines/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }
  }

/* DPW */
/* END OF CODE */

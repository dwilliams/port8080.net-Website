<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  projects.php
    *  2009.04.05
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  // Projects Controller for port8080

  class Projects extends CI_Controller {
    // Default Constructor
    function __construct() {
            parent::__construct();
    }
    // Default function to run when controller is loaded
    function index() {
      // Load projects model
      $this->load->model('Project');
      // Pull list of projects
      $array_projects = $this->Project->get_list_projects();
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'projects',
                    'page_title' => 'Projects of PORT8080.NET',
                    'page_title_sub' => 'When power tools, beer, and the internet come together...',
                    'array_projects' => $array_projects);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('projects/page_body_project_list', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    function toc($project_id_input) {
      // Load projects model
      $this->load->model('Project');
      // Pull list of projects
      $array_steps = $this->Project->get_list_steps($project_id_input);
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'project ' . $project_id_input,
                    'page_title' => 'Project ' . $project_id_input . ' of PORT8080.NET',
                    'page_title_sub' => 'Another contraption in a few more details...',
                    'array_steps' => $array_steps);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('projects/page_body_project_toc', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    function step($project_id_input, $step_num_input) {
      // Load projects model
      $this->load->model('Project');
      // Pull list of projects
      $array_step = $this->Project->get_step($project_id_input, $step_num_input);
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'project ' . $project_id_input . ' step ' . $step_num_input,
                    'page_title' => 'Project ' . $project_id_input . ' Step ' . $step_num_input . ' of PORT8080.NET',
                    'page_title_sub' => 'Another contraption in a few more details...',
                    'array_step' => $array_step);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('projects/page_body_project_step', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }
  }

/* DPW */
/* END OF CODE */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  home.php
    *  2009.03.08
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  // Main Controller for port8080

  class Home extends CI_Controller {
    // Default Constructor
    function __construct() {
            parent::__construct();
    }
    // Default function to run when controller is loaded
    function index() {
      // Load posts model
      $this->load->model('Post');
      // Pull posts from database
      $array_posts = $this->Post->get_last_posts("home", 5);
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'home',
                    'page_title' => 'PORT8080.NET',
                    'page_title_sub' => 'A mish mash of crap from the days of my life...',
                    'array_posts' => $array_posts);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('home/page_body_blog', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }

    // Display Google Calendar
    function calendar() {
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'calendar :: home',
                    'page_title' => 'Calendar for PORT8080.NET',
                    'page_title_sub' => 'So you can figure out what I do when...');
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('home/page_body_calendar', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }
  }

/* DPW */
/* END OF CODE */

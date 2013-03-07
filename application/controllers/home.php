<?php
  /***
    *  home.php
    *  2011.12.26
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
      $this->load->view('home/page_body_archive', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }
    
    // Function to display list of old posts
    function archive() {
      // Load posts model
      $this->load->model('Post');
      // Pull posts from database
      $array_posts = $this->Post->get_all_posts("home");
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'archive',
                    'page_title' => 'PORT8080.NET',
                    'page_title_sub' => 'A mish mash of crap from the days of my life...',
                    'array_posts' => $array_posts);
      // Open the page
      $this->load->view('page_header', $data);
      // Load the title block
      $this->load->view('page_body_header', $data);
      // Load the main page
      $this->load->view('home/page_body_archive', $data);
      // Load the menu sidebar
      $this->load->view('home/page_body_sidebar', $data);
      // Close the page
      $this->load->view('page_body_footer', $data);
    }
    
    // Function to display old post
    //   Number is fed in to select post
    function post($number = 0) {
      // Check input
      if((int)$number > 0) {
        $post_num = (int)$number;
      } else {
        redirect('/home/', 'refresh');
      }
      // Load posts model
      $this->load->model('Post');
      // Pull post from database
      $array_posts = $this->Post->get_post("home", $post_num);
      // Setup all the data to be shown on the webpage
      $data = array('page_content' => 'post ' . $post_num,
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
      $data = array('page_content' => 'calendar',
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

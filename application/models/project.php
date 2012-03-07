<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  project.php
    *  2009.04.05
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  class Project extends CI_Model {

    // All columns except id
    var $project_id = '';
    var $step_num = '';
    var $step_title = '';
    var $step_body = '';
    var $step_photo = '';

    // Default Constructor
    function __construct() {
        parent::__construct();
    }

    // Pulls list of projects
    function get_list_projects() {
      $this->db->select('project_id, step_title, step_body, step_photo')->from('projects')->where('step_num', 0);
      $query = $this->db->get();
      return $query->result_array();
    }

    // Pulls list of steps
    function get_list_steps($project_id_in) {
      $this->db->select('project_id, step_num, step_title, step_photo')->from('projects')->where('project_id', $project_id_in)->order_by('step_num','asc');
      $query = $this->db->get();
      return $query->result_array();
    }

    // Pulls step
    function get_step($project_id_in, $step_num_in) {
      $this->db->select('project_id, step_num, step_title, step_body, step_photo, step_last')->from('projects')->where('project_id', $project_id_in)->where('step_num', $step_num_in)->limit(1);
      $query = $this->db->get();
      return $query->result_array();
    }
  }

/* DPW */
/* END OF CODE */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /***
    *  post.php
    *  2009.03.08
    *  http://www.port8080.net
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/

  class Post extends CI_Model {

    // All columns except id
    var $post_title = '';
    var $post_date = '';
    var $post_body = '';
    var $post_category = '';

    // Default Constructor
    function __construct() {
        parent::__construct();
    }

    // Pull a number of entries from the table
    function get_last_posts($category, $num_posts)
    {
        $this->db->select('post_title, post_date, post_body')->from('posts')->where('post_category', $category)->limit($num_posts)->order_by("post_date", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    // Insert post into database
    function insert_entry($title, $date, $body, $cat)
    {
        $this->post_title = $title;
        $this->post_date = $date;
        $this->post_body = $body;
        $this->post_category = $cat;

        $this->db->insert('posts', $this);
    }

    // Update post in database
    function update_entry($title, $date, $body, $cat, $user_id)
    {
        $this->post_title = $title;
        $this->post_date = $date;
        $this->post_body = $body;
        $this->post_category = $cat;

        $this->db->update('posts', $this, array('id' => $user_id));
    }
  }

/* DPW */
/* END OF CODE */

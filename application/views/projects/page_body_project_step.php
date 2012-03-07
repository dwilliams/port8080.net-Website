<?php
  /*** 
    *  page_body_project_list.php
    *  2009.04.05
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate a blog like entry
  // ARRAY ROW LAYOUT: (each row is an entry)
  // [ <post_title>, <post_body>, <post_date> ]
  // The array is called $array_posts[##][post_title, post_body, post_date]
  
  echo '    <div id="page_main">' . "\n";
  echo '      <div class="proj_entry">' . "\n";
  echo '        <div class="proj_entry_title">' . "\n";
  echo '          ' . $array_step[0]['step_num'] . ". " . $array_step[0]['step_title'] . "\n"; // step title
  echo '        </div>' . "\n";
  echo '        <img src="' . $array_step[0]['step_photo'] . '" alt="Top Photo for Step" class="proj_entry_photo" />' . "\n"; // step top photo
  echo '        <div class="proj_entry_desc">';
  echo '          ' . $array_step[0]['step_body'] . "\n"; // body of step
  echo '        </div>';
  echo '        <div class="clear_both"></div>';
  echo '      </div>' . "\n";
  echo '      <div class="proj_step_back">';
  if($array_step[0]['step_num'] > 0) {
    echo '          ' . anchor(site_url(array('projects','step',$array_step[0]['project_id'],$array_step[0]['step_num'] - 1)), "previous", array()) . "\n";
  } else {
    echo '        previous' . "\n";
  }
  echo '      </div>';
  echo '      <div class="proj_step_forw">';
  if($array_step[0]['step_last'] == 1) {
    echo '        next' . "\n";
  } else {
    echo '          ' . anchor(site_url(array('projects','step',$array_step[0]['project_id'],$array_step[0]['step_num'] + 1)), "next", array()) . "\n";
  }
  echo '      </div>';
  echo '      <div class="clear_both"></div>';
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

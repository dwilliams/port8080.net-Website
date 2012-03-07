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
  foreach ($array_steps as $step) {
    echo '      <div class="proj_entry">' . "\n";
    echo '        <div class="proj_entry_title">' . "\n";
    echo '          ' . anchor(site_url(array('projects','step',$step['project_id'],$step['step_num'])), $step['step_num'] . ". " . $step['step_title'], array()) . "\n"; // project title
    echo '        </div>' . "\n";
    echo '        ' . anchor(site_url(array('projects','step',$step['project_id'],$step['step_num'])), '<img src="' . $step['step_photo'] . '" alt="Photo for Step" class="proj_entry_photo" />', array()) . "\n"; // project photo
    echo '        <div class="clear_both"></div>';
    echo '      </div>' . "\n";
  }
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

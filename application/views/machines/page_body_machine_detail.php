<?php
  /*** 
    *  page_body_main.php
    *  2009.03.08
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate a blog like entry
  // ARRAY ROW LAYOUT: (each row is an entry)
  // [ <mech_name>, <desc>, <thumbnail_address> ]
  // The array is called $array_details[##][mech_name, mech_desc, mech_thumb]
  // Also array called $array_stats
  
  echo '    <div id="page_main">' . "\n";
  // Machine page here
  echo '      <div class="mech_detail_name">' . "\n";
  echo '        ' . $array_details[0]['mech_name'] . "\n";
  echo '      </div>' . "\n";
  echo '      <div class="mech_detail_thumb">' . "\n";
  echo '        <img src="' . $array_details[0]['mech_thumb'] . '" alt="Picture of ' . $array_details[0]['mech_name'] . '" class="thumbnail_200" />' . "\n";
  echo '      </div>' . "\n";
  echo '      <div class="mech_detail_desc">' . "\n";
  echo '        ' . $array_details[0]['mech_desc'] . "\n";
  echo '      </div>' . "\n";
  echo '      <div class="mech_detail_stats">' . "\n";
  echo '        <!-- STATS GO HERE -->' . "\n";
  echo '      </div>' . "\n";
  echo '      <div class="mech_detail_gallery">' . "\n";
  echo '        <!-- Gallery GO HERE -->' . "\n";
  echo '      </div>' . "\n";
  
  // End Machine page here
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

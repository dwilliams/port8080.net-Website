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
  // [ <mech_name>, <short_desc>, <thumbnail_address> ]
  // The array is called $array_mechs[##][mech_name, mech_desc_short, mech_thumb]
  
  echo '    <div id="page_main">' . "\n";
  foreach ($array_mechs as $mech) {
    echo '      <div class="mech_entry">' . "\n";
    echo '        <div class="mech_entry_name"';
    // Set background color to basic status
    // Clean up the output from the model (gross array thing)
      switch ($array_status[$mech['mech_name']][0]['mech_status_basic']) {
        case 'online':
          echo ' style="background-color: #99ff66;"';
          break;
        case 'offline':
          echo ' style="background-color: #ff9966;"';
          break;
        case 'retired':
          echo ' style="background-color: #999999;"';
          break;
        case 'upcoming':
          echo ' style="background-color: #9999ff;"';
          break;
        default:
          echo ' style="background-color: #ffff66;"';
          break;
      }
    echo '>' . "\n";
    echo '          ' . anchor(site_url(array('machines','detail',$mech['mech_name'])),$mech['mech_name'],array()) . "\n";
    echo '        </div>' . "\n";
    echo '        <div class="mech_entry_desc">' . "\n";
    echo '          ' . $mech['mech_desc_short'] . "\n";
    echo '        </div>' . "\n";
    echo '        <div class="mech_entry_thumb">' . "\n";
    echo '          ' . anchor(site_url(array('machines','detail',$mech['mech_name'])),'<img src="' . $mech['mech_thumb'] . '" alt="Picture of ' . $mech['mech_name'] . '" class="thumbnail_100" />',array()) . "\n";
    echo '        </div>' . "\n";
    echo '      </div>' . "\n";
  }
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

<?php
  /*** 
    *  page_body_sidebar.php
    *  2012.06.03
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
   
  // Navigation Menu for the home controller (page)
   
  // START MENU LIST
  $array_menu = array(anchor(base_url(), '~', array()),
                      anchor('http://webmail.port8080.net/', 'Webmail', array()),
                      'Projects of PORT8080' => array(anchor(site_url(array('projects', 'toc', '1')), 'Tube Headphone Amp', array()),
                                                      anchor(site_url(array('projects', 'toc', '2')), 'Sconce Lamp', array()),
                                                      anchor(site_url(array('projects', 'toc', '3')), 'HA-STS', array()),
                                                      anchor(site_url(array('projects', 'toc', '4')), 'Harley / Buell ECM', array()),
                                                      anchor(site_url(array('projects', 'toc', '5')), 'FTTS Tuner Pre-2012', array()),
                                                      anchor(site_url(array('projects', 'toc', '6')), 'FTTS Tuner 2012-', array())),
                      anchor('http://photography.port8080.net/', 'Photography Attempts', array()),
                      anchor(site_url(array('petrol')), 'Gas Milage', array()),
                      anchor('http://headphones.kerneldoom.com', 'Headphone Picture Gallery', array()),
                      anchor('/home/archive/', 'Post Archive'));
  // END MENU LIST
  
  // START LINK LIST
  $array_link = array(anchor('http://www.hackaday.com/', 'Hackaday', array()));
  // END LINK LIST
  
  echo '    <div id="page_sidebar">' . "\n";
  echo '      <div class="sidebar_menu">' . "\n";
  echo '        <div class="menu_header">' . "\n";
  echo '          T3H NAVAGATRON:' . "\n";
  echo '        </div>' . "\n";
  echo '        <div class="menu_body">' . "\n";
  echo ul($array_menu);
  // --- Put a header here ---
  echo '        </div>';
  echo '        <div class="menu_header">' . "\n";
  echo '          GOOD LINKS:' . "\n";
  echo '        </div>' . "\n";
  echo '        <div class="menu_body">' . "\n";
  echo ul($array_link);
  echo '        </div>' . "\n";
  echo '      </div>' . "\n";
  echo '      <div class="sidebar_menu">' . "\n";
  echo '        <div id="twitter_div">' . "\n";
  echo '          <div class="menu_header">' . "\n";
  echo '            Twitter Timeline' . "\n";
  echo '          </div>' . "\n";
  echo '          <div class="menu_body">' . "\n";
  echo '            <ul id="twitter_update_list">' . "\n";
  echo '           </ul>' . "\n";
  echo '           <a href="http://twitter.com/poostickd" id="twitter-link" style="display:block;text-align:right;">' . "\n";
  echo '              Follow Me On Twitter' . "\n";
  echo '           </a>' . "\n";
  echo '         </div>' . "\n";
  echo '       </div>' . "\n";
  echo '       <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js">' . "\n";
  echo '        </script>' . "\n";
  echo '        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/thefbus.json?callback=twitterCallback2&amp;count=3">' . "\n";
  echo '        </script>' . "\n";
  echo '      </div>' . "\n";
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

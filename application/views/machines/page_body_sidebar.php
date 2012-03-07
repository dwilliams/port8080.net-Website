<?php
  /*** 
    *  page_body_sidebar.php
    *  2009.03.08
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
   
   // Navigation Menu for the home controller (page)
  
  echo '    <div id="page_sidebar">' . "\n";
  echo '      <div class="sidebar_menu">' . "\n";
  echo '        <div class="menu_header">' . "\n";
  echo '          T3H NAVAGATRON:' . "\n";
  echo '        </div>' . "\n";
  echo '        <div class="menu_body">' . "\n";
  // START MENU LIST
  $array_menu_mechs = array(anchor(site_url(array('machines', 'detail', 'annabellee')), 'annabellee', array()),
                            anchor(site_url(array('machines', 'detail', 'elda')), 'elda', array()),
                            anchor(site_url(array('machines', 'detail', 'freya')), 'freya', array()));
  $array_menu = array(anchor(base_url(), '~', array()),
                      anchor('http://webmail.port8080.net/', 'Webmail', array()),
                      anchor(site_url(array('home','calendar')), 'Calendar', array()),
                      anchor(site_url(array('machines')),'Machines of PORT8080', array()) => $array_menu_mechs,
                      anchor(base_url() . 'coppermine/', 'Picture Gallery', array()),
                      anchor(base_url() . 'mylist/mylist.htm', 'AniDB MyList Export', array()),
                      anchor('http://headphones.kerneldoom.com', 'Headphone Picture Gallery', array()));
  echo ul($array_menu);
  // END MENU LIST
  echo '        </div>' . "\n";
  echo '      </div>' . "\n";
  /*
  echo '      <div class="sidebar_twitter">' . "\n";
  // TWITTER UPDATES HERE:
  $twitter_url = "http://twitter.com/statuses/user_timeline/$username.xml?count=1";
  $buffer = file_get_contents($twitter_url);
  $xml = new SimpleXMLElement($buffer);
  $status_item = $xml -> status;
  $status =  $status_item -> text;
  // END TWITTER UPDATES
  echo '      </div>' . "\n";
  */
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

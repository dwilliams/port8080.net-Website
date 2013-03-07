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
  $array_menu = array(anchor(base_url(), '~', array()),
                      anchor('http://webmail.port8080.net/', 'Webmail', array()),
                      anchor(site_url(array('home','calendar')), 'Calendar', array()),
                      anchor('/home/archive/', 'Post Archive'),
                      anchor(site_url(array('machines')),'Machines of PORT8080', array()),
                      anchor(site_url(array('projects')),'Projects of PORT8080', array()),
                      anchor(base_url() . 'coppermine/', 'Picture Gallery', array()),
                      anchor(base_url() . 'mylist/mylist.htm', 'AniDB MyList Export', array()),
                      anchor('http://headphones.kerneldoom.com', 'Headphone Picture Gallery', array()));
  echo ul($array_menu);
  // END MENU LIST
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
  echo '        <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/poostickd.json?callback=twitterCallback2&amp;count=3">' . "\n";
  echo '        </script>' . "\n";
  echo '      </div>' . "\n";
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

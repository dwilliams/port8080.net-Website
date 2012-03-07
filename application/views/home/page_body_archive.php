<?php
  /*** 
    *  page_body_archive.php
    *  2011.12.26
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate a blog like entry
  // ARRAY ROW LAYOUT: (each row is an entry)
  // [ <post_title>, <post_body>, <post_date> ]
  // The array is called $array_posts[##][post_title, post_body, post_date]
  
  echo '    <div id="page_main">' . "\n";
  foreach ($array_posts as $post) {
    echo '      <div class="main_entry">' . "\n";
    // post title: use date for front page
    echo '        <div class="entry_title">' . "\n";
    echo '          ';
    echo anchor('/home/post/' . $post['id'], $post['post_title']);
    echo "\n";
    echo '        </div>' . "\n";
    // post body
    echo '        <div class="entry_post">' . "\n";
    echo '          ' . substr($post['post_body'], 0, 256) . '...' . "\n";
    echo '          <br />' . "\n";
    echo '          ' . anchor('/home/post/' . $post['id'], '(Read more...)') . "\n";
    echo '        </div>' . "\n";
    // post date
    echo '        <div class="entry_date">' . "\n";
    echo '          ' . $post['post_date'] . "\n";
    echo '        </div>' . "\n";
    echo '      </div>' . "\n";
  }
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

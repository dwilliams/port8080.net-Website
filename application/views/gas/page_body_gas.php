<?php
  /*** 
    *  page_body_gas.php
    *  2010.02.10
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate table of fillups
  // ARRAY ROW LAYOUT: (each row is a fillup)
  // [ vehicle_id, date, cost, volume, distance ]
  // The array is called $array_fills[##][...]
  
  // Load up the java script before drawing the graph
  echo '    <script src="' . base_url() . 'lib/dygraph-combined.js" type="text/javascript" charset="utf-8"></script>' . "\n";
  
  // Draw the main page display
  echo '    <div id="page_main">' . "\n";
    // Graph
  echo '      <div id="gas_graph_line" style="width: 520px; height: 250px;"></div>' . "\n";
    // Tables
  foreach($array_vehicles as $vehicle) {
    echo '      ' . $vehicle['name'] . ' - ' . $vehicle['make'] . ' ' . $vehicle['model'] . ' (' . $vehicle['color'] . ')' . "\n";
    echo '      <table style="margin-left: auto; margin-right: auto; margin-bottom: 1em;  border-collapse: collapse; border: 1px solid #000000;">' . "\n";
    echo '        <tr>' . "\n";
    echo '          <th style="border: 1px solid #999999;">Date</th>' . "\n";
    echo '          <th style="border: 1px solid #999999;">Gallons</th>' . "\n";
    echo '          <th style="border: 1px solid #999999;">Total (&#36;)</th>' . "\n";
    echo '          <th style="border: 1px solid #999999;">Gallon Price</th>' . "\n";
    echo '          <th style="border: 1px solid #999999;">Miles</th>' . "\n";
    echo '          <th style="border: 1px solid #999999;">MPG</th>' . "\n";
    echo '        </tr>' . "\n";
    foreach ($array_fills[$vehicle['id']] as $fillup) {
      echo '        <tr>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . $fillup['date'] . '</td>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . $fillup['volume'] . '</td>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . $fillup['cost'] . '</td>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . round($fillup['cost'] / $fillup['volume'], 2) . '</td>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . $fillup['distance'] . '</td>' . "\n";
      echo '          <td style="border: 1px solid #cccccc;">' . round($fillup['distance'] / $fillup['volume'], 2) . '</td>' . "\n";
      echo '        </tr>' . "\n";
    }
    echo '      </table>' . "\n";
  }
  echo '    </div>' . "\n";
  
  // Draw the graph into the place holder div
  echo '<script type="text/javascript">' . "\n";
  echo 'g = new Dygraph(' . "\n";
  echo '' . "\n";
  echo '  // containing div' . "\n";
  echo '  document.getElementById("gas_graph_line"),' . "\n";
  echo '' . "\n";
  echo '  // CSV or path to a CSV file.' . "\n";
  echo '  "Date,MPG\n" +' . "\n";
  // Need to figure out how to massage the data for the graph
  //  Set to just show the celica (id = 1)
  foreach($array_fills[1] as $fillup) {
    echo '  "' . $fillup['date'] . ',' . round($fillup['distance'] / $fillup['volume'], 2) . '\n" +' . "\n";
  }
  echo '  "\n",' . "\n";
  echo '  {' . "\n";
  echo '    pixelsPerXLabel: 30' . "\n";
  echo '  }' . "\n";
  echo '' . "\n";
  echo ');' . "\n";
  echo '</script>' . "\n";

/* DPW */
/* END OF CODE */
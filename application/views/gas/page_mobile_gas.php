<?php
  /*** 
    *  page_mobile_gas.php
    *  2010.02.19
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate table of fillups
  // ARRAY ROW LAYOUT: (each row is a fillup)
  // [ vehicle_id, date, cost, volume, distance ]
  // The array is called $array_fills[##][...]
  
  echo '<html><body>';
  echo '<div id="page_main">';
  foreach($array_vehicles as $vehicle) {
    if(!empty($array_fills[$vehicle['id']])) {
      echo $vehicle['name'] . ':' . "<br />\n";
      echo '<table style="border-collapse: collapse; border: 1px solid #000000;">';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Date</td><td>' . $array_fills[$vehicle['id']][0]['date'] . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Vehicle</td><td>' . $array_fills[$vehicle['id']][0]['vehicle_id'] . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Gallons</td><td>' . $array_fills[$vehicle['id']][0]['volume'] . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Total (&#36;)</td><td>' . $array_fills[$vehicle['id']][0]['cost'] . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Gallon Price</td><td>' . round($array_fills[$vehicle['id']][0]['cost'] / $array_fills[$vehicle['id']][0]['volume'], 2) . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">Miles</td><td>' . $array_fills[$vehicle['id']][0]['distance'] . '</td></tr>';
      echo '<tr><td style="border-right: 1px solid #cccccc; text-align: right;">MPG</td><td>' . round($array_fills[$vehicle['id']][0]['distance'] / $array_fills[$vehicle['id']][0]['volume'], 2) . '</td></tr>';
      echo '</table>' . "\n";
    }
  }
  echo '</div>' . "\n";
  echo '</body></html>';

/* DPW */
/* END OF CODE */

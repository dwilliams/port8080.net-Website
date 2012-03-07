<?php
  /*** 
    *  page_body_gas_entry.php
    *  2010.02.10
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
    *  Updated: 2010.08.06
   ***/
  
  // Entry page for inserting fillups
  $data_hidden = array('ins_ui' => 'c'); // c for computer, m for mobile
  $data_key = array('name' => 'ins_key', 'id' => 'ins_key', 'maxlength' => '32', 'size' => '30');
  $data_cost = array('name' => 'ins_cost', 'id' => 'ins_cost', 'maxlength' => '15', 'size' => '15');
  $data_volume = array('name' => 'ins_volume', 'id' => 'ins_volume', 'maxlength' => '15', 'size' => '15');
  $data_distance = array('name' => 'ins_distance', 'id' => 'ins_distance', 'maxlength' => '15', 'size' => '15');
  
  $array_dropdown = array();
  foreach($array_vehicles as $vehicle) {
    $array_dropdown[$vehicle['id']] = $vehicle['name'] . ' - ' . $vehicle['name'] . ' ' . $vehicle['make'] . ' ' . $vehicle['model'] . ' (' . $vehicle['color'] . ')';
  }
  
  echo '    <div id="page_main">' . "\n";
  // Form goes here
  echo '      <div style="text-align: center;">' . "\n";
  echo form_open('petrol/insert', '', $data_hidden);
  echo '        Enter Today\'s petrol purchase:' . "<br />\n";
  echo '        Key: ' . form_input($data_key) . "<br />\n";
  echo '        Vehicle: ' . form_dropdown('ins_vehicle', $array_dropdown, 1) . "<br />\n";
  echo '        Total: ' . form_input($data_cost) . "<br />\n";
  echo '        Gallons: ' . form_input($data_volume) . "<br />\n";
  echo '        Miles: ' . form_input($data_distance) . "<br />\n";
  echo form_submit('submit', 'Submit') . "\n";
  echo form_reset('reset', 'Reset') . "<br />\n";
  echo form_close() . "\n";
  echo '      </div>' . "\n";
  echo '    </div>' . "\n";

/* DPW */
/* END OF CODE */

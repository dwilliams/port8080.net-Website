<?php
  /*** 
    *  page_body_gas.php
    *  2012.06.03
    *  http://www.port8080.net/
    *  Daniel Patrick Williams
    *  dwilliams@port8080.net
   ***/
  
  // Takes array to populate table of fillups
  // ARRAY ROW LAYOUT: (each row is a fillup)
  // [ vehicle_id, date, cost, volume, distance ]
  // The array is called $array_fills[##][...]
  
  // Load up the java script before drawing the graph
  echo '<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="excanvas.js"></script><![endif]-->' . "\n";
  echo '    <script language="javascript" type="text/javascript" src="' . base_url() . 'lib/jqplot/jquery.min.js"></script>' . "\n";
  echo '    <script language="javascript" type="text/javascript" src="' . base_url() . 'lib/jqplot/jquery.jqplot.min.js"></script>' . "\n";
  echo '    <link rel="stylesheet" type="text/css" href="jquery.jqplot.css" />' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.pointLabels.min.js"></script>' . "\n";
  echo '    <script type="text/javascript" src="' . base_url() . 'lib/jqplot/plugins/jqplot.cursor.min.js"></script>' . "\n";
  
  // Draw the main page display
  echo '    <div id="page_main">' . "\n";
    // Graph
  echo '      <div id="gas_graph_line" style="margin-left: 20px; width: 500px; height: 300px;"></div>' . "\n";
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
  
  // New graphing fun
  echo '<script type="text/javascript">' . "\n";
  echo '$(document).ready(function(){' . "\n";
  foreach($array_vehicles as $vehicle) {
    if(!empty($array_fills[$vehicle['id']])) {
      echo 'var data' . $vehicle['id'] . ' = [';
      foreach($array_fills[$vehicle['id']] as $fillup) {
        echo '[\'' . $fillup['date'] . '\', ' . round($fillup['distance'] / $fillup['volume'], 2) . '],';
      }
      echo '];' . "\n";
    }
  }
  //echo '  var plot1 = $.jqplot("gas_graph_line", [data3, data2, data1, ], {' . "\n";
  
  echo '  var plot1 = $.jqplot("gas_graph_line", [';
  foreach($array_vehicles as $vehicle) {
    if(!empty($array_fills[$vehicle['id']])) {
      echo 'data' . $vehicle['id'] . ', ';
    }
  }
  echo '], {' . "\n";
  echo '    title:"Default Date Axis",' . "\n";
  echo '    axes:{xaxis:{renderer:$.jqplot.DateAxisRenderer}},' . "\n";
  echo '    seriesDefaults: {' . "\n";
  echo '      showMarker:false,' . "\n";
  echo '      pointLabels: { show:true }' . "\n";
  echo '    },' . "\n";
  echo '    cursor: {' . "\n";
  echo '      show: true,' . "\n";
  echo '      zoom: true,' . "\n";
  echo '      showTooltip: false' . "\n";
  echo '    },' . "\n";
  echo '  });' . "\n";
  
  echo '});' . "\n";
  echo '</script>' . "\n";

/* DPW */
/* END OF CODE */
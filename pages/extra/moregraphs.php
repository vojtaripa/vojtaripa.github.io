<style>
body {
  font-family: Verdana;
  font-size: 12px;
  padding: 10px;
}

#chartdiv {
  width: 100%;
  height: 500px;
  font-size: 11px;
}

#data,
#data th,
#data td {
  border: 1px solid #ccc;
  padding: 10px;
}

#data th {
  font-weight: bold;
  background-color: #eee;
}
</style>


<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

<script>
var chartConfig = {
  "type": "serial",
  "dataProvider": [],
  "valueAxes": [{
    "gridColor": "#FFFFFF",
    "gridAlpha": 0.2,
    "dashLength": 0
  }],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "category",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0
  }
};

jQuery(document).ready(function() {
  // get categories
  jQuery('#data thead th').each(function(index) {
    if (index) { // skip the first column
      chartConfig.graphs.push({
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "fillAlphas": 0.8,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "value" + index
      });
    }
  });

  // get data points
  jQuery('#data tbody tr').each(function(index) {
    var dataPoint = {};
    jQuery(this).find('th,td').each(function(index2) {
      if (jQuery(this).is('th')) { // category
        dataPoint.category = this.innerHTML;
      } else {
        dataPoint['value' + index2] = Number(this.innerHTML);
      }
    });
    chartConfig.dataProvider.push(dataPoint);
  });

  // make the chart
  var chart = AmCharts.makeChart("chartdiv", chartConfig);
});
</script>

<div id="chartdiv"></div>
<table id="data">
  <thead>
    <tr>
      <th></th>
      <th>Revenue</th>
      <th>Expenses</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>North America</th>
      <td>1000</td>
      <td>400</td>
    </tr>
    <tr>
      <th>South America</th>
      <td>350</td>
      <td>500</td>
    </tr>
    <tr>
      <th>Europe</th>
      <td>1200</td>
      <td>450</td>
    </tr>
    <tr>
      <th>Asia</th>
      <td>800</td>
      <td>400</td>
    </tr>
    <tr>
      <th>Oceania</th>
      <td>250</td>
      <td>120</td>
    </tr>
  </tbody>
</table>


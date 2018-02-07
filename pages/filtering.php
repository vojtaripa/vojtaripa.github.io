<?php
//require ('../RaceResults.php');

//5. Unescape the string values in the JSON array
$tableData = stripcslashes($_POST['pTableData']);

//6. Decode the JSON array
$tableData = json_decode($tableData,TRUE);

//7. now $tableData can be accessed like a PHP array
echo $tableData[1]['description'];



//**************************************************************************************
//https://www.catswhocode.com/blog/how-to-easily-create-charts-using-jquery-and-html5

//GRAPHS LOCATED IN: example-filtering.php 

/*
CHANGE:
***************************************************************************************************************

type:        	string. Accepts ‘bar’, ‘area’, ‘pie’, ‘line’. Default: ‘bar’.
width:       	number. Width of chart. Defaults to table width
height:      	number. Height of chart. Defaults to table height
appendTitle: 	boolean. Add title to chart. Default: true.
title:       	string. Title for chart. Defaults to text of table’s Caption element.
appendKey:   	boolean. Adds the color key to the chart. Default: true.
colors:      	array. Array items are hex values, used in order of appearance. Default: [‘#be1e2d’,’#666699′,’#92d5ea’,’#ee8310′,’#8d10ee’,’#5a3b16′,’#26a4ed’,’#f45a90′,’#e9e744′]
textColors:  	array. Array items are hex values. Each item corresponds with colors array. null/undefined items will fall back to CSS text color. Default: [].
parseDirection: string. Direction to parse the table data. Accepts ‘x’ and ‘y’. Default: ‘x’.
pieMargin:      number. Space around outer circle of Pie chart. Default: 20.
pieLabelPos:    string. Position of text labels in Pie chart. Accepts ‘inside’ and ‘outside’. Default: ‘inside’.
lineWeight:     number. Stroke weight for lines in line and area charts. Default: 4.
barGroupMargin: number. Space around each group of bars in a bar chart. Default: 10.
barMargin:      number. Creates space around bars in bar chart (added to both sides of each bar). Default: 1
***************************************************************************************************************

*/

?>

	
	<!--<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>Charting subsets of table data - Visualize</title>
	<link href="graph/css/basic.css" type="text/css" rel="stylesheet" />  DONT NEED TABLE STYLE..-->
	
	<script type="text/javascript" src="graph/_shared/EnhanceJS/enhance.js"></script>
	
	<script type="text/javascript">
		
		enhance({
			loadScripts: [
				{src: 'graph/js/excanvas.js', iecondition: 'all'},
				'graph/_shared/jquery.min.js',
				'graph/js/visualize.jQuery.js',
				'graph/js/example-filtering.js' //<--- THIS IS WHERE GRAPH IS FORMED AND ATTACHED!!!
			],
			loadStyles: [
				'graph/css/visualize.css',
				'graph/css/visualize-dark.css'
			]	
		}); 
		
		  
    </script>
	
   <!-- EXTRA STYLE 	
   <style type="text/css">
    	/*some demo styles*/
    	/*body { font-size: 62.5%; }*/
    	.enhanced h2, .enhanced pre { margin: 3em 20px .5em; }
    	.enhanced pre { width: 50%; overflow: auto; font-size: 1.4em; margin-top: 0; background: #444; padding: 15px; color: #fff; }
    </style>-->	



<table id="graphs">
	<caption>2009 Employee Sales by Department</caption>
	<thead>
		<tr>
			<td></td>
			<th scope="col">food</th>
			<th scope="col">auto</th>
			<th scope="col">household</th>
			<th scope="col">furniture</th>
			<th scope="col">kitchen</th>
			<th scope="col">bath</th>
			<th scope="col">Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row">Mary</th>
			<td>3.00</td>
			<td>160</td>
			<td>40</td>
			<td>120</td>
			<td>30</td>
			<td>70</td>
			<td>610</td>
		</tr>
		<tr>
			<th scope="row">Tom</th>
			<td>3</td>
			<td>40</td>
			<td>30</td>
			<td>45</td>
			<td>35</td>
			<td>49</td>
			<td>202</td>
		</tr>
		<tr>
			<th scope="row">Brad</th>
			<td>10</td>
			<td>180</td>
			<td>10</td>
			<td>85</td>
			<td>25</td>
			<td>79</td>
			<td>389</td>
		</tr>
		<tr>
			<th scope="row">Kate</th>
			<td>40</td>
			<td>80</td>
			<td>90</td>
			<td>25</td>
			<td>15</td>
			<td>119</td>
			<td>369</td>
		</tr>		
		<tr>
			<th scope="row">Total</th>
			<td>243</td>
			<td>460</td>
			<td>170</td>
			<td>275</td>
			<td>105</td>
			<td>317</td>
			<td>1570</td>
		</tr>
	</tbody>
</table>	


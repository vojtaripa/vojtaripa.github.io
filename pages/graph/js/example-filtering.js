// Run the script on DOM ready:
$(function(){
	//filtered chart
	
	//DISPLAY GRAPH AND INFO
	
	//GRAPH 2
 	$('#graphs')
 		.visualize({
			//filters: (eliminating total column and last row.. 
	 		rowFilter: ':not(:last)',
	 		colFilter: ':not(:last-child)'
	 	})
		//description:
	 	//.before("<h2>B) Charted with filters to exclude totals data</h2><pre><code>$('#graphs').visualize({<strong>rowFilter: ':not(:last)', colFilter: ':not(:last-child)'</strong>});</code></pre>");
 	
	//GRAPH 1
 	/*$('#graphs').visualize()
		//description:
 		.before("<h2>A) Charted without row/col filtering (<em>not ideal with this table</em>)</h2><pre><code>$('#graphs').visualize();</code></pre>")
	
	//PIE
	$('#graphs').visualize({type: 'pie', height: '300px', width: '420px'});
	//BAR
	$('#graphs').visualize({type: 'bar', width: '420px'});
	//AREA
	$('#graphs').visualize({type: 'area', width: '420px'});
	//LINE
	$('#graphs').visualize({type: 'line', width: '420px'});
	
	//DEFAULT (bar)
	$('#graphs').visualize();*/
});
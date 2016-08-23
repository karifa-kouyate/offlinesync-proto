function exportData(){
	var exportRoute="{{ route('sync') }}";
	//alert("exporting to "+exportRoute);
	$.get( exportRoute, function( data ) {
	  if(data=='ok')
	  	console.log('Data exported !')
	  else
	  	console.log('Data export error, will try later')
	});

}

(function () {
    var exportInterval={{ $exportInterval }};
	setInterval(exportData,exportInterval);
})();



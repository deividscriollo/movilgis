$(function(){
	llenar();
	llenar1();

	$(".js-source-states").select2();
	$('#btn_ejecutar').click(function(){
		console.log('test');
		var origen = $('#selec_1').val();
		var destino = $('#selec_2').val();
		trazar(origen, destino);
	});    
});

function trazar(origen, destino){
	var origen = JSON.parse(consultar_(origen));
	var destino = JSON.parse(consultar_(destino));
	var posini = origen[0]['posicion'];
	var posfin = destino[0]['posicion'];

	var posini = posini.split(',');
	var posfin = posfin.split(',');
	console.log(posini, posfin);
	var lon = posini[0];
	var lat = posini[1];
	var lonini = posfin[0];
	var latini = posfin[1];
	trazarruta(lon, lat, lonini, latini);

}
function trazarruta(lon, lat, lonini, latini){
	document.getElementById('viemap').innerHTML = "<div id='map2' style='height: 500px'></div>";
    var map = L.map('map2');
      L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
    //map.setView([41.8758,-87.6189], 16);
    L.Routing.control({
      	waypoints: [
        	L.latLng(latini,lonini),
        	L.latLng(lat,lon)
    	  ],
	    routeWhileDragging: true
    }).addTo(map);
    map.setView([lat, lon], 9);
    // actualizando tamño del mapa
    setInterval(function(){map.invalidateSize();}, 50); 
}

function consultar_(id){
	var acu;
	$.ajax({
		url: 'app.php',
		type: 'post',
		data: {info_id:'a', id:id},
		datatype:'json',
		async:false,
		success: function (data) {
			acu=data;
		}
	});
	return acu;
}

function llenar(){
	// lugar turistico
	var acu;
	$.ajax({
		url: 'app.php',
		type: 'post',
		async:false,
		data: {llenar_datos:''},
		dataType:'json',
		success: function (data) {
			acu='<optgroup label="Lugares turisticos">';
			for (var i = 0; i < data.length; i++) {		

				acu=acu+'<option value="'+data[i]['id']+'">'+data[i]['nombre']+'</option>'
			}
			acu=acu+'</optgroup>';
		}
	});
	$('#selec_1').append(acu);
	$('#selec_2').append(acu);
}
function llenar1(){
	// establecimiento
	var acu;
	$.ajax({
		url: 'app.php',
		type: 'post',
		async:false,
		data: {llenar_datos1:''},
		dataType:'json',
		success: function (data) {
			acu='<optgroup label="Establecimientos">';
			for (var i = 0; i < data.length; i++) {		

				acu=acu+'<option value="'+data[i]['id']+'">'+data[i]['nombre']+'</option>'
			}
			acu=acu+'</optgroup>';
		}
	});
	$('#selec_1').append(acu);
	$('#selec_2').append(acu);
}
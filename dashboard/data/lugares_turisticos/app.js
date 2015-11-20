$(function(){
	var table=$('#tabla-info').dataTable( {
        language: {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		}
    });
	

	$("#form-data").validate({
        rules: {
            txt_1: {
                required: true,
            }
        },
		messages: {
		    txt_1: {
		        required: "Por favor ingrese información, campo requerido"
		    }
		},
        submitHandler: function(form) {
        	llenar_tabla();
        	$.ajax({
	    		url: 'app.php',
	    		type: 'post',
	    		dataType:'json',
	    		data: $(form).serialize(),
	    		success: function (data) {
	    			llenar_tabla();
	    			if (data[0]==1) {
						swal({
						    title: "Ok",
						    text: "Su información fue almacenada correctamente!",
						    type: "success"
						},function (){
							$('#form-data').each (function(){
							  this.reset();
							});
						});
					};
					if (data[0]==0) {
						swal({
						    title: "Lo sentimos",
						    text: "Su información no pudo ser almacenada!",
						    type: "warning"
						},function (){
							$('#form-data').each (function(){
							  this.reset();
							});
						});
					};
	    		}
	    	});
        }
    });
	
	llenar_tabla();


	//-------------------------------inicio map--------------------------//
	var map;
      require([
        "esri/map", "esri/geometry/webMercatorUtils", "dojo/dom", 
        "dojo/domReady!"
      ], function(
        Map, webMercatorUtils, dom
      ) {
        map = new Map("map1", {
			center: [-78.216, 0.328],
			zoom: 12,
			basemap: "streets",
			logo:false
        });
        map.on("load", function() {
          //after map loads, connect to listen to mouse move & drag events
          map.on("mouse-move", showCoordinates);
          map.on("mouse-drag", showCoordinates);
        });

        function showCoordinates(evt) {
          //the map is in web mercator but display coordinates in geographic (lat, long)
          var mp = webMercatorUtils.webMercatorToGeographic(evt.mapPoint);
          //display mouse coordinates
          dom.byId("info").innerHTML = mp.x.toFixed(3) + ", " + mp.y.toFixed(3);
        }
      });


	$("#txt_x").jfilestyle({buttonText: "<span class='glyphicon glyphicon-folder-open'></span> Seleccionar"});




	llenar_clima()
});

function llenar_tabla(){
    	$.ajax({
    		url:'app.php',
    		type:'POST',
    		data:{mostrar_tabla:'ok'},
    		dataType:'json',
    		success:function(data){
    			var t = $('#tabla-info').DataTable();
					t.clear().draw();
    			var counter = 1;
    			for (var i = 0; i < data.length; i=i+11) {
    				t.row.add( [
			            data[0+i],
			            data[1+i],
			            data[2+i],
			            data[3+i],
			            data[4+i],
			            data[5+i],
			            data[6+i],
			            data[7+i],
			            data[8+i],
			            data[9+i],
			            data[10+i],
			            data[11+i],

        			] ).draw();
        			counter++;
    			}
    		}
    	});
    }
function editar(id){
	var fulldata=buscar_data(id);
	$('#myModal').modal('show');
	$('#username').text(fulldata[1]);
	$('#username').editable({
        url: 'app.php',
        type: 'text',
        value:fulldata[1],
        pk: id,
        name: 'txt_1_actualizar',
        title: 'Ingrese información',
        validate: function(value) {
		    if($.trim(value) == '') {
		        return 'Este campo es requerido';
		    }
		},
		success: function(value){
			llenar_tabla();
		}
    });
}
function buscar_data(id){
	var resultados;
	$.ajax({
		url: 'app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {buscar_info:'',id:id},
		success: function (data) {
			console.log(data);
			resultados=data;
		}
	});
	return resultados;
}
function eliminar(id){
	var fulldata=buscar_data(id);
	swal({   
		title: "Esta seguro?",
		text: "De eliminar "+fulldata[1],
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Sí , eliminarla!",
		cancelButtonText: "Cancelar",
		closeOnConfirm: false
	}, function(){  
		$.ajax({
			url: 'app.php',
			type: 'post',
			data: {eliminar_registro:'',id:id},
			success: function (data) {
				swal("Eliminar!", "El registro se elimino correctamente.", "success");
				llenar_tabla(); 
			}
		});
		
	});
}
function llenar_clima(){
	$.ajax({
		url: 'app.php',
		type: 'post',
		data: {mostrar_clima:''},
		success: function (data) {
			$('#sel_8').html(data)
		}
	});
	$.ajax({
		url: 'app.php',
		type: 'post',
		data: {mostrar_tipo:''},
		success: function (data) {
			$('#sel_10').html(data)
		}
	});
	$.ajax({
		url: 'app.php',
		type: 'post',
		data: {mostrar_parroquia:''},
		success: function (data) {
			$('#sel_11').html(data)
		}
	});
}

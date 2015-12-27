$(function(){

	//---------------declaracion formato variables seleccion localizacion-----------------///////
	$(".js-source-country").select2({
		placeholder: "Seleccionar Pais",
	}).on("change", function (e) { 
		var valor=e.val;
		if (valor=='20150326104209551428d175961') {
			$("#obj_pro_ciu").html('<div class="form-group" >'
	                                    +'<label for="last_name">Provincia</label>'
	                                    +'<select class="js-source-state" id="select_provincia" name="select_provincia" style="width: 100%">'
	                                            +'<option value=""></option>'
	                                   +' </select>'
	                                +'</div>'
	                                +'<div class="form-group">'
	                                    +'<label for="last_name">Ciudad</label>'
	                                   +' <select class="js-source-city" id="select_ciudad" name="select_ciudad"  style="width: 100%">'
	                                            +'<option value=""></option>'
	                                    +'</select>'
	                                +'</div>');
			$(".js-source-state").select2({
				placeholder: "Seleccionar Provincia"
			}).on("change", function(e){
				var valor=e.val;
				$.ajax({
					url: 'app.php',
					type: 'post',
					data: {llenar_ciudad:'',id:valor},
					success: function (data) {
						$("#select_ciudad").html(data);
					}
				});
			});
			$(".js-source-city").select2({
				placeholder: "Seleccionar Ciudad"
			});
			$.ajax({
				url: 'app.php',
				type: 'post',
				data: {llenar_provincia:'',id:valor},
				success: function (data) {
					$("#select_provincia").html(data);
				}
			});
		};
		if (valor!='20150326104209551428d175961') {
			$("#obj_pro_ciu").html('');
		};
		
	});
	
	llenar_pais();
	function llenar_pais(){
		$.ajax({
			url: 'app.php',
			type: 'post',
			data: {llenar_pais:''},
			success: function (data) {
				$("#select_pais").html(data);
			}
		});		
	}
	

	// ------------------------------validacion de formulario------------------------------//
	//------------------Formulario registro-------------------------//
	$('#txt_tel').mask('(999)-999-9999');
	$('#form-registro').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_nombre: {
				required: true,
			},
			txt_correo:{
				required: true,
				email:true,
				remote: {
			        url: "app.php",
			        type: "post",
			        data: {'existencia_correo':''}
			      }
			},
			select_pais: {
				required: true
			},
			select_provincia: {
				required: true
			},
			select_ciudad: {
				required: true
			},
			txt_tel: {
				required: true,
			},
			txt_direccion: {
				required: true
			},
			txt_pass: {
				required: true,
				minlength: 8,
			},
			txt_pass2: {
				required: true,
				equalTo: "#txt_pass"
			},
			agree: {
				required: true,
			}
		},

		messages: {
			txt_nombre: {
				required: "Por favor, ingrese su nombre.",
			},
			txt_correo:{
				required: "Por favor, ingrese su correo.",
				email:"Por favor, ingrese un correo valido.",
				remote:"Este correo YA EXISTE, ingrese un correo diferente.",
			},
			select_pais: {
				required: "Por favor, seleccione Pais.",
			},
			select_provincia: {
				required: "Por favor, seleccione Provincia.",
			},
			select_ciudad: {
				required: "Por favor, seleccione Ciudad.",
			},
			txt_tel: {
				required: "Por favor, Ingrese Teléfono.",
			},
			txt_direccion: {
				required: "Por favor, Ingrese Dirección."
			},
			txt_pass: {
				required: "Por favor, Ingrese Password.",
				minlength: "Por favor, Por seguridad ingrese minimo 8 caracteres."
			},
			txt_pass2: {
				required: "Por favor, Repita Password.",
				equalTo: "Por favor, Verifique su password no coincide."
			},
			agree: "Por favor, acepte nuestra política"
		},


		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},
		submitHandler: function (form) {
			$.ajax({
				url: 'app.php',
				type: 'post',
				dataType:'json',
				data: $(form).serialize(),
				beforeSend: function() {
		        	$.blockUI({ 
		        		css: { backgroundColor: 'background: rgba(255,255,255,0.2);', color: '#fff', border:'2px'},
		        		message: '<h3>Enviando información, Por favor espere un momento...'
		        		// message: '<h3>Estamos trabajando intente mas tarde...'
                                        +'<span class="loader animated fadeIn handle ui-sortable-handle">'
                                        +'<span class="spinner">'
                                            +'<i class="fa fa-spinner fa-spin"></i>'
                                        +'</span>'
                                        +'</span>'
                                  +'</h3>'
		        	});
		        },
				success: function (data) {
					$.unblockUI();
					var fullname=$('#txt_nombre').val();
					var nombre=fullname.split(" ");
					if (data[0]==1) {
						swal({
						    title: "Buen trabajo! estimado/a "+nombre[0],
						    text: "Su registro fue exitoso, por favor verifique su correo electrónico para activar su cuenta!",
						    type: "success"
						},function (){
							window.location.href = "registro.php";
						});
					}
					if (data[0]!=1) {
						swal({
						    title: "Lo sentimos! estimado/a "+nombre[0],
						    text: "No se ha podido realizar el registro, por favor intente más tarde.!",
						    type: "warning",
						},function (){
							$('#form-registro').each (function(){
							  this.reset();
							});
						});

					}
				}
			});
		}
	});
	//--------------------Formulario acceso------------------------//
	$('#form-acceso').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_nombre: {
				required: true
			},
			txt_pass: {
				required: true,
			}
		},
		messages: {
			txt_nombre: {
				required: "Por favor, ingrese su correo electrónico.",
			},
			txt_pass: {
				required: "Por favor, Ingrese Password.",
			},
		},


		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},

		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},

		submitHandler: function (form) {
			var fullname=$('#txt_nombre').val();
			$.ajax({
				url: 'app.php',
				type: 'post',
				dataType:'json',
				data: $(form).serialize(),
				success: function (data) {
					if (data[0]==1) {
						swal({
						    title: "Buen trabajo! estimado/a "+fullname,
						    text: "Su usuario y contraseña son correctos, iniciar sesión!",
						    type: "success"
						},function (){
							window.location.href = "data/";
						});
					};
					if (data[0]==2) {
						swal({
						    title: "Lo sentimos! estimado/a cliente",
						    text: "Usted no puede iniciar sesión porque aún no activa su cuenta, actívelo para continuar..!",
						    type: "info",
						},function (){
							$('#form-acceso').each (function(){
							  this.reset();
							});
						});
					};
					if (data[0]==0) {
						swal({
						    title: "Lo sentimos! estimado/a cliente",
						    text: "Usuario o contraseña incorrectos, verifíquelo e intente nuevamente.!",
						    type: "warning",
						},function (){
							$('#form-acceso').each (function(){
							  this.reset();
							});
						});
					}
				}
			});
		}
	});

});


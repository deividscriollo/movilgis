$(function(){
    $.ajax({
        url: 'app.php',
        type: 'post',
        dataType:'json',
        data: {info_user:'dogi'},
        success: function (data) {
            $('#editable_nombre').text(data['nombre']);
            $('#editable_correo').text(data['correo']);
            $('#editable_telefono').text(data['telefono']);
            $('#editable_direccion').text(data['direccion']);
            //editables
            $('#editable_nombre').editable({
                url: 'app.php',
                type: 'text',
                pk: data['id'],
                value: data['nombre'],
                name: 'txt_nombre',
                title: 'Ingresar Nombre',
                validate: function(value) {
                    if($.trim(value) == '') return 'Campo requerido';
                }
            });
            $('#editable_correo').editable({
                url: 'app.php',
                type: 'text',
                pk: data['id'],
                value: data['correo'],
                name: 'txt_correo',
                title: 'Ingrese Correo',
                validate: function(value) {
                    if($.trim(value) == '') return 'Campo requerido';
                }
            });
            $('#editable_telefono').editable({
                url: 'app.php',
                type: 'text',
                pk: data['id'],
                value: data['telefono'],
                name: 'txt_telefono',
                title: 'Ingrese Teléfono',
                validate: function(value) {
                    if($.trim(value) == '') return 'Campo requerido';
                }
            });
            $('#editable_direccion').editable({
                url: 'app.php',
                type: 'text',
                pk: data['id'],
                value: data['direccion'],
                name: 'txt_direccion',
                title: 'Ingresar Dirección',
                validate: function(value) {
                    if($.trim(value) == '') return 'Campo requerido';
                }
            });
        }
    });	
    $("#form_2").validate({
        rules: {
            pass: {
                required: true,
                remote: {
                    url: "app.php",
                    type: "post",
                    data: {verificar_pass:'dogi'}
                }
            },
            npass: {
                required: true,
                minlength: 5
            },
            npass1: {
                required: true,
                equalTo: "#npass"
            }

        },
        messages: {
            pass: {
                required: "campo requerido",
                remote: "su contraseña no coincide"
            },
            npass: {
                required: "campo requerido",
                minlength: "minimo 5 digitos"
            },
            npass1: {
                required: "campo requerido",
                equalTo: "campo tiene   que ser igual"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                url: 'app.php',
                type: 'post',
                data: $(form).serialize(),
                dataType:'json',
                success: function (data) {
                    if (data[0]==1) {
                        alert('Password Actualizado');
                    }else{
                        alert('No se pudo realizar su peticion');
                    }
                }
            });
        }
    });

});
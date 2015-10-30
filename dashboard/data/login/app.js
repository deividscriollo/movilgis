$(function(){
	$("#loginForm").submit(function(e) {
		//prevent Default functionality
        e.preventDefault();

        //get the action-url of the form
        var actionurl = e.currentTarget.action;

        //do your own request an handle the results
        $.ajax({
                url: 'app.php',
                type: 'post',
                dataType: 'json',
                data: {peticion_acceso:'',txt_1:$('#txt_username').val(),txt_2:$('#txt_password').val()},
                success: function(data) {
                    if (data[0]==1) {
                    	window.location = "../inicio/"
                    }else{
                    	alert('usuario o contraseña incorrecto');
                    }
                }
        });		
	});
})
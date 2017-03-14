
//método para editar usuarios
function  ediituuuriuakkjkjsa(id_u) {
	var name_user = $('#id_name_user_admin_edit'+id_u).val();
	var user_name = $('#id_username_admin_edit'+id_u).val();
	var email_user = $('#id_email_admin_edit'+id_u).val();
	var rol_user = $('#select_admin_edit_user_rol'+id_u).val();
	var state_user = $('#select_admin_edit_active'+id_u).val();
	
	if (name_user != '') {
		if (email_user != '') {
			$('#id_messagge_edit_user_name_admin'+id_u).css('display', 'none');
			$('#id_messagge_edit_user_email_admin'+id_u).css('display', 'none');
			$('#tr_edit_toggle_user_admin'+id_u).toggle('fast');
				var ruta = "edit-user-admin";
				var token = $("#token").val();
					$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{id_us: id_u, name:name_user, email:email_user, rol: rol_user, state:state_user},
					success:function(info){
						console.log("entró");
						$('#tr_edit_toggle_user_admin'+id_u).toggle('show');
					}
				});


		}else{
			$('#id_messagge_edit_user_email_admin'+id_u).css('display', 'block');
			$('#id_messagge_error_p_edit_user_admin_email'+id_u).html("Llenar campo del correo");
			$('#id_messagge_edit_user_name_admin'+id_u).css('display', 'none');
			$('#id_messagge_error_p_edit_user_admin_name'+id_u).html("Llenar campo del nombre");
		}
	}else{
		$('#id_messagge_edit_user_email_admin'+id_u).css('display', 'none');
		$('#id_messagge_edit_user_name_admin'+id_u).css('display', 'block');
		$('#id_messagge_error_p_edit_user_admin_name'+id_u).html("Llenar campo del nombre");
	}


}





// editar un índice
function edit_index_paper_admin(id_level){
	var index = $('#indice_admin_edit'+id_level).val();
	var valor = $('#value_level_index_paper_admin'+id_level).val();
		
	if(valor != ''){
		$('#id_messagge_edit_index'+id_level).css("display", "none");
		$('#id_level_aadmin_edit'+id_level).toggle('fast');

		var ruta = "edit-index-admin";
				var token = $("#token").val();
					$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{id_l: id_level, value_l:valor, index_l:index},
					success:function(info){
						$('#id_level_aadmin_edit'+id_level).toggle('show');
					}
				});

	}else{
		$('#id_messagge_edit_index'+id_level).css("display", "block");
		$('#id_messagge_error_p_edit_index'+id_level).html("Ingresar Nivel");
	}


}
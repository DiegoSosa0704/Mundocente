//crea una nuevo insttución

$('#save_new_institution_admin').click(function() {
	var sector_institution = $('#sector_institution_new_admin').val();
	var id_lugar_institution = $('#selectCity').val();
	var name_institution = $('#name_institution_new_admin').val();
	var phone_institution = $('#telephone_insttucion_new_admin').val();
	$('#id_messagge_new_institution').css('display','none');
	$('#id_messagge_error_p').html("Cargando..");
	if(id_lugar_institution != ''){
		if(id_lugar_institution != null){
			if(name_institution != ''){

					var token = $("#token").val();
					var ruta = "add-new-institution-admin";

						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_l:id_lugar_institution, nombre_i: name_institution, sector_i: sector_institution, tele_i: phone_institution},
						success:function(info){
							$('#id_messagge_new_institution').removeClass('error');
							$('#id_messagge_new_institution').addClass('green');
							$('#id_messagge_new_institution').css('display','block');
							$('#id_messagge_error_p').html("Se Guardó la institución "+name_institution+" con éxito");
							$('#tbody_new_istitution_admin').append('<tr class="center aligned"> <td>'+info.nombre+'</td> <td>'+info.sector+'</td>  <td>'+info.telefono+'</td>  <td> '+info.lugar_nombre+' </td>  <td>'+info.estado+'</td>   </tr>');
							
						}
					});

			}else{
				$('#id_messagge_new_institution').removeClass('green');
				$('#id_messagge_new_institution').addClass('error');
				$('#id_messagge_new_institution').css('display','block');
				$('#id_messagge_error_p').html("El nombre de la institución es obligtorio");
			}
		}else{
			$('#id_messagge_new_institution').removeClass('green');
			$('#id_messagge_new_institution').addClass('error');
			$('#id_messagge_new_institution').css('display','block');
			$('#id_messagge_error_p').html("Seleccione Ciudad de institución");
		}
	}else{
		$('#id_messagge_new_institution').removeClass('green');
		$('#id_messagge_new_institution').addClass('error');
		$('#id_messagge_new_institution').css('display','block');
		$('#id_messagge_error_p').html("Seleccione país");
	}

});









//edita insttución
function editInstitutionAdmin(id_istitution){

	var name_new_institu = $('#name_institution_admin_edit'+id_istitution).val();
	var name_new_phone = $('#name_telephone_amin_edit'+id_istitution).val();
	var id_city_inst = $('#value_city_institution_select_edit_admin'+id_istitution).val();
	var type_active = $('#inactive_institution_admin'+id_istitution).val();
	var sector_i = $('#selec_edit_admin_sector'+id_istitution).val();
	$('#id_messagge_edit_institution'+id_istitution).css('display','none');
	$('#id_messagge_error_p_edit_istitution'+id_istitution).html("Cargando...");
	if(name_new_institu != ''){
		$('#id_messagge_edit_institution'+id_istitution).css('display','none');
					var token = $("#token").val();
					var ruta = "edit-institution-admin";
					$('#item_tr_edit_institu_admin'+id_istitution).toggle('fast');
						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_i:id_istitution, name_i: name_new_institu, id_lugar: id_city_inst, phone_i: name_new_phone, sector_in:sector_i, state_i:type_active},
						success:function(info){
							$('#item_tr_edit_institu_admin'+id_istitution).toggle('show');
						}
					});

	}else{
		$('#id_messagge_edit_institution'+id_istitution).css('display','block');
		$('#id_messagge_edit_institution'+id_istitution).addClass('error');
		$('#id_messagge_error_p_edit_istitution'+id_istitution).html("Ingrese nombre");
	}


}


//inactivar e inactivar suuario
function  usersoeppsoasiistteyrss(varidu, id_p) {

					var token = $("#token").val();
					var ruta = "inhabilite-user";
					
						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_u:varidu},
						success:function(info){
							$('#id_active_edit_mensagge_publica'+id_p).html("Inactivo");
							$('#id_button_publication'+id_p).removeClass('green');
							$('#id_button_publication'+id_p).addClass('red');
							$('#id_button_publication'+id_p).attr('onclick','usersoeppsoasi('+varidu+','+id_p+')');
						}
					});
}


function usersoeppsoasi(asajhhjas, id_p){
					var token = $("#token").val();
					var ruta = "abilite-user";
						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_u:asajhhjas},
						success:function(info){
							$('#id_active_edit_mensagge_publica'+id_p).html("Activo");
							$('#id_button_publication'+id_p).removeClass('red');
							$('#id_button_publication'+id_p).addClass('green');
							$('#id_button_publication'+id_p).attr('onclick','usersoeppsoasiistteyrss('+asajhhjas+','+id_p+')');
						}
					});

}








//activar e inactivar publicación

function  publisdsjhjshdjshds(id_p) {

					var token = $("#token").val();
					var ruta = "inhabilite-publication";
					
						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_p:id_p},
						success:function(info){
							$('#id_active_edit_mensagge_publica_publica'+id_p).html("Inactivo");
							$('#id_button_publication_publication'+id_p).removeClass('green');
							$('#id_button_publication_publication'+id_p).addClass('red');
							$('#id_button_publication_publication'+id_p).attr('onclick','publjsdjshdjshd('+id_p+')');
						}
					});
}


function publjsdjshdjshd(id_p){
					var token = $("#token").val();
					var ruta = "abilite-publication";
						$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{id_p:id_p},
						success:function(info){
							$('#id_active_edit_mensagge_publica_publica'+id_p).html("Activo");
							$('#id_button_publication_publication'+id_p).removeClass('red');
							$('#id_button_publication_publication'+id_p).addClass('green');
							$('#id_button_publication_publication'+id_p).attr('onclick','publisdsjhjshdjshds('+id_p+')');
						}
					});

}

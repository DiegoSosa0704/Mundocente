//crea una nuevo insttución

$('#save_new_institution_admin').click(function() {
	var sector_institution = $('#sector_institution_new_admin').val();
	var id_lugar_institution = $('#selectCity').val();
	var name_institution = $('#name_institution_new_admin').val();
	var phone_institution = $('#telephone_insttucion_new_admin').val();
	



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
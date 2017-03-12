var tipoLugar = 0;
//cambia en agregar nuevo lugar
$('#selectnuevolugaradmnistracion').change(function(event){
	var tipo = event.target.value;
	if(tipo == 'city'){
		$('#showNewPlaceAdmin').toggle('show');
		tipoLugar=0;
	}else{
		$('#showNewPlaceAdmin').toggle('fast');
		tipoLugar=1;
	}

});



var tipo_edit_lugar = 0;
$('#edit_select_data_admin_place').change(function(event){
	var tipo = event.target.value;
	if(tipo == 'city'){
		$('#showNewPlaceAdminEdit').css('display', 'block');
		$('#label_title_type_edit_place').html('Tipo: Ciudad');
		tipo_edit_lugar=0;
	}else{
		$('#showNewPlaceAdminEdit').css('display', 'none');
		$('#label_title_type_edit_place').html('Tipo: País');
		tipo_edit_lugar=1;
	}

});





//agrega nuevo lugar 
$('#save_new_place_admin').click(function(){

	var nombre_lugar_nuevo = $('#name_place_new').val();
	
	var token = $("#token").val();

	if (tipoLugar==1) {
		var ruta = "add-new-country";

		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombre_lugar_nuevo: nombre_lugar_nuevo},
		success:function(info){
			$('#tabla_de_lugares_administrador1').append('<tr class="center aligned"><td>'+info.nombre+'</td> <td>'+info.tipo+'</td>  <td class="collapsing"> -  </td></tr>');
		}
	});
	}else{
		var id_country_n = $('#select_country_new_admin_change').val();
		var ruta = "add-new-city";

		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{nombre_lugar_nuevo: nombre_lugar_nuevo, id_country_new: id_country_n},
			success:function(info){
				$('#tabla_de_lugares_administrador1').append('<tr class="center aligned"><td>'+info.nombre+'</td> <td>'+info.tipo+'</td> <td class="collapsing"> </td></tr>');
			}
		});
	}

	
});

















//Muestra editar lugar 
function show_modal_edit_place_admin(id_lugar){
	var id_lugar_fk = $('#id_lugar_fk_edit_amin'+id_lugar).val();
	var type_lugar = $('#type_place_edit'+id_lugar).val();
	var name_lugar = $('#name_lugar_edit_show_dmin'+id_lugar).val();
	$('#nombre_lugar_edit_admin').val(name_lugar);
	$('#edit_select_data_admin_place').empty();
	$('#id_lugar_edit_admin').val(id_lugar);
	if(type_lugar=='city'){
		$('#label_title_type_edit_place').html('Tipo: Ciudad');
		$('#showNewPlaceAdminEdit').css('display', 'block');
		tipo_edit_lugar=0;
		$('#edit_select_data_admin_place').append('<option value="country" >País</option>');
		$('#edit_select_data_admin_place').append('<option value="city" selected="true">Ciudad</option>');
		$('#edit_select_data_admin_place > option[value="city"]').attr('selected', 'selected');
		
		$.get('get-country-edit/'+id_lugar+ "" , function(response, ciudad){
			$('#label_countr_dit_place_dmin').html("País: "+response[0].name_lugar);
			$("#select_country_edit_admin > option[value="+response[0].id_lugar+"]").attr('selected', 'selected');
		});

	}else{
		
		$('#label_title_type_edit_place').html('Tipo: País');
		$('#showNewPlaceAdminEdit').css('display', 'none');
		tipo_edit_lugar=1;	
		
		$('#edit_select_data_admin_place').append('<option value="country" selected="true">País</option>');
		$('#edit_select_data_admin_place > option[value="country"]').attr('selected', 'selected');
		$('#edit_select_data_admin_place').append('<option value="city" >Ciudad</option>');
	}
}








//agrega nuevo lugar 
$('#save_change_places_edit_admin').click(function(){

	var nombre_lugar_nuevo = $('#nombre_lugar_edit_admin').val();
	var tipo_change = $('#edit_select_data_admin_place').val();
	var id_lug = $('#id_lugar_edit_admin').val();	
	var token = $("#token").val();

	if (tipo_change=='country') {
		var ruta = "edit-new-country";

		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_l:id_lug, nombre_lugar_nuevo: nombre_lugar_nuevo},
		success:function(info){
			$('#name_place_list_admin'+id_lug).html(nombre_lugar_nuevo);
			$('#name_lugar_edit_show_dmin'+id_lug).val(nombre_lugar_nuevo);
			$('#type_place_edit'+id_lug).val(tipo_change);
			$('#id_lugar_fk_edit_amin'+id_lug).val("NULL");
			$('#type_lugar_edit_modal'+id_lug).html("País");
			
		}
	});
	}else{
		var country_change = $('#select_country_edit_admin').val();
		var ruta = "edit-new-city";

		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_l:id_lug,nombre_lugar_nuevo: nombre_lugar_nuevo, id_country_new: country_change},
			success:function(info){
				$('#name_place_list_admin'+id_lug).html(nombre_lugar_nuevo);
				$('#name_lugar_edit_show_dmin'+id_lug).val(nombre_lugar_nuevo);
				$('#type_place_edit'+id_lug).val(tipo_change);
				$('#id_lugar_fk_edit_amin'+id_lug).val(country_change);
				$('#type_lugar_edit_modal'+id_lug).html("Ciudad");
			}
		});
	}

	
});




function nobackbutton(){
	
   window.location.hash="no-back-button";
	
   window.location.hash="Again-No-back-button" //chrome
	
   window.onhashchange=function(){window.location.hash="";}
	
}
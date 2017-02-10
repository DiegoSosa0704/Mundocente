
//Llena el campo ciudad con el país correspondiente
$('#selectCountry').change(function(event){
	$('#cityChange').toggle("fast");
	$('#selectCity').empty();
	$('#selectInstitution').empty();

	

	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
		
	});
	$('#selectCity').append('<option value="0" disabled="true">Ninguno</option>');
	$('#selectCity > option[value="0"]').attr('selected', 'selected');
	$('#cityChange').toggle("show");

	

});







//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity').change(function(event){

	$('#institutionChange').toggle("fast");
	
	$('#selectInstitution').empty();
	

	$.get('university/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
		
	});
	    $('#selectInstitution').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution > option[value="0"]').attr('selected', 'selected');
		$('#institutionChange').toggle("show");

	
	
});









//llena el campo área con la gran área correspondiente
$('#select_gran_area_formacion').change(function(event){
	console.log('');
	$('#select_area_formacion').empty();
	$('#select_disciplina_formacion').empty();

	$.get('area/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#select_area_formacion').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});

	$('#select_area_formacion').append('<option value="0" disabled="true">Ninguno</option>');
	$('#select_area_formacion > option[value="0"]').attr('selected', 'selected');
});


//llena el campo área con la gran área correspondiente
$('#select_area_formacion').change(function(event){
	console.log('');
	$('#select_disciplina_formacion').empty();


	$.get('area/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#select_disciplina_formacion').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
});





//llena el campo área con la gran área correspondiente
$('#select_gran_area_interes').change(function(event){
	console.log('');
	$('#select_area_interes').empty();


	$.get('area/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#select_area_interes').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
});


//llena el campo área con la gran área correspondiente
$('#select_area_interes').change(function(event){
	console.log('');
	$('#select_disciplina_interes').empty();


	$.get('area/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#select_disciplina_interes').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
});





//Agegar institución donde labora

$("#agregaInstituto").click(function(){
	var id_instituto = $("#selectInstitution").val();
	var ruta = "addUniversity";
	var token = $("#token").val();
	
	if(id_instituto==null || id_instituto==0){
		
		
		
		if($('#messageSaveVinculationerror').is(":visible")){
                
            }else{
            	$('#messageSaveVinculationerror').toggle("show");
            }

		if($('#messageSaveVinculation').is(":visible")){
                $('#messageSaveVinculation').toggle("fast");
            }
	}else{
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_institute: id_instituto},
		success:function(info){
			

		if($('#messageSaveVinculation').is(":visible")){
                
            }else{
            	$('#messageSaveVinculation').toggle("show");
            }


		if($('#messageSaveVinculationerror').is(":visible")){
                $('#messageSaveVinculationerror').toggle("fast");
            }

            $("#listadeinstitutosvinculados").append("<div class='item' id='institutionList"+info.id_institution+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='delete_institution_vinul("+info.id_institution+")'>Eliminar</a> </div>   <div class='content'>"+info.name_institution+" - ("+info.state_institution+")  </div> </div>");

			$( "#idlisaveinstitute" ).append( "Se guardó ("+info.name_institution+") como instituto de tabajo.<br>");

		}

	});
	}
	
});








//Agegar una institución que no existe

$("#addInstituteNew").click(function(){
	var name_new = $("#otherInstitute").val();
	var id_lugar = $('#selectCity').val();
	var ruta = "addUniversityNew";
	var token = $("#token").val();
	console.log("lugar prueba nuevo: "+id_lugar);


	if(id_lugar!=null && id_lugar!=''){
		if(name_new!=''){
		$.ajax({
			url: ruta,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data:{name_new_institute: name_new,id_lugar_city: id_lugar},
				success:function(info){
					console.log('Se agregó ');
					$("#listadeinstitutosvinculados").append("<div class='item'>  <div class='right floated content'></div>   <div class='content'>Se ha enviado la solicitud para agregar una nueva universidad - ("+name_new+") está por el momento inactiva </div> </div>");
					$('#messageNewInstitutioneror').removeClass('error');
					$('#messageNewInstitutioneror').addClass('green');
					$('#exitNewUniversity').html('Se Agregó la institución correctamente para ser verificada');
				}
			});
		}else{
			$('#messageNewInstitutioneror').removeClass('green');
			$('#messageNewInstitutioneror').addClass('error');
			$('#exitNewUniversity').html('Ingrese nombre de nueva institución');
		}
	}else{
		$('#messageNewInstitutioneror').css('display', 'block');
	}



});




//Elimina un institución de vinculación


function delete_institution_vinul(id_ins){

	var id_instituto = id_ins;
	var ruta = "deleteUniversity";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_institute: id_instituto},
		success:function(info){
			console.log('entró');
            	$('#institutionList'+id_instituto).toggle("fast");

		}

	});
	
}
	













// método que agrega una nueva área de interés




$("#addGranAreaFormation").click(function(){
	var id_gran_area_formacion = $("#select_gran_area_formacion").val();
	var ruta = "addNewLargeAreaTraining";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_large_area_training").append("<div class='item' id='listLargeAreTrainingItem"+info.id_areas_formacion+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteLargeAreaTraining("+info.id_areas_formacion+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});

//Se elimina gran área de formación 

function deleteLargeAreaTraining(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaTraining";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formcion: id_gran_area_formcion_var},
		success:function(info){
			console.log('entró');
            $('#listLargeAreTrainingItem'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}














//Agrega y elimina área de formación

$("#addAreaFormation").click(function(){
	var id_gran_area_formacion = $("#select_area_formacion").val();
	var ruta = "addNewLargeAreaTraining";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_area_training").append("<div class='item' id='listAreTrainingItem"+info.id_areas_formacion+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteAreaTraining("+info.id_areas_formacion+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});


function deleteAreaTraining(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaTraining";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formcion: id_gran_area_formcion_var},
		success:function(){
			console.log('entró abajo');
            $('#listAreTrainingItem'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}



















//Agrega y elimina área de formación

$("#addDisciplineAreaFormation").click(function(){
	var id_gran_area_formacion = $("#select_disciplina_formacion").val();
	var ruta = "addNewLargeAreaTraining";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_discipline_area_training").append("<div class='item' id='listDisciplineAreTrainingItem"+info.id_areas_formacion+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteDisciplineAreaTraining("+info.id_areas_formacion+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});



function deleteDisciplineAreaTraining(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaTraining";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formcion: id_gran_area_formcion_var},
		success:function(){
			console.log('entró abajo');
            $('#listDisciplineAreTrainingItem'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}













//Agrega y elimina áreas de interés


$("#addDisciplineAreaInterest").click(function(){
	var id_gran_area_formacion = $("#select_gran_area_interes").val();
	var ruta = "addNewLargeAreaInterest";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_discipline_area_Interest").append("<div class='item' id='listDisciplineAreInterestItem"+info.id_areas_interes+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteDisciplineAreaInterest("+info.id_areas_interes+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});


function deleteDisciplineAreaInterest(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaInterest";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_interes: id_gran_area_formcion_var},
		success:function(){
			console.log('entró abajo');
            $('#listDisciplineAreInterestItem'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}


















//Agrega y elimina áreas de interés


$("#addAreaInterest").click(function(){
	var id_gran_area_formacion = $("#select_area_interes").val();
	var ruta = "addNewLargeAreaInterest";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_area_Interest").append("<div class='item' id='listAreInterestItem"+info.id_areas_interes+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteAreaInterest("+info.id_areas_interes+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});


function deleteAreaInterest(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaInterest";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_interes: id_gran_area_formcion_var},
		success:function(){
			console.log('entró abajo');
            $('#listAreInterestItem'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}






















//Agrega y elimina disciplina de interés


$("#addAreaInterestDiscipline").click(function(){
	var id_gran_area_formacion = $("#select_disciplina_interes").val();
	var ruta = "addNewLargeAreaInterest";
	var token = $("#token").val();


if(id_gran_area_formacion!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_formacion_institute: id_gran_area_formacion},
		success:function(info){
			console.log('Se agregó gran área '+id_gran_area_formacion);
			$("#list_area_Interest_discipline").append("<div class='item' id='listAreInterestItemDiscipline"+info.id_areas_interes+"'>  <div class='right floated content'><a class='ui label button color_3' onclick='deleteAreaInterestDiscipline("+info.id_areas_interes+")'>Eliminar</a> </div>   <div class='content'>"+info.name_theme+"   </div> </div>");
			
			}
		});
	}
});


function deleteAreaInterestDiscipline(id_gran_area){

	var id_gran_area_formcion_var = id_gran_area;
	var ruta = "deleteLargeAreaInterest";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_gran_area_interes: id_gran_area_formcion_var},
		success:function(){
			console.log('entró abajo');
            $('#listAreInterestItemDiscipline'+id_gran_area_formcion_var).toggle("fast");

		}

	});
	
}
















//Cambiar Contraseña


$("#buttonChangePassword").click(function(){
	var passwordNow = $("input[name='passwordNow']").val();
	var passwordNew = $("input[name='passwordNew']").val();
	var passwordNRepeat = $("input[name='passwordNewRepeat']").val();
	var ruta = "editPassword";
	var token = $("#token").val();
console.log('');
	if(passwordNow.length >= 6){


			if (passwordNew.length >= 6) {
				if (passwordNRepeat == passwordNew) {

					$.ajax({
						url: ruta,
						headers: {'X-CSRF-TOKEN': token},
						type: 'POST',
						dataType: 'json',
						data:{password: passwordNow, password_confirmation:passwordNew, token:token, email:'dvd_cheztorres@hotmail.com'},
						success:function(info){
							
							
							if(info==1){
								$('#messageErrorChangePassword').css("display", "block");
								$("#passwordChangeNow").removeClass("error");
								$("#repeat_password_change").removeClass("error");
								$("#passwordChangeNew").removeClass("error");
								$('#messageErrorChangePassword').removeClass("error");
								$('#messageErrorChangePassword').addClass("green");
								$('#errorsChangePasswordp').html('La contraseña se guardó con éxito');

							}else{
								$('#messageErrorChangePassword').removeClass("green");
								$('#messageErrorChangePassword').addClass("error");
								$('#messageErrorChangePassword').css("display", "block");
								$("#passwordChangeNow").addClass("error");
								$('#errorsChangePasswordp').html('La contraseña actual no es correcta');
							}

							}
						});

				}else{
					$('#messageErrorChangePassword').removeClass("green");
					$('#messageErrorChangePassword').css("display", "block");
					$("#passwordChangeNow").removeClass("error");
					$("#repeat_password_change").addClass("error");
					$("#passwordChangeNew").addClass("error");
					$('#errorsChangePasswordp').html('Las contaseñas no coinciden');
				}
			}else{
				$('#messageErrorChangePassword').removeClass("green");
				$('#messageErrorChangePassword').css("display", "block");
				$("#passwordChangeNow").removeClass("error");
				$("#passwordChangeNew").addClass("error");
				$('#errorsChangePasswordp').html('La contraseña nueva debe ser de mínimo 6 caracteres');
			}


	}else{

		$('#messageErrorChangePassword').removeClass("green");
		$('#messageErrorChangePassword').css("display", "block");
		$("#passwordChangeNow").addClass("error");
		$('#errorsChangePasswordp').html('La contraseña actual debe ser de mínimo 6 caracteres');
	}



	
	
});





$('#changeAccountActive').click(function(){
	var activate = $("#activacion_cuenta").val();
	
	console.log(''+activate);

	if ($("#activacion_cuenta").is(':checked')) {
		var ruta = "delete-account";
		var token = $("#token").val();
				$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{stateUser: 'activo'},
					success:function(info){						
						$('#messageActivateAccount').css('display', 'block');
						$('#idmensaje_p_activteAccount').html('Se ha activado su cuenta');
						}
					});
			
	}else if($("#inactivacion_cuenta").is(':checked')){
		var ruta = "delete-account";
		var token = $("#token").val();
				$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{stateUser: 'inactivo'},
					success:function(info){
						$('#messageActivateAccount').css('display', 'block');
						$('#idmensaje_p_activteAccount').html('Se ha inactivado su cuenta');
						}
					});
	}else{
		var ruta = "delete-account";
		var token = $("#token").val();
				$.ajax({
					url: ruta,
					headers: {'X-CSRF-TOKEN': token},
					type: 'POST',
					dataType: 'json',
					data:{stateUser: 'inactivo'},
					success:function(info){
						$('#messageActivateAccount').css('display', 'block');
						$('#idmensaje_p_activteAccount').html('Se ha inactivado su cuenta');
						}
					});
	}

	
	

});

















//LLena el campo de país y ciudad segun la universidad que seleccione
$('#selectMVinculation').change(function(event){
	if ($('#changeInstitution_location').is(":visible")) {
          $('#changeInstitution_location').toggle('fast');
        }

        $('#selectCity').empty();

	$.get('get-pocation-institution/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			
			$('#name_country_title').html("País - ("+response[i].nombre_pais +")");
			
			$("#selectCountry option[value="+ response[i].id_pais +"]").attr("selected",true);

			$('#selectCity').append("<option value="+response[i].id_ciudad+" >"+response[i].nombre_ciudad+"</option>");
			$('#name_city_title').html("Ciudad - ("+response[i].nombre_ciudad +")");
			
			$("#selectCity option[value="+ response[i].id_ciudad +"]").attr("selected",true);

			$("#sectorUniversityCheck").prop("checked", false);
			$("#sectorBasicCheck").prop("checked", false);
			if(response[i].setor_institution=='universitario'){
				$("#sectorUniversityCheck").prop("checked", true);
				
			}else{
				$("#sectorBasicCheck").prop("checked", true);

			}
			

		}
	});

	          $('#changeInstitution_location').toggle('show');
	       



});




















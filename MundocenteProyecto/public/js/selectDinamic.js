
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


	$('#cityChange').toggle("show");
	$('#selectCity').append('<option value="0" disabled="true">Ninguno</option>');
	$('#selectCity > option[value="0"]').attr('selected', 'selected');

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


	$.get('area/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#select_area_formacion').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
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
	var ruta = "addUniversityNew";
	var token = $("#token").val();


if(name_new!=''){
		$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{name_new_institute: name_new},
		success:function(info){
			console.log('Se agregó ');
			$("#listadeinstitutosvinculados").append("<div class='item'>  <div class='right floated content'></div>   <div class='content'>Se ha enviado la solicitud para agregar una nueva universidad - ("+name_new+") está por el momento inactiva </div> </div>");
		}
	});
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
	








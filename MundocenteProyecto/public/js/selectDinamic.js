
//Llena el campo ciudad con el país correspondiente
$('#selectCountry').change(function(event){
	console.log('');
	$('#selectCity').empty();


	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
});







//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity').change(function(event){
	console.log('');
	$('#selectInstitution').empty();


	$.get('university/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
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
	var ruta = "http://localhost:8000/addUniversity";
	var token = $("#token").val();
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_institute: id_instituto},
		success:function(info){
			$( "#listadeinstitutosvinculados" ).append( "<div class='item'><div class='right floated content'>'"+info+"'</div></div>");
		}

	});
});






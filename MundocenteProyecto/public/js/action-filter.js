

//gran área convocatoria
$('#change_filter_gran_area_annoucement').change(function (event) {
	$('#chanfe_filter_annoucemnt_area').empty();
	$('#change_filter_annoucement').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#chanfe_filter_annoucemnt_area').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_annoucement').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_annoucement > option[value="0"]').attr('selected', 'selected');
	$('#chanfe_filter_annoucemnt_area').append('<option value="0" disabled="true"></option>');
	$('#chanfe_filter_annoucemnt_area > option[value="0"]').attr('selected', 'selected');
	$('#change_filter_annoucement').toggle("show");
});


//área convocatoria
$('#change_filter_annoucement').change(function (event) {
	$('#discipline_filter_annoucement').empty();
	$('#div_change_disscipline_annoucement').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#discipline_filter_annoucement').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_annoucement').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_annoucement > option[value="0"]').attr('selected', 'selected');
	$('#div_change_disscipline_annoucement').toggle("show");
});


//select país convocatoria
$('#select_country_filter_annoucement').change(function(event){
	$('#cityChange_div_annoucement').toggle("fast");
	$('#selectCity_filter_annoucement').empty();
	$('#selectInstitution_filter_annoucement').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity_filter_annoucement').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});

	$('#selectCity_filter_annoucement').append('<option value="0" disabled="true"></option>');
	$('#selectCity_filter_annoucement > option[value="0"]').attr('selected', 'selected');
	$('#cityChange_div_annoucement').toggle("show");
});


//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity_filter_annoucement').change(function(event){
	document.getElementById('selectInstitution_filter_annoucement').innerHTML='';
	$('#div_institution_change_filter_annoucement').toggle("fast");
	$('#selectInstitution_filter_annoucement').empty();
	$.get('university/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution_filter_annoucement').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
	    $('#selectInstitution_filter_annoucement').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution_filter_annoucement > option[value="0"]').attr('selected', 'selected');
		$('#div_institution_change_filter_annoucement').toggle("show");
});




































//gran área revista
$('#change_filter_gran_area_paper').change(function (event) {
	$('#chanfe_filter_paper_area').empty();
	$('#change_filter_paper_div').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#chanfe_filter_paper_area').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_paper').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_paper > option[value="0"]').attr('selected', 'selected');
	$('#chanfe_filter_paper_area').append('<option value="0" disabled="true"></option>');
	$('#chanfe_filter_paper_area > option[value="0"]').attr('selected', 'selected');
	$('#change_filter_paper_div').toggle("show");
});


//área revista
$('#chanfe_filter_paper_area').change(function (event) {
	$('#discipline_filter_paper').empty();
	$('#div_change_disscipline_paper').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#discipline_filter_paper').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_paper').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_paper > option[value="0"]').attr('selected', 'selected');
	$('#div_change_disscipline_paper').toggle("show");
});


//select país convocatoria
$('#select_country_filter_paper').change(function(event){
	$('#cityChange_div_paper').toggle("fast");
	$('#selectCity_filter_paper').empty();
	$('#selectInstitution_filter_paper').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity_filter_paper').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
	$('#selectCity_filter_paper').append('<option value="0" disabled="true"></option>');
	$('#selectCity_filter_paper > option[value="0"]').attr('selected', 'selected');
	$('#cityChange_div_paper').toggle("show");
});


//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity_filter_paper').change(function(event){
	$('#div_institution_change_filter_paper').toggle("fast");
	$('#selectInstitution_filter_paper').empty();
	$.get('university/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution_filter_paper').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
	    $('#selectInstitution_filter_paper').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution_filter_paper > option[value="0"]').attr('selected', 'selected');
		$('#div_institution_change_filter_paper').toggle("show");
});

























//gran área evento
$('#change_filter_gran_area_event').change(function (event) {
	$('#chanfe_filter_event_area').empty();
	$('#change_filter_event_div').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#chanfe_filter_event_area').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_event').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_event > option[value="0"]').attr('selected', 'selected');
	$('#chanfe_filter_event_area').append('<option value="0" disabled="true"></option>');
	$('#chanfe_filter_event_area > option[value="0"]').attr('selected', 'selected');
	$('#change_filter_event_div').toggle("show");
});


//área evento
$('#chanfe_filter_event_area').change(function (event) {
	$('#discipline_filter_event').empty();
	$('#div_change_disscipline_event').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#discipline_filter_event').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_event').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_event > option[value="0"]').attr('selected', 'selected');
	$('#div_change_disscipline_event').toggle("show");
});

//select país convocatoria
$('#select_country_filter_event').change(function(event){
	$('#cityChange_div_event').toggle("fast");
	$('#selectCity_filter_event').empty();
	$('#selectInstitution_filter_event').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity_filter_event').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
	$('#selectCity_filter_event').append('<option value="0" disabled="true"></option>');
	$('#selectCity_filter_event > option[value="0"]').attr('selected', 'selected');
	$('#cityChange_div_event').toggle("show");
});


//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity_filter_event').change(function(event){
	$('#div_institution_change_filter_event').toggle("fast");
	$('#selectInstitution_filter_event').empty();
	$.get('university/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution_filter_event').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
	    $('#selectInstitution_filter_event').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution_filter_event > option[value="0"]').attr('selected', 'selected');
		$('#div_institution_change_filter_event').toggle("show");
});























//gran área investigador
$('#change_filter_gran_area_inve').change(function (event) {
	$('#chanfe_filter_inve_area').empty();
	$('#change_filter_inve_div').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#chanfe_filter_inve_area').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_inve').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_inve > option[value="0"]').attr('selected', 'selected');
	$('#chanfe_filter_inve_area').append('<option value="0" disabled="true"></option>');
	$('#chanfe_filter_inve_area > option[value="0"]').attr('selected', 'selected');
	$('#change_filter_inve_div').toggle("show");
});


//área investigador
$('#chanfe_filter_inve_area').change(function (event) {
	$('#discipline_filter_inve').empty();
	$('#div_change_disscipline_inve').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#discipline_filter_inve').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_inve').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_inve > option[value="0"]').attr('selected', 'selected');
	$('#div_change_disscipline_inve').toggle("show");
});
//select país convocatoria
$('#select_country_filter_inve').change(function(event){
	$('#cityChange_div_inve').toggle("fast");
	$('#selectCity_filter_inve').empty();
	$('#selectInstitution_filter_inve').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity_filter_inve').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
	$('#selectCity_filter_inve').append('<option value="0" disabled="true"></option>');
	$('#selectCity_filter_inve > option[value="0"]').attr('selected', 'selected');
	$('#cityChange_div_inve').toggle("show");
});


//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity_filter_inve').change(function(event){
	$('#div_institution_change_filter_inve').toggle("fast");
	$('#selectInstitution_filter_inve').empty();
	$.get('university/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution_filter_inve').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
	    $('#selectInstitution_filter_inve').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution_filter_inve > option[value="0"]').attr('selected', 'selected');
		$('#div_institution_change_filter_inve').toggle("show");
});























//gran área evaluador
$('#change_filter_gran_area_eva').change(function (event) {
	$('#chanfe_filter_eva_area').empty();
	$('#change_filter_eva_div').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#chanfe_filter_eva_area').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_eva').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_eva > option[value="0"]').attr('selected', 'selected');
	$('#chanfe_filter_eva_area').append('<option value="0" disabled="true"></option>');
	$('#chanfe_filter_eva_area > option[value="0"]').attr('selected', 'selected');
	$('#change_filter_eva_div').toggle("show");
});


//área evaluador
$('#chanfe_filter_eva_area').change(function (event) {
	$('#discipline_filter_eva').empty();
	$('#div_change_disscipline_eva').toggle("fast");
	$.get('area/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#discipline_filter_eva').append("<option value='"+response[i].id_tema+"'> "+ response[i].name_theme +" </option>");
		}
	});
	$('#discipline_filter_eva').append('<option value="0" disabled="true"></option>');
	$('#discipline_filter_eva > option[value="0"]').attr('selected', 'selected');
	$('#div_change_disscipline_eva').toggle("show");
});

//select país convocatoria
$('#select_country_filter_eva').change(function(event){
	$('#cityChange_div_eva').toggle("fast");
	$('#selectCity_filter_eva').empty();
	$('#selectInstitution_filter_eva').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity_filter_eva').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
	$('#selectCity_filter_eva').append('<option value="0" disabled="true"></option>');
	$('#selectCity_filter_eva > option[value="0"]').attr('selected', 'selected');
	$('#cityChange_div_eva').toggle("show");
});


//llena el campo de instituciones según la ciudad seleccionada
$('#selectCity_filter_eva').change(function(event){
	$('#div_institution_change_filter_eva').toggle("fast");
	$('#selectInstitution_filter_eva').empty();
	$.get('university/'+event.target.value+ "" , function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			$('#selectInstitution_filter_eva').append("<option value='"+response[i].id_institution+"'> "+ response[i].name_institution +" </option>");
		}
	});
	    $('#selectInstitution_filter_eva').append('<option value="0" disabled="true">Seleccione Institución</option>');
		$('#selectInstitution_filter_eva > option[value="0"]').attr('selected', 'selected');
		$('#div_institution_change_filter_eva').toggle("show");
});

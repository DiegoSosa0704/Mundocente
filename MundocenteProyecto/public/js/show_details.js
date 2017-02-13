function showDetailsPublication(id_publication) {

	var title_announcement = $('#title_publication'+id_publication).val();
	$('#title_modal_announcement').html(title_announcement);
	var sector = $('#sector_publication'+id_publication).val();	
	
	if(sector=='preescolar'){
		$('#sector_modal_announcement').html('Preescolar, Básica y media');
	}else{
		$('#sector_modal_announcement').html('Universitario');
	}

	var name_institution = $('#name_institution_publication'+id_publication).val();
	$('#institution_modal_announcement').html(name_institution);	

	document.getElementById('div_gran_area_modal_annoncement').innerHTML='';
	document.getElementById('div_area_modal_annoncement').innerHTML='';
	document.getElementById('div_disciplina_modal_annoncement').innerHTML='';
	$.get('obtener-areas-pulicacion/'+id_publication, function(response, ciudad){
		for (var i = 0 ; i < response.length; i++) {
			if(response[i].type_theme=='gran_area'){
				$('#div_gran_area_modal_annoncement').append("<div class='item'>"+response[i].name_theme+"</div>");
			}
			if(response[i].type_theme=='area'){
				$('#div_area_modal_annoncement').append("<div class='item'>"+response[i].name_theme+"</div>");
			}
			if(response[i].type_theme=='disciplina'){
				$('#div_disciplina_modal_annoncement').append("<div class='item'>"+response[i].name_theme+"</div>");
			}
			
		}
	});


	var city_announcement = $('#name_city_publication'+id_publication).val();
	$('#name_city_modal_anouncement').html(city_announcement);

	var description_announ = $('#description_publication'+id_publication).val();
	$('#text_description_modal_announcement').html(description_announ);	

	$('#contact_modal_announcement').css('display', 'block');
	var contact_annonucen = $('#contact_publication'+id_publication).val();
	if(contact_annonucen!=''){
		$('#contact_modal_announcement').html(contact_annonucen);	
	}else{
		$('#contact_modal_announcement').css('display', 'none');
	}
	
	$('#link_modal_announcement').css('display', 'block');
	var link_announ = $('#link_publication'+id_publication).val();
	if(link_announ!=''){
		$('#link_modal_announcement').html(link_announ);
		$('#link_modal_announcement').attr('href', link_announ);
	}else{
		$('#link_modal_announcement').css('display', 'none');
	}

	$('#space_image_modal_details').css('display', 'block');
	var url_photo = $('#photo_publication'+id_publication).val();
	if(url_photo!=''){
		$('#image_modal_publication').attr('src', url_photo);
	}else{
		$('#space_image_modal_details').css('display', 'none');
	}

	var indexada = $('#id_type_publication'+id_publication).val();
	$('#indexing-data-modal-details').css('display', 'none');
	if(indexada==1){
		$('#indexing-data-modal-details').css('display', 'block');
		var level_index = "";
			$.get('obtener-niveles-revistass/'+id_publication, function(level_clasification, ciudad){
			for (var i = 0 ; i < level_clasification.length; i++) {
				var id_indice = level_clasification[i].id_index_fk;
				level_index = level_clasification[i].value_level;
					$.get('obtener-indices-revistass/'+level_clasification[i].id_level, function(indices, ciudad){
						for (var k = 0 ; k < indices.length; k++) {						
$('#div_data_index_clasification').append("<label>"+indices[k].name_index+":    </label> <span> "+indices[k].value_level+"</span><br>");
							}
						});
				}
			});

	}else{
		$('#indexing-data-modal-details').css('display', 'none');
		$('#indice_clasificacion_modal_publicacion').html('No está indexda');
	}
	

	var date_start_announ = $('#date_start_publication'+id_publication).val();
	$('#date_start_modal_annoucement').html(date_start_announ);	
	var date_end_announ = $('#date_end_publication'+id_publication).val();
	$('#date_end_modal_annoucement').html(date_end_announ);	






	$('.modal.details-announcement')
            .modal('show')
    ;
}
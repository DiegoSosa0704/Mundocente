//función que agrega a favoritos una publicación
function addFavoritePublication(id_publication){

	var id_publication_fk = id_publication;
	var ruta = "add-favorite";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_publication: id_publication_fk},
		success:function(info){
			$('#favorite_button'+id_publication_fk).html('<i class="star icon"></i>'+info+' Favorito');
			
		}
	});

			var color = $('#favorite_button'+id_publication_fk).css('color');
			if(color == 'rgb(214, 219, 71)'){
				$('#favorite_button'+id_publication_fk).css('color','rgb(150,150,150)');
			}else{
				$('#favorite_button'+id_publication_fk).css('color','rgb(214, 219, 71)');
			}

	
	
}





//función que agrega a interesados una publicación
function addInterestPublication(id_publication){

	var id_publication_fk = id_publication;
	var ruta = "add-interest";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_publication: id_publication_fk},
		success:function(info){
			$('#interest_button'+id_publication_fk).html('<i class="like icon"></i> '+info+' Me interesa');
            

		}

	});

	var color = $('#interest_button'+id_publication_fk).css('color');

			if(color == 'rgb(221, 13, 41)'){
				$('#interest_button'+id_publication_fk).css('color','rgb(150,150,150)');
			}else{
				$('#interest_button'+id_publication_fk).css('color','rgb(221, 13, 41)');
			}
	
}






//función que agrega a interesados una publicación
function addIReportPublication(id_publication){

	var id_publication_fk = id_publication;
	var ruta = "add-report";
	var token = $("#token").val();
	
	$.ajax({
		url: ruta,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{id_publication: id_publication_fk},
		success:function(){
			$('#button_report_details').html("Has denunciado esta publicación");
			$('#button_report_details').attr("disabled","true");


		}

	});
	
}
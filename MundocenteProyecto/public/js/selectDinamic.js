$('#selectCountry').change(function(event){
	console.log('');
	$('#selectCity').empty();
	$.get('listCity/'+event.target.value+ "" , function(response, ciudad){

		for (var i = 0 ; i < response.length; i++) {
			$('#selectCity').append("<option value='"+response[i].id_lugar+"'> "+ response[i].name_lugar +" </option>");
		}
	});
});
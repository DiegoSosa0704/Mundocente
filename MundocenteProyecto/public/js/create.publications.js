//método para publicar convocatoria

$('#addAnnouncement').click(function(){

var institution = $('#selectMVinculation').val();
var country = $('#selectCountry').val();
var city = $('#selectCity').val();
var dateStart = $('#dateStartid').val();
var dateFinish = $('#dateFinishid').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();
var link = $('#url_publication').val();
var contacts = $('#cantactsid').val();
var largeArea = $('#select_gran_area_formacion').val();
var area = $('#select_area_formacion').val();
var disciplines = $('#select_disciplina_formacion').val();
var checkSelectedAllArea = $('#valueCheckallArea').val();



var ruta = "add-announcement";
var token = $("#token").val();


   if(institution.length != 0){
        if(country.length != 0){
            if(city != null){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(largeArea.length != 0 || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                     $('#messageErrorpublication').removeClass('error');
                                        $('#messageErrorpublication').addClass('green');
                                        
                                        $('#idpmessageerrorpublications').html('Se publicó la convocatoria con éxito');
                                    
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            console.log('entró '+info);
                                        }
                                    });
                                }else{
                                        $('#messageErrorpublication').removeClass('error');
                                        $('#messageErrorpublication').addClass('green');
                                        
                                        $('#idpmessageerrorpublications').html('Se publicó la convocatoria con éxito');
                                    
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, large_area: largeArea, 
                                            area: area, disciplines: disciplines, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '1'},
                                        success:function(info){
                                            console.log('entró '+info);
                                        }
                                    });
                                   
                                }
                            }else{
                                removeClassGreenAddError();
                                $('#idpmessageerrorpublications').html('Debe ingresar url de la convocatoria o contacto del interesado');
                            }
                        }else{
                            removeClassGreenAddError();

                            $('#idpmessageerrorpublications').html('El campo título es obligatorio y debe tener máximo 150 carcteres');
                        }
                        }else{
                            removeClassGreenAddError();
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo una gran área');
                        }
                    }else{
                        removeClassGreenAddError();
                        $('#idpmessageerrorpublications').html('Debe ingresar la fecha de finalización de la convocatoria');
                    }
                }else{
                   removeClassGreenAddError();
                    $('#idpmessageerrorpublications').html('Debe ingresar la fecha de inicio de la convocatoria');
                }
            }else{
               removeClassGreenAddError();
                $('#idpmessageerrorpublications').html('Debe agregar la ciudad en donde se hace la convocatoria');
            }
        }else{
            removeClassGreenAddError();
            $('#idpmessageerrorpublications').html('Debe seleccionar país en donde se realiza la convocatoria');
        }
   }else{
    removeClassGreenAddError();
    $('#idpmessageerrorpublications').html('Debe seleccionar institución que realiza la convocatoria');
   }
        
       
     
        
        
      
});
   

function removeClassGreenAddError(){
    $('#messageErrorpublication').removeClass('green');
    $('#messageErrorpublication').addClass('error');
    $('#messageErrorpublication').css('display', 'block');
}

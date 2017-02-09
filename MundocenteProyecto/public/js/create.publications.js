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
var discipline = $('#select_disciplina_formacion').val();
var checkSelectedAllArea = $('#valueCheckallArea').val();



   if(institution.length != 0){
        if(country.length != 0){
            if(city != null){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(title.length != 0){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    $('#messageErrorpublication').removeClass('error');
                                    $('#messageErrorpublication').addClass('green');
                                    $('#idpmessageerrorpublications').html('Se publió co éxito, todas las áreas');
                                }else{
                                    
                                            $('#messageErrorpublication').removeClass('error');
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                   
                                }
                            }else{
                                $('#messageErrorpublication').removeClass('green');
                                $('#messageErrorpublication').addClass('error');
                                $('#messageErrorpublication').css('display', 'block');
                                $('#idpmessageerrorpublications').html('Debe ingresar url de la convocatoria o contacto del interesado');
                            }
                        }else{
                            $('#messageErrorpublication').removeClass('green');
                            $('#messageErrorpublication').addClass('error');
                            $('#messageErrorpublication').css('display', 'block');
                            $('#idpmessageerrorpublications').html('Debe ingesar el título de la convocatoria');
                        }
                    }else{
                        $('#messageErrorpublication').removeClass('green');
                        $('#messageErrorpublication').addClass('error');
                        $('#messageErrorpublication').css('display', 'block');
                        $('#idpmessageerrorpublications').html('Debe ingresar la fecha de finalización de la convocatoria');
                    }
                }else{
                    $('#messageErrorpublication').removeClass('green');
                    $('#messageErrorpublication').addClass('error');
                    $('#messageErrorpublication').css('display', 'block');
                    $('#idpmessageerrorpublications').html('Debe ingresar la fecha de inicio de la convocatoria');
                }
            }else{
                $('#messageErrorpublication').removeClass('green');
                $('#messageErrorpublication').addClass('error');
                $('#messageErrorpublication').css('display', 'block');
                $('#idpmessageerrorpublications').html('Debe agregar la ciudad en donde se hace la convocatoria');
            }
        }else{
            $('#messageErrorpublication').removeClass('green');
            $('#messageErrorpublication').addClass('error');
            $('#messageErrorpublication').css('display', 'block');
            $('#idpmessageerrorpublications').html('Debe seleccionar país en donde se realiza la convocatoria');
        }
   }else{
    $('#messageErrorpublication').removeClass('green');
    $('#messageErrorpublication').addClass('error');
    $('#messageErrorpublication').css('display', 'block');
    $('#idpmessageerrorpublications').html('Debe seleccionar institución que realiza la convocatoria');
   }
        
       
     
        
        
      
});
   

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
            if(city != null ){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(largeArea.length != 0 || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputText();
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
                                    deleteInputText();
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




function deleteInputText(){
    $('#titleid').val('');
    $('#cantactsid').val('');
    $('#descriptionid').val('');
    $('#dateFinishid').val('');
    $('#url_publication').val('');
    $('#messageErrorpublication').css('display', 'block');
    $('#messageErrorpublication').removeClass('error');
    $('#messageErrorpublication').addClass('green');
    $('#idpmessageerrorpublications').html('Se publicó con éxito');
    $('#rangeend').val('');
    $('#timeFinish').val('');
}
























//método para publicar solicitud

$('#addRequestbutton').click(function(){

var institution = $('#selectMVinculation').val();
var dateStart = $('#dateStartid').val();
var dateFinish = $('#dateFinishid').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();

var contacts = $('#cantactsid').val();
var largeArea = $('#select_gran_area_formacion').val();
var area = $('#select_area_formacion').val();
var disciplines = $('#select_disciplina_formacion').val();
var checkSelectedAllArea = $('#valueCheckallArea').val();
var type_request = '0';

if($("#radiooptionrequestproyect").is(':checked')) {
    // 4 es el id de la tabla tema__notificacions con el nombre de solicitud a proyecto
    type_request = '4';
}else{
    // 5 es el id de la tabla tema__notificacions con el nombre de solicitud a evaluador
    type_request = '5';
}


var sector = '';

if($("#sectorUniversityCheck").is(':checked') && !$("#sectorBasicCheck").is(':checked')) {
    sector = 'universitario';
}else if(!$("#sectorUniversityCheck").is(':checked') && $("#sectorBasicCheck").is(':checked')){
    sector = 'preescolar';
}else if($("#sectorUniversityCheck").is(':checked') && $("#sectorBasicCheck").is(':checked')){
    sector = 'ambos';
}


var ruta = "add-solicitud";
var token = $("#token").val();


        if(institution.length != 0){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(largeArea.length != 0 || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputText();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{sector_request: sector,type_request:type_request, id_institute: institution, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, 
                                            contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            console.log('entró '+info);
                                        }
                                    });
                                }else{
                                    deleteInputText();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{sector_request: sector,type_request:type_request, id_institute: institution, 
                                            dateStart: dateStart, dateFinis:dateFinish, large_area: largeArea, 
                                            area: area, disciplines: disciplines, title: title, contact: contacts,
                                             description: description, allArea: '1'},
                                        success:function(info){
                                            console.log('entró '+info);
                                        }
                                    });
                                   
                                }
                            }else{
                                removeClassGreenAddError();
                                $('#idpmessageerrorpublications').html('Debe ingresar algún dato para poder contactar los interesados');
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
                        $('#idpmessageerrorpublications').html('Debe ingresar la fecha de finalización de la solicitud');
                    }
                }else{
                   removeClassGreenAddError();
                    $('#idpmessageerrorpublications').html('Debe ingresar la fecha de inicio de la solicitud');
                }
            }else{
                removeClassGreenAddError();
                $('#idpmessageerrorpublications').html('Debe seleccionar institución que realiza la solicitud');
            }
        
       
     
        
        
      
});







































//método para publicar evento

$('#addpublicationeventbutton').click(function(){


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
var hourStart = $('#inputvaluehourStart').val();
var hourFinish = $('#inputvaluehourFinish').val();
var imagePublication = $('#imageAuxTemp').val();



var sector = '';

if($("#sectorUniversityCheck").is(':checked') && !$("#sectorBasicCheck").is(':checked')) {
    sector = 'universitario';
}else if(!$("#sectorUniversityCheck").is(':checked') && $("#sectorBasicCheck").is(':checked')){
    sector = 'preescolar';
}else if($("#sectorUniversityCheck").is(':checked') && $("#sectorBasicCheck").is(':checked')){
    sector = 'ambos';
}


var ruta = "add-evento";
var token = $("#token").val();


   if(institution.length != 0){
        if(country.length != 0){
            if(city != null ){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(largeArea.length != 0 || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputText();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{url_image:imagePublication, sector_request: sector, hour_i:hourStart, hour_f: hourFinish, id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            console.log('entró '+info);
                                        }
                                    });
                                }else{
                                    deleteInputText();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{url_image:imagePublication, sector_request: sector, hour_i:hourStart, hour_f: hourFinish, id_institute: institution, id_country: country, id_city: city, 
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
                                $('#idpmessageerrorpublications').html('Debe ingresar url del evento o contacto del interesado');
                            }
                        }else{
                            removeClassGreenAddError();

                            $('#idpmessageerrorpublications').html('El nombre del evento es obligatorio y debe tener máximo 150 carcteres');
                        }
                        }else{
                            removeClassGreenAddError();
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo una gran área');
                        }
                    }else{
                        removeClassGreenAddError();
                        $('#idpmessageerrorpublications').html('Debe ingresar la fecha de finalización del evento');
                    }
                }else{
                   removeClassGreenAddError();
                    $('#idpmessageerrorpublications').html('Debe ingresar la fecha de inicio del evento');
                }
            }else{
               removeClassGreenAddError();
                $('#idpmessageerrorpublications').html('Debe agregar la ciudad en donde se realiza el evento');
            }
        }else{
            removeClassGreenAddError();
            $('#idpmessageerrorpublications').html('Debe seleccionar país en donde se realiza el evento');
        }
   }else{
    removeClassGreenAddError();
    $('#idpmessageerrorpublications').html('Debe seleccionar institución que realiza el evento');
   }
        
       
     
        
        
      
});





















//sube imagen pra publicación

$(function(){
    $("input[name='file']").on("change", function(){
        var dataForm = new FormData($("#formularioimage")[0]);
        var routeimage = "upload-image-publication";
        var token = $("#token").val();
        $.ajax({
            url: routeimage,
            headers: {'X-CSRF-TOKEN': token},
            type: "POST",
            data: dataForm,
            contentType: false,
            processData: false, 
            success: function(info){
                $('#imageAuxTemp').val(info);
                $('#imageNewShow').attr('src',info);

            }
        });
    });
});








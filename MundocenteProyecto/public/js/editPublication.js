

function deleteInputTextEdit(){
    $('#idpmessageerrorpublications').html('');
    $('#messageErrorpublication').css('display', 'none');
    $('#messageErrorpublication').removeClass('error');
    $('#messageErrorpublication').addClass('green');
    
}


//método para editar convocatoria

$('#editAnnouncement').click(function(){

var institution = $('#selectMVinculation').val();
var country = $('#selectCountry').val();
var city = $('#selectCity').val();
var dateStart = $('#dateStartid').val();
var dateFinish = $('#dateFinishid').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();
var link = $('#url_publication').val();
var contacts = $('#cantactsid').val();
var disciplines = $('#select_disciplina_formacion').val();
var checkSelectedAllArea = $('#valueCheckallArea').val();




var id_publication = $('#id_publication_edit').val();

if($("#sectorUniversityCheck").is(':checked')) {  
            sector = 'universitario';
        } else {  
            sector = 'preescolar';
        }


var ruta = "edit-announcement";
var token = $("#token").val();


   if(institution.length != 0){
        if(country.length != 0){
            if(city != null ){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(disciplines != null || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, id_institute: institution,sector_request: sector, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                    loadLine();
                                    
                                }else{
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart,sector_request: sector, dateFinis:dateFinish,disciplines: disciplines, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '1'},
                                        success:function(info){
                                            
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                            
                                        }
                                    });
                                   loadLine();
                                   
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
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo un área');
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























//método para editar eventos





//método para publicar evento

$('#editpublicationeventbutton').click(function(){

var id_publication = $('#id_publication_edit').val();

var institution = $('#selectMVinculation').val();
var country = $('#selectCountry').val();
var city = $('#selectCity').val();
var dateStart = $('#dateStartid').val();
var dateFinish = $('#dateFinishid').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();
var link = $('#url_publication').val();
var contacts = $('#cantactsid').val();
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

var ruta = "edit-event";
var token = $("#token").val();


   if(institution.length != 0){
        if(country.length != 0){
            if(city != null ){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(disciplines != null || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, url_image:imagePublication, sector_request: sector, hour_i:hourStart, hour_f: hourFinish, id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                    loadLine();
                                }else{
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, url_image:imagePublication, sector_request: sector, hour_i:hourStart, hour_f: hourFinish, id_institute: institution, id_country: country, id_city: city, 
                                            dateStart: dateStart, dateFinis:dateFinish, 
                                             disciplines: disciplines, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '1'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                            
                                        }
                                    });
                                    
                                   loadLine();
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
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo un área');
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

































//método para publicar evento

$('#editRequestbutton').click(function(){

var id_publication = $('#id_publication_edit').val();

var institution = $('#selectMVinculation').val();
var city = $('#selectCity').val();
var dateStart = $('#dateStartid').val();
var dateFinish = $('#dateFinishid').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();

var contacts = $('#cantactsid').val();
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


var ruta = "edit-request";
var token = $("#token").val();


        if(institution.length != 0){
                if(dateStart.length != 0){
                    if(dateFinish.length != 0){
                        if(disciplines != null || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, id_city:city, sector_request: sector,type_request:type_request, id_institute: institution, 
                                            dateStart: dateStart, dateFinis:dateFinish, title: title, 
                                            contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                    loadLine();
                                }else{
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, id_city:city,sector_request: sector,type_request:type_request, id_institute: institution, 
                                            dateStart: dateStart, dateFinis:dateFinish, 
                                             disciplines: disciplines, title: title, contact: contacts,
                                             description: description, allArea: '1'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                    loadLine();
                                   
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
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo un área');
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
















//método para publicar revista científica

$('#editbuttonaddpaper').click(function(){

var id_publication = $('#id_publication_edit').val();


var institution = $('#selectMVinculation').val();
var country = $('#selectCountry').val();
var city = $('#selectCity').val();
var title = $('#titleid').val();
var description = $('#descriptionid').val();
var link = $('#url_publication').val();
var contacts = $('#cantactsid').val();
var disciplines = $('#select_disciplina_formacion').val();
var checkSelectedAllArea = $('#valueCheckallArea').val();


var imagePublication = $('#imageAuxTemp').val();

var quantityIndex = $('#idquantitypaperindex').val();

var indexada = '';

if($("#checkpaperindex").is(':checked') ) {
    indexada = 'si';
    var level = [];
    for (var i = 0; i <= quantityIndex; i++) {
        level[i] = $('#selectpaperindex'+i).val();
    }
    var levelValidate = [];

    for (var i = 0; i <= level.length; i++) {
        if(level[i]!=null && level[i]!=''){
            levelValidate.push(level[i]);
        }
    }

    for (var i = 0; i < levelValidate.length; i++) {
        console.log("datos válidos indexción: "+levelValidate[i]);
    }
}else{
    indexada = 'no';
}




var ruta = "edit-revista";
var token = $("#token").val();


   if(institution.length != 0){
        if(country.length != 0){
            if(city != null ){
                        if(disciplines != null || checkSelectedAllArea == 2){
                            if(title.length != 0 && title.length < 150){
                            if(link.length != 0 || contacts.length != 0){
                                if(checkSelectedAllArea == 2){
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, arraylevels:levelValidate, url_image:imagePublication, id_institute: institution, id_country: country, id_city: city, 
                                              title: title, url_link: link, contact: contacts, description: description, allArea: '2'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                    loadLine();
                                }else{
                                    deleteInputTextEdit();
                                    $.ajax({
                                        url: ruta,
                                        headers: {'X-CSRF-TOKEN': token},
                                        type: 'POST',
                                        dataType: 'json',
                                        data:{id_p:id_publication, arraylevels:levelValidate, url_image:imagePublication, id_institute: institution, id_country: country, id_city: city, disciplines: disciplines, title: title, url_link: link,
                                             contact: contacts, description: description, allArea: '1'},
                                        success:function(info){
                                            
                                            $('#messageErrorpublication').addClass('green');
                                            $('#idpmessageerrorpublications').html('Se publicó con éxito');
                                            $('#messageErrorpublication').css('display', 'block');
                                        }
                                    });
                                   loadLine();
                                }
                            }else{
                                removeClassGreenAddError();
                                $('#idpmessageerrorpublications').html('Debe ingresar url o algún contacto de la revista');
                            }
                        }else{
                            removeClassGreenAddError();

                            $('#idpmessageerrorpublications').html('El título de la revista es obligatorio y debe tener máximo 150 carcteres');
                        }
                        }else{
                            removeClassGreenAddError();
                            $('#idpmessageerrorpublications').html('Debe ingresar mínimo un área');
                        }
                   
                
            }else{
               removeClassGreenAddError();
                $('#idpmessageerrorpublications').html('Debe agregar la ciudad ');
            }
        }else{
            removeClassGreenAddError();
            $('#idpmessageerrorpublications').html('Debe seleccionar país');
        }
   }else{
    removeClassGreenAddError();
    $('#idpmessageerrorpublications').html('Debe seleccionar institución que publica la revista');
   }
        
    
});


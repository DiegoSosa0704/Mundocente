<div class="ui modal details-announcement">
    <i class="close icon"></i>
    <div class="segment-title">
        <div class="ui left aligned container">
            <h1 class="ui header" id="title_modal_announcement">
                Convocatoria </h1>
            <br>
        </div>
    </div>
    <div class="content">
        <div class="ui equals width stackable form grid">
            <div class="three column row">

                <div class="column">
                    <div class="field">
                        <label>Institución: </label>
                        <div class="ui large label color_2" id="institution_modal_announcement"></div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label>Sector educativo: </label>
                        <div class="ui large label color_1" id="sector_modal_announcement"></div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label>Ciudad:</label>
                        <div class="ui large label color_1" id="name_city_modal_anouncement"></div>
                    </div>
                </div>
                <div class="column" id="space_image_modal_details">
                    
                        <br>

                        <div class="field">
                            <img class="ui centered medium image" src="images/public-image.png" alt=""
                                 id="image_modal_publication" >
                        </div>
                    
                </div>

            </div>
        </div>
        <div class="ui form">


            <br>
            <!--Datos de indexación-->
            <div id="indexing-data-modal-details" class="ui segment" style="display: none;">
                <h4 class="ui dividing bold header">Indexada en:</h4>
                <div class="inline field" id="div_data_index_clasification">


                </div>
            </div>

            <div class="field">
                <h5 class="ui header"><b>Áreas de conocimiento</b></h5>
                



                <br>
                   <label><b>Seleccionados</b></label>
                                    <table class="ui celled table" id="table_areas_formation_details">
                                          <thead>
                                            <tr><th>Gran Área</th>
                                            <th>Área</th>
                                            <th>Disciplina</th>
                                            
                                          </tr></thead>
                                          <tbody id="add_temas_formation_details">
                                             
                                                    <tr>
                                                       <td>  </td>
                                                       <td></td>
                                                       <td> </td> 
                                                    </tr>
                                                    
                                          </tbody>
                                        </table>
            </div>
            <div class="field">
                <h5 class="ui header"><b>Detalles</b></h5>
                <div class="ui segment">
                    <span><b>Descripción: </b></span>
                    <p id="text_description_modal_announcement"></p>
                    <span><b>Para más información: </b></span>
                    <a class="ui teal tag label" id="link_modal_announcement" target="_black">Enlace a convocatoria</a>
                    <p id="contact_modal_announcement"></p>


                    <div class="field">
                        <br>
                        <label>Fecha:</label>
                        <div class="ui celled horizontal list">
                            <div class="item">
                                <span>
                                    <b>Desde:</b>
                                    <span id="date_start_modal_annoucement"></span>
                                </span>
                            </div>
                            <div class="item">
                                <span>
                                    <b>Hasta:</b>
                                    <span id="date_end_modal_annoucement"></span>
                                </span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        
        <button class="ui button red" id="button_report_details" >Denunciar publicación</button>
    </div>
</div>

   
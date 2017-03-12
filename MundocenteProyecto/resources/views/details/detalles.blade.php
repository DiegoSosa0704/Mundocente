<div class="ui modal details-announcement">
    <i class="close icon"></i>
    <div class="segment-title">
        <div class="ui left aligned container">
            <h1 class="ui header" id="title_modal_announcement"></h1>
        </div>
    </div>
    <div class="line"></div>
    <div class="content content-modal">
        <div class="ui form">
            <div class="two fields">
                <div class="field" id="space_image_modal_details">
                    <div class="field">
                        <label>Institución: </label>
                        <div class="ui large label color_2" id="institution_modal_announcement"></div>
                    </div>
                    <div class="field">
                        <label>Sector educativo: </label>
                        <div class="ui large label color_1" id="sector_modal_announcement"></div>
                    </div>
                    <div class="field">
                        <label>Ciudad:</label>
                        <div class="ui large label color_1" id="name_city_modal_anouncement"></div>
                    </div>
                    <br>
                    <div class="field">
                        <div id="indexing-data-modal-details" class="ui raised card"
                             style="display: none; width: 100%;">
                            <div class="content">
                                <div class="header">
                                    <h4 class="ui dividing bold header">Indexada en:</h4>
                                </div>
                                <div class="inline field" id="div_data_index_clasification"></div>
                                <table style="font-size: 1.15em"
                                       class="ui unstackable very basic collapsing celled table">
                                    <thead>
                                    <tr>
                                        <th>Índice</th>
                                        <th>Nivel</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            índice1
                                        </td>
                                        <td>
                                            Nivel tales
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            índice2
                                        </td>
                                        <td>
                                            Nivel tales
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Datos de indexación-->
                <div class="field">
                    <img class="ui centered medium image" src="images/public-image.png" alt=""
                         id="image_modal_publication">
                </div>
            </div>
            <div class="field">
                <h4 class="ui dividing header">Áreas de conocimiento</h4>
                <table class="ui celled table" id="table_areas_formation_details">
                    <thead>
                    <tr>
                        <th>Gran Área</th>
                        <th>Área</th>
                        <th>Disciplina</th>

                    </tr>
                    </thead>
                    <tbody id="add_temas_formation_details">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="field">
                <h4 class="ui dividing header">Detalles</h4>
                <label>Descripción:</label>
                <p id="text_description_modal_announcement"></p>
                <label for="">Para más información: </label>
                <p>
                    <a class="ui teal tag label" id="link_modal_announcement" target="_black">Enlace a convocatoria</a>
                    <span id="contact_modal_announcement"></span>
                </p>
                <div class="field">
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
    <div class="actions">
        <button class="ui button red" id="button_report_details">Denunciar publicación</button>
    </div>
</div>


<div class="ui small modal edit-places">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Editar Lugar</h3>
    </div>
    <div class="content">
        <div class="ui form">
            <div class="field">
                <label>Tipo</label>
                <select class="ui" id="edit_select_data_admin_place">
                    <option value="">Seleccione Tipo</option>

                </select>
            </div>
            <div class="field">
                <label for="name">Nombre</label>
                <input type="text" id="nombre_lugar_edit_admin" placeholder="Nombre del lugar" value="">
            </div>

            <input type="hidden" id="id_lugar_edit_admin" value="">
            <div class="field" id="showNewPlaceAdminEdit" style="display: none;">
                <label>País</label>
                <select class="ui" id="select_country_edit_admin">
                    <option value="">Seleccione País</option>
                    @foreach($paises as $pais)
                        <option value="{{$pais->id_lugar}}">{{$pais->name_lugar}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="ui message error" style="display: none;" id="id_messagge_edit_lugar_error">
            <ul class="list">
                <li id="id_messagge_error_p_edit_lugar_error"></li>
            </ul>
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel color_1 button">Salir</div>
        <button class="ui color_3 button" id="save_change_places_edit_admin">Guardar</button>
    </div>
</div>
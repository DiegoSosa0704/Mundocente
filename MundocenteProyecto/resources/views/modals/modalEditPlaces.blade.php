<div class="ui small modal edit-places">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Editar Lugar</h3>
    </div>
    <div class="content">
        <div class="ui form">
        <div class="field">
                <label for="name">Nombre</label>
                <input type="text" id="nombre_lugar_edit_admin" placeholder="Nombre del lugar" value="">
            </div>
            <div class="field">
                <label id="label_title_type_edit_place">Tipo</label>
                <select class="ui dropdown" id="edit_select_data_admin_place">
                    <option value="">Seleccione Tipo</option>
                    
                </select>
            </div>
            <input type="hidden" id="id_lugar_edit_admin" value="">
            <div class="field" id="showNewPlaceAdminEdit" style="display: none;">
            <label id="label_countr_dit_place_dmin">País</label>
             <select class="ui search dropdown" id="select_country_edit_admin">
                    <option value="">Seleccione País</option>
                    @foreach($paises as $pais)
                    <option value="{{$pais->id_lugar}}">{{$pais->name_lugar}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel color_1 button">Salir</div>
        <button class="ui ok color_3 button" id="save_change_places_edit_admin">Guardar</button>
    </div>
</div>
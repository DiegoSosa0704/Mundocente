<div class="ui small modal places">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Nuevo Lugar</h3>
    </div>
    <div class="content">
        <div class="ui form">
            <div class="field">
                <label>Tipo</label>
                <select class="ui dropdown" name="editLugar" id="selectnuevolugaradmnistracion">
                    <option value="country" id="select_new_country">País</option>
                    <option value="city" id="select_new_city" selected="true">Ciudad</option>
                </select>
            </div>
            <div class="field" id="showNewPlaceAdmin">
            <label>País</label>
             <select class="ui search dropdown" id="select_country_new_admin_change">
                    <option value="">Seleccione País</option>
                    @foreach($paises as $pais)
                    <option value="{{$pais->id_lugar}}" selected="true" ">{{$pais->name_lugar}}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label for="city">Nombre</label>
                <input type="text" id="name_place_new" placeholder="Nombre del lugar">
            </div>
        </div>
        <div class="ui message error" style="display: none;" id="id_messagge_add_institution">
        <ul class="list">
            <li id="id_messagge_error_p_add_istitution"></li>
        </ul>
    </div>
    </div>
    <div class="actions">
        <div class="ui cancel color_1 button">Salir</div>
        <button class="ui color_3 button" id="save_new_place_admin">Guardar</button>
    </div>
</div>
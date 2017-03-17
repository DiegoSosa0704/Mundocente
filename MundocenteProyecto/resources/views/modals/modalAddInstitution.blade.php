<div class="ui small modal institution">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Nueva Institución</h3>
    </div>
    <div class="content">
        <div class="ui form">
            <div class="field required">
                <label>Sector</label>
                <select class="ui dropdown" id="sector_institution_new_admin">
                    <option value="">Sector</option>
                    <option value="universitario" selected="true">Universitario</option>
                    <option value="preescolar">Preescolar, Básica y Media</option>
                </select>
            </div>
            <?php
            $paises = DB::table('lugars')->where('type_lugar', 'country')->orderBy('name_lugar', 'asc')->get();
            ?>
            <div class="field required">
                <label for="country">País</label>
                <select class="ui search dropdown" id="selectCountry">
                    <option value="">Seleccione País</option>
                    @foreach($paises as $pais)
                        <option value="{{$pais->id_lugar}}">{{$pais->name_lugar}}</option>
                    @endforeach
                </select>
            </div>
            <div class="field required" id="cityChange">
                <label for="city">Ciudad</label>
                <select class="ui search dropdown" id="selectCity">
                    <option value="">Seleccione Ciudad</option>
                </select>
            </div>
            <div class="field required">
                <label for="name">Nombre Institución</label>
                <input type="text" id="name_institution_new_admin" placeholder="Nombre">
            </div>
            <div class="field">
                <label for="name">Teléfono</label>
                <input type="text" id="telephone_insttucion_new_admin" placeholder="Ingrese teléfono de la institución">
            </div>

        </div>
    </div>

    <div class="ui message error" style="display: none;" id="id_messagge_new_institution">
        <ul class="list">
            <li id="id_messagge_error_p"></li>
        </ul>
    </div>

    <div class="actions">
        <div class="ui cancel color_1 button">Salir</div>
        <div class="ui color_3 button" id="save_new_institution_admin">Guardar</div>
    </div>
</div>
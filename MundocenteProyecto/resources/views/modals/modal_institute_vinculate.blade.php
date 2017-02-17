<div class="ui tiny modal addInstitute">
    <i class="close icon"></i>
    <div class="content">
        <h2 class="ui center aligned header">Vinculación laboral</h2>
        <div class="content ui form">
            
            <input type="hidden" name="_token" , value="{{ csrf_token() }}" id="token">
                                <div class="required field">
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>País en donde se encuentra la universidad</label>

                                            <select class="ui search dropdown" name="countrymodel"
                                                    placeholder="seleccione país de la institución" id="selectCountrymodel">
                                                <option value="">Seleccione país</option>
                                                @foreach($lugares as $lugar)

                                                    <option value="{{$lugar->id_lugar}}"> {{$lugar->name_lugar}}</option>
                                                @endforeach
                                            </select>


                                        </div>
                                        <div class="required field" id="cityChangemodel">
                                            <label>Ciudad</label>


                                            <select class="ui search dropdown" name="city"
                                                    placeholder="Seleccione Ciudad"
                                                    id="selectCitymodel">

                                                <option value="">Seleccione ciudad</option>


                                            </select>

                                        </div>
                                    </div>
                                  
                                    <div class="two fields" id="institutionChangemodel">
                                        <div class="required field">
                                            <label>Institución</label>


                                            <select class="ui search dropdown" name="institution"
                                                    placeholder="Seleccione Institución" id="selectInstitutionmodel">

                                                <option value="">Seleccione institución</option>

                                            </select>
                                            <div class="ui horizontal divider">
                                                <a class="ui label button color_1" id="agregaInstitutomodel">Agregar
                                                    Institución</a>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Otra</label>
                                            <div class="ui action input">
                                                <input placeholder="Nombre" id="otherInstitutemodel" type="text" value="">
                                                <div class="ui button" id="addInstituteNewmodel">Nuevo</div>
                                            </div>
                                        </div>
                                    </div>

                               
                                </div>
                                <div class="ui info green message" style="display: none;" id="messageSaveVinculationmodel">
                                    
                                    <div class="header">
                                        Guardó institución con éxito
                                    </div>
                                    <ul class="list">
                                        <li id="idlisaveinstitutemodel"></li>

                                    </ul>
                                </div>
                                <div class="ui error message" style="display: none;" id="messageNewInstitutionerormodel">
                                    
                                    <div class="header">
                                        <p id="exitNewUniversitymodel">Debe indicar la ciudad de la nueva institución</p>
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
                                <div class="ui error message" style="display: none;" id="messageSaveVinculationerrormodel">
                                    
                                    <div class="header">
                                        No se ha seleccionado la Institución correctamente
                                    </div>
                                    <ul class="list">
                                    </ul>
                                </div>
        </div>
    </div>
</div>



@extends('main.main')

@section('content')



<div class="pusher" style="background-color: #EEEEEE;">
    <div class="ui container center aligned">
        <h1 class="ui center aligned header">Publicar Evento</h1>
        <div>
            <div class="line"></div>
            <div data-width="79" data-height="27"
                 style="display: inline-block; vertical-align: middle; line-height: 0; width: 79px; height: 27px;">
                <svg height="27" width="79">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.2 26.4">
                        <path fill="none" stroke="#A54686" stroke-width="2" d="
                            M57.3,13.1c-3.2,10.4,10.4,16.1,16.8,8.7c7.1-8.2,0.6-17.8-7-20.1c-19.6-5.2-31.9,18-49,23.1C9.3,27.5-1.7,20.4,1.6,9.8
                            c3.8-12.4,23.3-9,19.3,4"></path>
                    </svg>
                </svg>
            </div>
            <div class="line"></div>
        </div>
        <div class="ui piled very padded left aligned segment">
            <form class="ui form" id="form">
                <h4 class="ui dividing header">Información general</h4>
                <div class="field">
                    <div class="ui inverted large horizontal label color_1">Institución:
                        <div class="detail">Nombre del Instituto</div>
                    </div>
                </div>
                <div class="required grouped fields">
                    <label>Sector educativo</label>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="sector">
                            <label>Universitario</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="sector">
                            <label>Preescolar, básica y media</label>
                        </div>
                    </div>
                </div>
                <div class="two fields">
                    <div class="required field">
                        <label>País</label>
                        <select name="country" class="ui search dropdown">
                            <option value="">Seleccionar País</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">Åland Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Réunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="required field">
                        <label>Ciudad</label>
                        <select name="city" class="ui search dropdown">
                            <option value="">Seleccionar Ciudad</option>
                            <option value="city_1">Afghanistan</option>
                            <option value="city_2">Åland Islands</option>
                            <option value="city_3">Albania</option>
                        </select>
                    </div>
                </div>
                <div class="required field">
                    <label>Desde</label>
                    <div class="two fields">
                        <div class="field">
                            <div class="ui calendar" id="from">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input name="from" type="text" placeholder="Fecha">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui calendar" id="time_from">
                                <div class="ui input left icon">
                                    <i class="time icon"></i>
                                    <input name="time_from" type="text" placeholder="Hora">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="required field">
                    <label>Hasta</label>
                    <div class="two fields">
                        <div class="field">
                            <div class="ui calendar" id="until">
                                <div class="ui input left icon">
                                    <i class="calendar icon"></i>
                                    <input name="until" type="text" placeholder="Fecha">
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui calendar" id="time_until">
                                <div class="ui input left icon">
                                    <i class="time icon"></i>
                                    <input name="time_until" type="text" placeholder="Hora">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="ui dividing header">Áreas de conocimiento</h4>
                <div class="three fields">
                    <div class="required field">
                        <label>Gran área</label>
                        <select class="ui fluid search dropdown" name="large_area" id="select_gran_area_formacion">
                            <option value="">Gran Área</option>
                            @foreach($gran_areas as $gran_area)
                                <option value="{{$gran_area->id_tema}}"> {{$gran_area->name_theme}}</option>
                            @endforeach
                        </select>
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addGranAreaFormation">Agregar Gran
                                Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">


                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Área</label>
                        {!!Form::select('area',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Área', 'id'=>'select_area_formacion'])!!}
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addAreaFormation">Agregar Área</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">
                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Disciplina</label>
                        {!!Form::select('discipline',['ninguna seleccionada'], null, ['class'=>'ui search dropdown', 'placeholder'=>'Seleccione Disciplina', 'id'=>'select_disciplina_formacion'])!!}
                        <div class="ui horizontal divider">
                            <a type="submit" class="ui label button color_1" id="addDisciplineAreaFormation">Agregar
                                Disciplina</a>
                        </div>
                        <div class="ui raised segment">
                            <label><b>Seleccionados</b></label>
                            <div class="ui divided list selected_list">
                                <div class="item">
                                    <div class="right floated content">
                                        <a class="ui label button color_3">Eliminar</a>
                                    </div>
                                    <div class="content">
                                        nombre área
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="ui dividing header">Detalles</h4>
                <div class="required field">
                    <label>Nombre</label>
                    <input name="name" type="text">
                </div>
                <div class="field">
                    <label>Imagen o logo del evento</label>
                    <img class="ui middle aligned medium rounded image" src="images/public-image.png">
                    <span>
                        <label for="file" class="ui blue button button_load">
                            Cargar
                            <input type="file" id="file" style="display:none">
                        </label>
                    </span>
                </div>
                <div class="field">
                    <label>Descripción</label>
                    <textarea name="description" rows="3"></textarea>
                </div>
                <div class="ui info compact small message">
                    <p>Debe ingresar al menos uno de los campos correspondientes a contacto.</p>
                </div>
                <div class="two fields">
                    <div class="required field">
                        <label>Enlace</label>
                        <input name="link" type="url" placeholder="URL">
                    </div>
                    <div class="required field">
                        <label>Datos de contacto </label>
                        <input name="contact_data" type="text" placeholder="Nombre, e-mail y/o teléfono">
                    </div>
                </div>
                <div class="ui right aligned stackable grid">
                    <div class="sixteen wide column">
                        <button type="submit" form="form" onclick="validateFormAnnouncement()"
                                class="ui submit inverted button button_submit">
                            Publicar
                        </button>
                    </div>
                </div>
                <div class="ui error message"></div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    function validateFormAnnouncement() {
        var $form = $('.ui.form'),
            allFields = $form.form('get values')
            ;
        if(allFields.link == false && allFields.contact_data == false){
            $('.ui.form')
                .form({
                    on: 'blur',
                    fields: {
                        sector: {
                            identifier: 'sector',
                            rules: [
                                {
                                    type: 'checked',
                                    prompt: 'Porfavor seleccione un valor en Sector educativo'
                                }
                            ]
                        },
                        country: {
                            identifier: 'country',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione un valor en País'
                                }
                            ]
                        },
                        city: {
                            identifier: 'city',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione un valor en Ciudad'
                                }
                            ]
                        },
                        from: {
                            identifier: 'from',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Desde'
                                }
                            ]
                        },
                        until: {
                            identifier: 'until',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Hasta'
                                }
                            ]
                        },
                        large_area: {
                            identifier: 'large_area',
                            rules: [
                                {
                                    type   : 'minCount[1]',
                                    prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                }
                            ]
                        },
                        name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor introduzca un valor en Nombre'
                                },
                                {
                                    type: 'maxLength[150]',
                                    prompt: 'El nombre no puede ser mayor a 150 caracteres'
                                }
                            ]
                        },
                        description: {
                            identifier: 'description',
                            rules: [
                                {
                                    type: 'maxLength[500]',
                                    prompt: 'La descripción no puede ser mayor a 500 caracteres'
                                }
                            ]
                        },
                        link: {
                            identifier: 'link',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor introduzca un valor en Enlace'
                                }
                            ]
                        },
                        contact_data: {
                            identifier: 'contact_data',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor introduzca un valor en Datos de contacto'
                                }
                            ]
                        }
                    }
                })
            ;
        }else {
            $('.ui.form')
                .form({
                    on: 'blur',
                    fields: {
                        sector: {
                            identifier: 'sector',
                            rules: [
                                {
                                    type: 'checked',
                                    prompt: 'Porfavor seleccione un valor en Sector educativo'
                                }
                            ]
                        },
                        country: {
                            identifier: 'country',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione un valor en País'
                                }
                            ]
                        },
                        city: {
                            identifier: 'city',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione un valor en Ciudad'
                                }
                            ]
                        },
                        from: {
                            identifier: 'from',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Desde'
                                }
                            ]
                        },
                        until: {
                            identifier: 'until',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor seleccione una fecha en Hasta'
                                }
                            ]
                        },
                        large_area: {
                            identifier: 'large_area',
                            rules: [
                                {
                                    type   : 'minCount[1]',
                                    prompt : 'Porfavor seleccione al menos un valor en Gran Área'
                                }
                            ]
                        },
                        name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Porfavor introduzca un valor en Nombre'
                                },
                                {
                                    type: 'maxLength[150]',
                                    prompt: 'El nombre no puede ser mayor a 150 caracteres'
                                }
                            ]
                        },
                        description: {
                            identifier: 'description',
                            rules: [
                                {
                                    type: 'maxLength[500]',
                                    prompt: 'La descripción no puede ser mayor a 500 caracteres'
                                }
                            ]
                        }
                    }
                })
            ;
        }
    }
    var today = new Date();
    $('#from').calendar({
        type: 'date',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#until').calendar({
        type: 'date',
        minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate())
    });
    $('#time_from').calendar({
        type: 'time'
    });
    $('#time_until').calendar({
        type: 'time'
    });
    $('.ui.checkbox')
        .checkbox()
    ;
    $('.ui.sidebar')
        .sidebar('attach events', '.menu.fixed .launch.item')
    ;
</script>

@stop
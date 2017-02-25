<?php  
$instituciones = DB::table('institucions')
        ->join('lugars', 'institucions.id_lugar_fk','=','lugars.id_lugar')
        ->paginate(20);
?>
<div class="ui stackable equal width padded grid container">
    <div class="column">
        <h3 class="ui dividing header">Gestión de Instituciones</h3>
    </div>
    <div class="row">
        <div class="left floated column">
            <div class="ui action input">
                <input type="text" placeholder="Institución...">
                <button class="ui color_2 button">Buscar</button>
            </div>
        </div>
        <div class="right floated column">
            <div class="ui right floated  labeled icon button-institution color_1 button">
                <i class="add icon"></i> Nueva Institución
            </div>
        </div>
    </div>
    <div class="column">
        <table class="ui sortable celled unstackable table">
            <thead class="full-width">
            <tr class="center aligned">
                <th>nombre</th>
                <th>Sector</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>

            @foreach($instituciones as $institution)
            <tr class="center aligned">
                <td>{{$institution->name_institution}}</td>
                @if($institution->setor_institution=='universitario')
                <td>Universitario</td>
                @else
                <td>Preescolar, Básica y Media</td>
                @endif
                <td>{{$institution->telephone_institution}}</td>
                <td>{{$institution->name_lugar}}</td>
                <td>{{$institution->state_institution}}</td>
                <td class="collapsing">
                    <div class="ui right floated small  labeled icon button-edit-institution color_3 color_3 button">
                        <i class="edit icon"></i> Editar
                    </div>
                </td>
            </tr>
            @endforeach
    
            </tbody>

          
        </table>
        <tfoot class="full-width">
            <div>{!!$instituciones->render()!!}</div>
        </tfoot>
    </div>
</div>
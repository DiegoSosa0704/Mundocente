<div class="ui small modal indice">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Nuevo Índice</h3>
    </div>
    <div class="content">
        <div class="ui form">
            <div class="field">
                <label for="country">Nombre Índice</label>
                <input type="text" id="type" placeholder="Índice">
            </div>
            <div class="field">
                <table class="ui compact celled unstackable table">
                    <thead>
                    <tr class="center aligned">
                        <th>Nivel</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="add-indices">
                    <tr class="center aligned">
                        <td>
                            <input type="text" id="type" placeholder="Nombre">
                        </td>
                        <td>
                            <div class="ui labeled icon color_1 button">
                                <i class="delete icon"></i> Eliminar
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="field">
                <div class="ui labeled icon small color_1 button" id="newAddIndice">
                    <i class="add icon"></i> Nuevo nivel
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel color_1 button">Cancelar</div>
        <div class="ui ok color_3 button">Nuevo</div>
    </div>
</div>

<script>
    $('#newAddIndice').on('click', function () {
        $('#add-indices').append("<tr class='center aligned'><td><input type='text' id='type' placeholder='Nombre'></td><td><div class='ui labeled icon color_1 button'><i class='delete icon'></i>Eliminar</div></td></tr>");
    });
</script>
<div class="ui small modal edit-indice">
    <i class="close icon"></i>
    <div class="header" style="background-color: #242533; color: #AD5691">
        <h3>Editar Índice</h3>
    </div>
    <div class="content">
        <div class="ui form">
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
                        <tbody id="edit-indices">
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
                    <div class="ui labeled icon small color_1 button" id="newEditIndice">
                        <i class="add icon"></i> Nuevo nivel
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel color_1 button">Cancelar</div>
        <div class="ui ok color_3 button">Editar</div>
    </div>
</div>

<script>
    $('#newEditIndice').on('click', function () {
        $('#edit-indices').append("<tr class='center aligned'><td><input type='text' id='type' placeholder='Nombre'></td><td><div class='ui labeled icon color_1 button'><i class='delete icon'></i>Eliminar</div></td></tr>");
    });
</script>
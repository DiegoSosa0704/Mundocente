@extends('main.main')

@section('content')

    {!!Html::style('css/darkroom.css')!!}
    {!!Html::script('js/fabric.js')!!}
    {!!Html::script('js/darkroom.js')!!}

    <style>

        .ui.modal {
            position: relative;
            top:30%;
        }

        .image-container {
            display: inline-block;
            max-width: 100%;
            background: white;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #e2e2e2;
            border-bottom: 1px solid #ccc;
            border-right: 1px solid #ccc;
        }

        .image-container.target {
            margin-top: 40px;
        }

        .image-container img {
            max-width: 300px;
            max-height: 300px;
        }

    </style>

    <div class="pusher" style="background-color: #EEEEEE;">
        <div class="ui container center aligned">

            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="ui small circular image">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="center">
                            <span>
                                <label for="file-input" class="ui blue button">
                                    <input type="file" name="file-input" accept="image/*" id="file-input" style="display:none">
                                    Cargar Foto
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
                <img src="{!!Auth::user()->photo_url!!}">
            </div>

            <div class="ui blue small button" id="editPhoto">Editar</div>
        </div>
    </div>

    <div class="ui small modal">
        <h2 class="ui center aligned header">Mejore su experiencia en Mundocente</h2>
        <div class="content">
            <div class="ui equals center aligned width grid">
                <div class="column">
                    <figure class="image-container target">
                        <img src="" alt="DomoKun" id="blah">
                    </figure>
                </div>
            </div>
        </div>
        <div class="actions">
            <div class="ui approve button color_3">Siguiente</div>
        </div>
    </div>

    <script type="text/javascript" language="javascript">

        $('#buttonChangePhoto').on('click', function () {
            $('.ui.modal').modal('show');
        });

        $('.image')
            .dimmer({
                on: 'hover'
            })
        ;

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    console.log();
                    editPhoto(e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file-input").change(function () {
            $('.ui.modal').modal('show');
            readURL(this);
        });
        function editPhoto() {
            var dkrm = new Darkroom('#blah', {
                // Size options
                minWidth: 100,
                minHeight: 100,
                maxWidth: 300,
                maxHeight: 300,
                ratio: 4 / 3,
                backgroundColor: '#000',

                // Plugins options
                plugins: {
                    crop: {
                        quickCropKey: 67, //key "c"
                        /*minHeight: 50,
                        minWidth: 50,
                        ratio: 4 / 3*/
                    },
                    save: {
                        callback: function() {
                            this.darkroom.selfDestroy(); // Cleanup
                            var newImage = dkrm.canvas.toDataURL();
                            fileStorageLocation = newImage;
                            //Imagen base 64
                            console.log(fileStorageLocation);
                        }
                    }
                },

                // Post initialize script
                initialize: function () {
                    var cropPlugin = this.plugins['crop'];
                    //cropPlugin.selectZone(170, 25, 300, 300);
                    cropPlugin.requireFocus();
                }
            });
        }
        $('#editPhoto').on('click', function () {
            editPhoto();
        });

    </script>
@stop
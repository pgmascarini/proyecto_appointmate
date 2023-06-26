<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='css/core/main.min.css' rel='stylesheet' />
    <link href='css/daygrid/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <script src='js/core/main.min.js'></script>
    <script src='js/interaction/main.min.js'></script>
    <script src='js/daygrid/main.min.js'></script>
    <script src='js/core/locales/es.global.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/personalizado.js"></script>
  
    <title>Anular</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div id='calendar'></div>

    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="visevent">
                        <dl class="row">
                            <dt class="col-sm-3">ID reunión</dt>
                            <dd class="col-sm-9" id="id"></dd>

                            <dt class="col-sm-3">Nombre</dt>
                            <dd class="col-sm-9" id="nombre"></dd>

                            <dt class="col-sm-3">Apellido</dt>
                            <dd class="col-sm-9" id="apellido"></dd>

                            <dt class="col-sm-3">Empresa</dt>
                            <dd class="col-sm-9" id="empresa"></dd>

                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-9" id="telefono"></dd>

                            <dt class="col-sm-3">Asunto de la reunión</dt>
                            <dd class="col-sm-9" id="motivo_reunion"></dd>

                            <dt class="col-sm-3">Notas útiles para la reunión</dt>
                            <dd class="col-sm-9" id="apuntes"></dd>

                            <dt class="col-sm-3">Fecha de la reunión</dt>
                            <dd class="col-sm-9" id="fecha_reunion"></dd>
                        </dl>
                        <button class="btn btn-warning btn-canc-vis">Editar</button>
                        <a href="" id="apagar_evento" class="btn btn-danger">Borrar</a>
                    </div>
                    <div class="formedit">
                        <form id="editevent" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                        placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Apellido</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apellido" class="form-control" id="apellido"
                                        placeholder="Apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Empresa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="empresa" class="form-control" id="empresa"
                                        placeholder="Empresa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telefono" class="form-control" id="telefono"
                                        placeholder="Telefono">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Asunto de la reunion</label>
                                <div class="col-sm-10">
                                    <input type="text" name="motivo_reunion" class="form-control" id="motivo_reunion"
                                        placeholder="Asunto">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Notas utiles para la reunion</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apuntes" class="form-control" id="apuntes"
                                        placeholder="Notas">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fecha de la reunion</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fecha_reunion" class="form-control" id="fecha_reunion"
                                        onkeypress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent"
                                        class="btn btn-warning">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Guardar Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addevent" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" name="apellido" class="form-control" id="apellido"
                                    placeholder="Apellido">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Empresa</label>
                            <div class="col-sm-10">
                                <input type="text" name="empresa" class="form-control" id="empresa"
                                    placeholder="Empresa">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" name="telefono" class="form-control" id="telefono"
                                    placeholder="Telefono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Asunto de la reunión</label>
                            <div class="col-sm-10">
                                <input type="text" name="motivo_reunion" class="form-control" id="motivo_reunion"
                                    placeholder="Asunto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Notas utiles para la reunion</label>
                            <div class="col-sm-10">
                                <input type="text" name="apuntes" class="form-control" id="apuntes"
                                    placeholder="Apuntes">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fecha de la reunión</label>
                            <div class="col-sm-10">
                                <input type="text" name="fecha_reunion" class="form-control" id="fecha_reunion"
                                    onkeypress="DataHora(event, this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent"
                                    class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
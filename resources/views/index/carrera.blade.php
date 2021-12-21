@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Información Faculdad/Carrera</h1>
    <br>
    <!--MODAL REGISTRO FACULTAD-->
    <section>
        <div class="modal fade" id="modalRegistroFacultad" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Facultad
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="registroFacultad" action="{{ route('facultad.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Nombre Facultad:</span>
                                <input type="text" class="form-control" id="nomFacultad" name="nomFacultad"
                                    placeholder="Ingrese Nombre Facultad ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--MODAL REGISTRO DEPARTAMENTO-->
    <section>
        <div class="modal fade" id="modalRegistroDepartamento" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Despartamento
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="registroDepartamento" action="{{ route('departamento.store') }}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Facultad</span>
                                <select class="form-control" name="nFacultad" id="nFacultad" aria-describedby="espeHelp">
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Nombre Departamento:</span>
                                <input type="text" class="form-control" id="nomDepartamento" name="nomDepartamento"
                                    placeholder="Ingrese Nombre Departamento ">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--MODAL ACTUALIZA  FACULTAD-CARRERA-DEPARTAMENTO-->
    <section>
        <div container>
            <div class="modal fade" id="modalactualizaCarrera" tabindex="-1" role="dialog" aria-labelledby="modal"
                aria-hidden="true">
                <div class="modal-dialog modg-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Actualiza Carrera
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="registro3">
                                    <form id="actualizaCarrera">
                                        @csrf
                                        <input type="hidden" id="id" name="id" />

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Facultad</span>
                                            <select class="form-control" name="acNombFacultad" id="acNombFacultad"
                                                onchange="cargaComboFacultadModificar(this.value)">

                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Departamento</span>
                                            <select class="form-control" name="acNombDepartamento" id="acNombDepartamento"
                                                aria-describedby="espeHelp">

                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Carrera</span>
                                            <input type="text" class="form-control" name="acNomCarrera" id="acNomCarrera"
                                                aria-label="Carrera" aria-describedby="basic-addon1"
                                                placeholder="Ingrese Nombre Carrera">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Modalidad</span>
                                            <input type="text" class="form-control" name="acNombModalidad"
                                                id="acNombModalidad" aria-label="Carrera" aria-describedby="basic-addon1"
                                                placeholder="Ingrese Modalidad de la Carrera">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--MODAL REGISTRO CARRERA-->
    <section>
        <form method="post" action="{{ route('carrera.index') }}">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Facultad</span>
                <select class="form-control" name="nombFacultad" id="nombFacultad"
                    onchange="cargarComboFacultad(this.value)">

                </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal"
                    data-target="#modalRegistroFacultad">Nuevo</button>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Departamento</span>
                <select class="form-control" name="nombDepartamento" id="nombDepartamento" aria-describedby="espeHelp">

                </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal"
                    data-target="#modalRegistroDepartamento">Nuevo</button>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Carrera</span>
                <input type="text" class="form-control" name="nomCarrera" id="nomCarrera" aria-label="Carrera"
                    aria-describedby="basic-addon1" placeholder="Ingrese Nombre Carrera">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Modalidad</span>
                <input type="text" class="form-control" name="nombModalidad" id="nombModalidad" aria-label="Carrera"
                    aria-describedby="basic-addon1" placeholder="Ingrese Modalidad de la Carrera">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>
    </section>
    <!--Tabla de Informacion Carrera-Facultad-Departamento-->
    <section class="site-section bg-white " id="testimonials-section" data-aos="fade">
        <div class="container">
            <h1 class="text-center"></h1>
            <div class="row">

                <div class="card-header btn-succses">
                    <div class="card-title text-center">


                        <div class="card" style="width:900px">
                            <div class="card-header btn-succses">
                                <div class="card-title text-center">


                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <div class="table-responsive-sm">
                                        <table id="tablaCarrerar" class="table table-sm data-table  ">
                                            <thead>
                                                <tr>
                                                    <th>Id Carrera</th>
                                                    <th>Nombre Carrera</th>
                                                    <th>Modalidad</th>
                                                    <th>Departamento</th>
                                                    <th>Facultad</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@section('js')
    <script>
        //Metodo para cargar Datos en la Tabla
        $(document).ready(function() {

            var tablaExamen = $('#tablaCarrerar').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('carrera.index') }}",
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nombCarrera'
                    },
                    {
                        data: 'modalidad'
                    },
                    {
                        data: 'nomDepartamento'
                    },
                    {
                        data: 'nomFacultad'
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ]
            });
        });
    </script>
    <script>
        function cargarComboFacultad(id) {
            $.get('facultad/combo/' + id, function(facultad) {

                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nomDepartamento + '</option>';
                });
                $("#nombDepartamento").html(opcion);
            })
        }
        //Metodo para Cargar datos de Facultad
        $(document).ready(function() {

            $.get("{{ route('facultad.cargaDatos') }}", function(facultad) {
                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nomFacultad + '</option>';
                    if (index == 0) {
                        cargarComboFacultad(item.id);
                    }
                });
                $("#nombFacultad").html(opcion);
                $("#nFacultad").html(opcion);
            })
        });
    </script>

    </script>
    <script>
        var idDepartamento;
        var idFacultad;

        function listaCarrerasFacultad(id) {
            $.get('carrera/show/' + id, function(carreras) {
                console.log(carreras[0]);
                idDepartamento = carreras[0].departamento_id;
                console.log("ID departamento " + idDepartamento);
                $('#id').val(carreras[0].id);
                $('#acNomCarrera').val(carreras[0].nombCarrera);
                $('#acNombModalidad').val(carreras[0].modalidad);
                $('#acNombDepartamento').val(carreras[0].departamento_id);
                $("input[name=_token]").val();
                $('#modalactualizaCarrera').modal('toggle');
                obtenerDepartamento(idDepartamento);
            })
        }

        function obtenerDepartamento(idDepartamento) {
            console.log(idDepartamento);
            $.get('departamento/lista/' + idDepartamento, function(departamento) {
                console.log(departamento);
                cargaComboFacultadModificar(departamento[0].id);
            })
        }

        function listarCombosDepartamentoActualizar(id) {
            $.get('facultad/lista/' + id, function(facultad) {
                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    if (item.id == idDepartamento) {
                        opcion += '<option selected value= ' + item.id + '>' + item.nomDepartamento +
                            '</option>';
                    } else {
                        opcion += '<option  value= ' + item.id + '>' + item.nomDepartamento + '</option>';
                    }
                });
                $("#acNombDepartamento").html(opcion);
            })
        }
        //Metodo para Cargar datos de Facultad
        function cargaComboFacultadModificar(idFacultad) {

            $.get("{{ route('facultad.cargaListaDatos') }}", function(facultad) {
                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    if (item.id == idFacultad) {
                        opcion += '<option selected value= ' + item.id + '>' + item.nomFacultad +
                            '</option>';
                        listarCombosDepartamentoActualizar(item.id);
                    } else {
                        opcion += '<option  value= ' + item.id + '>' + item.nomFacultad + '</option>';
                    }

                });
                $("#acNombFacultad").html(opcion);
            })
        };
    </script>
    <script>
        $('#actualizaCarrera').submit(function(e) {
            e.preventDefault();
            var id2 = $('#id').val();
            var nombreCarrera = $('#acNomCarrera').val();
            var modalidadCarrera = $('#acNombModalidad').val();
            var idDepartamento = $('#acNombDepartamento').val();
            var _token2 = $("input[name=_token]").val();

            $.ajax({
                url: "{{ route('carrera.update') }}",
                type: "POST",
                data: {
                    id: id2,
                    nombCarrera: nombreCarrera,
                    modalidad: modalidadCarrera,
                    departamento_id: idDepartamento,
                    _token: _token2
                },
                success: function(response) {
                    if (response) {
                        $('#modalactualizaCarrera').modal('hide');
                        $('#tablaCarrerar').DataTable().ajax.reload();

                    }
                }

            })
        });
    </script>
@stop
@stop

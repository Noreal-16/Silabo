@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Periodos Academicos</h1>
    <br>
    <!--MODAL REGISTRO FACULTAD-->
    <section>
        <div class="modal fade" id="modalRegistroPeriodo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Periodo Academico
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="registroFacultad" action="{{ route('periodos.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Facultad</span>
                                <select class="form-control" name="nComboFacultad" id="nComboFacultad"
                                    onchange="cargaComboFacultadPeriodo(this.value)">

                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Carrera</span>
                                <select class="form-control" name="comboCarrera" id="comboCarrera">

                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Fecha de Inicio:</span>
                                <input type="text" class="form-control" id="nFechaInicio" name="nFechaInicio"
                                    placeholder="Ingrese Fecha de Inicio ">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Fecha Fin:</span>
                                <input type="text" class="form-control" id="nFechaFin" name="nFechaFin"
                                    placeholder="Ingrese Fecha Fin  ">
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


    <!--MODAL REGISTRO CARRERA-->
    <section>
        <form method="post" action="{{ route('ciclos.store') }}">
            @csrf
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Carrera</span>
                    <select class="form-control" name="carreraAP" id="carreraAP" onchange="cargaComboCarreraPeriodo(this.value)">
                    </select>

                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Periodo Academico</span>
                    <select class="form-control" name="comboPeriodoAc" id="comboPeriodoAc">
                    </select>
                    <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal"
                        data-target="#modalRegistroPeriodo">Nuevo</button>
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Ciclo</span>
                    <select class="form-control" name="comboCiclo" id="comboCiclo">
                        <option value="ciclo 1" selected>Ciclo 1</option>
                        <option value="ciclo 2">Ciclo 2</option>
                        <option value="ciclo 3">Ciclo 3</option>
                        <option value="ciclo 4">Ciclo 4</option>
                        <option value="ciclo 5">Ciclo 5</option>
                        <option value="ciclo 6">Ciclo 6</option>
                        <option value="ciclo 7">Ciclo 7</option>
                        <option value="ciclo 8">Ciclo 8</option>
                        <option value="ciclo 9">Ciclo 9</option>
                    </select>
                </div>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <span class="input-group-text">Paralelos:</span>
                    <input type="text" class="form-control" id="nomParalelo" name="nomParalelo"
                        placeholder="Ingrese Nombre o Nombres de paralelos Ej. A-B ">
                </div>
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
        //Metodo para Cargar datos de Periodo Academico
        $(document).ready(function() {
            $.get("{{ route('periodos.cargaDatosComboPeriodo') }}", function(periodos) {
                //asignar datos recuperados
                var opcion = '';
                $.each(periodos, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.fechaInicio + "-" + item
                        .fechaFin + '</option>';
                });
                $("#comboPeriodoAc").html(opcion);

            })
        });
    </script>
    <script>
        //Metodo para Cargar datos de Periodo Academico
        $(document).ready(function() {
            $.get("{{ route('carrera.cargaDatosComboCarreras') }}", function(carrera) {
                //asignar datos recuperados
                var opcion = '';
                $.each(carrera, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombCarrera + '</option>';
                });
                $("#comboCarrera").html(opcion);

            })
        });
    </script>
    <script>
        //metodo para cargar facultad con id departamento
        function cargaComboFacultadPeriodo(id) {
            $.get('facultad/periodo/' + id, function(facultad) {

                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombCarrera + '</option>';
                });
                $("#comboCarrera").html(opcion);
            })
        }
        //Metodo para Cargar datos de Facultad
        $(document).ready(function() {

            $.get("{{ route('facultad.cargaDatosFP') }}", function(facultad) {
                //asignar datos recuperados
                var opcion = '';
                $.each(facultad, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nomFacultad + '</option>';
                    if (index == 0) {
                        cargaComboFacultadPeriodo(item.id);
                    }
                });
                $("#nComboFacultad").html(opcion);
            })
        });
    </script>
    <script>
        //metodo para cargar Periodos con id Carreras
        function cargaComboCarreraPeriodo(id) {
            $.get('carrera/periodo/' + id, function(carrera) {

                //asignar datos recuperados
                var opcion = '';
                $.each(carrera, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.fechaInicio + "-" + item
                        .fechaFin + '</option>';
                });
                $("#comboPeriodoAc").html(opcion);
            })
        }
        //Metodo para Cargar datos de Facultad
        $(document).ready(function() {

            $.get("{{ route('carrera.cargaDatosCP') }}", function(carrera) {
                //asignar datos recuperados
                var opcion = '';
                $.each(carrera, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombCarrera + '</option>';
                    if (index == 0) {
                        cargaComboCarreraPeriodo(item.id);
                    }
                });
                $("#carreraAP").html(opcion);
            })
        });
    </script>
@stop
@stop

@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Datos de Identificacón de Asignatura</h1>
    <section>
        <div class="modal fade" id="modalRegistroInformacion" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Datos Silabo
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="registroInformacion" action="{{ route('informacion.store') }}" method="POST">

                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Asignatura:</span>
                                <input type="text" class="form-control" id="nAsignatura" name="nAsignatura"
                                    placeholder="Ingrese Asignatura ">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Código:</span>
                                <input type="text" class="form-control" id="nCodigo" name="nCodigo"
                                    placeholder="Ingrese Codigo">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Tipo de Asignatura (ECTS):</span>
                                <select class="form-control" name="ntAsignatura" id="ntAsignatura"
                                    aria-describedby="espeHelp">
                                    <option value="aplica">Aplica </option>
                                    <option value="nAplica">No Aplica</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Rediseño Curricular:</span>
                                <input type="text" class="form-control" id="nCFC" name="nCFC"
                                    placeholder="Ingrese Campo de Formación del Currículo">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Creditos:</span>
                                <select class="form-control" name="nCreditos" id="nCreditos" aria-describedby="espeHelp"
                                    onchange="cargaImputHoras(this.value)">
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Horas:</span>
                                <input type="number" class="form-control" id="nHoras" name="nHoras"
                                    placeholder="Ingrese Número de Horas" readonly>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Periodo Académico Ordinario/Semestre:</span>
                                <select class="form-control" name="nCiclos" id="nCiclos"
                                    onchange="cargaImputCiclos(this.value)" aria-describedby="espeHelp">
                                </select>

                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Periodo Académico Ordinario/Nivel:</span>
                                <select class="form-control" name="nPAON" id="nPAON"
                                    aria-describedby="espeHelp">
                                </select>

                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Facultad:</span>
                                <input type="text" class="form-control" id="nFacultad" name="nFacultad"
                                    placeholder="Ingrese Facultad">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Departamento:</span>
                                <input type="text" class="form-control" id="nDepartamento" name="nDepartamento"
                                    placeholder="Ingrese Departamento">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Carrera:</span>
                                <input type="text" class="form-control" id="nCarrera" name="nCarrera"
                                    placeholder="Ingrese Carrera">
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
    <section>
        <div class="modal fade" id="modalActualizaInformacion" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Actualizar Información General
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="actualizaInformacion">
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Asignatura:</span>
                                <input type="text" class="form-control" id="acAsignatura" name="acAsignatura"
                                    placeholder="Ingrese Asignatura ">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Código:</span>
                                <input type="text" class="form-control" id="acCodigo" name="acCodigo"
                                    placeholder="Ingrese Codigo">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Tipo de Asignatura (ECTS):</span>
                                <select class="form-control" name="actAsignatura" id="actAsignatura"
                                    aria-describedby="espeHelp">
                                    <option value="aplica">Aplica </option>
                                    <option value="nAplica">No Aplica</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Rediseño Curricular:</span>
                                <input type="text" class="form-control" id="acCFC" name="acCFC"
                                    placeholder="Ingrese Campo de Formación del Currículo">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Creditos:</span>
                                <input type="number" class="form-control" id="acCreditos" name="acCreditos"
                                    placeholder="Ingrese Número de Creditos">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Horas:</span>
                                <input type="number" class="form-control" id="acHoras" name="acHoras"
                                    placeholder="Ingrese Número de Horas">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Periodo Académico Ordinario/Nivel:</span>
                                <input type="text" class="form-control" id="acPAON" name="acPAON"
                                    placeholder="Ingrese Periodo Académico Ordinario/Nivel ">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Periodo Académico Ordinario/Semestre:</span>
                                <input type="text" class="form-control" id="acPAOS" name="acPAOS"
                                    placeholder="Ingrese Periodo Académico Ordinario/Semestre">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Facultad:</span>
                                <input type="text" class="form-control" id="acFacultad" name="acFacultad"
                                    placeholder="Ingrese Facultad">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Departamento:</span>
                                <input type="text" class="form-control" id="acDepartamento" name="acDepartamento"
                                    placeholder="Ingrese Departamento">
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Carrera:</span>
                                <input type="text" class="form-control" id="acCarrera" name="acCarrera"
                                    placeholder="Ingrese Carrera">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="site-section bg-white " id="testimonials-section" data-aos="fade">
        <div class="container">
            <h1 class="text-center"></h1>
            <div class="row">

                <div class="card-header btn-succses">
                    <div class="card-title text-center">


                        <div class="card" style="width:900px">
                            <div class="card-header btn-succses">
                                <div class="card-title text-center">

                                    <button type="button" class=" btn btn-outline-primary ml-auto float-left"
                                        data-toggle="modal" data-target="#modalRegistroInformacion">Nuevo</button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <table id="tablaInfoAsignatura" class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Asignatura</th>
                                                <th>Codigo</th>
                                                <th>Credito</th>
                                                <th>Horas</th>
                                                <th>Ciclo</th>
                                                <th>Carrera</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                    </table>
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

        var tablaAsignatura = $('#tablaInfoAsignatura').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('informacion.index')}}",
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'asignatura'
                },
                {
                    data: 'codigo'
                },
                {
                    data: 'rediseñoCurricular'
                },
                {
                    data: 'horas'
                },
                {
                    data: 'nombreCiclo'
                },
                {
                    data: 'creditos'
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
        $(document).ready(function() {
            $.get("{{ route('creditos.dataCreditos') }}", function(creditos) {
                //asignar datos recuperados
                var opcion = '';
                $.each(creditos, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.creditos + '</option>';
                    if (item.id == 1) {
                        $("#nHoras").val(item.horas);
                    }
                });
                $("#nCreditos").html(opcion);
            })
        });

        function cargaImputHoras(id) {
            $.get('creditos/cargaCombo/' + id, function(creditos) {
                //asignar datos recuperados
                $.each(creditos, function(index, item) {
                    $("#nHoras").val(item.horas);
                });
            })
        }
    </script>
    <script>
        function cargaImputCiclos(id) {
            console.log("iNGRESO A LA CONSULTA");
            $.get('informacion/data/' + id, function(asignatura) {
                //asignar datos recuperados
                var opcion = '';
                $.each(asignatura, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.fechaInicio +' - '+ item.fechaFin + '</option>';

                    $("#nFacultad").val(item.nomFacultad);
                    $("#nDepartamento").val(item.nomDepartamento);
                    $("#nCarrera").val(item.nombCarrera);
                });
                $("#nPAON").html(opcion);
            })
        }
        $(document).ready(function() {
            $.get("{{ route('ciclos.cargaDatosCiclos') }}", function(ciclos) {
                //asignar datos recuperados
                var opcion = '';
                $.each(ciclos, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombreCiclo + '</option>';
                    if (index == 0) {
                        cargaImputCiclos(item.id);
                    }
                });
                $("#nCiclos").html(opcion);
            })
        });
    </script>
@stop
@stop

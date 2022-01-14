@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Resultados de aprendizaje-Contenidos</h1>
    <br>
    <section>
        <div class="modal fade" id="modalRegistroResultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Resultados de Aprendizaje
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroResulAprendizaje" action="{{ route('resultados.store') }}" method="POST" >
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Asignatura</span>
                                <select class="form-control" name="nComboAsignatura" id="nComboAsignatura"></select>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Bimestre</span>
                                <select class="form-control" name="selecBimestre" id="selecBimestre" aria-describedby="espeHelp">
                                    <option value="Bimestre 1">Bimestre 1</option>
                                    <option value="Bimestre 2">Bimestre 2</option>
                                </select>
                            </div>
                        </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Resultado de Aprendizaje:</span>
                                    <input type="text" class="form-control" id="resAprendizaje" name="resAprendizaje" placeholder="Ingrese Nombre del Resultado de Aprendizaje" >
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
        <div class="modal fade" id="modalRegistroContenidos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Contenidos
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroContenido" action="{{ route('contenido.store') }}" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Resultados de Aprendizaje</span>
                                    <select class="form-control" name="cbselecResultado" id="cbselecResultado" aria-describedby="espeHelp">
                                    </select>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Unidades:</span>
                                    <input type="text" class="form-control" id="nombreContenido" name="nombreContenido" placeholder="Unidad 1: Nombre Unidad" >
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
        <form id="registroSub_Contenido" action="{{ route('subcontenido.store') }}" method="POST" >
        @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Resultados de Aprendizaje</span>
                <select class="form-control" name="selecResultado" id="selecResultado" aria-describedby="espeHelp"
                    onchange="obtenerContenidos(this.value)">              
                </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal" data-target="#modalRegistroResultado">Nuevo</button>
            </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Contenidos</span>
                <select class="form-control" name="unidades" id="unidades" aria-describedby="espeHelp">
            </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal" data-target="#modalRegistroContenidos">Nuevo</button>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Sub-Unidades</span>
                <input type="text" class="form-control" name="nombreSubContenido" id="nombreSubContenido"  aria-label="sub-unidades" aria-describedby="basic-addon1" placeholder="Ingrese Sub-Unidades">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
            </div>
        </form>
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


                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="table-responsive-sm">
                                <table id="tablaResultados" class="table table-hover data-table">
                                    <thead>
                                        <tr>
                                            <th>Id Contenido</th>
                                            <th>Unidad </th>
                                            <th>Sub-Unidades</th>
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
        //Metodo para Cargar datos de Informacion de asignatura
        $(document).ready(function() {
            $.get("informacion/carga/combo", function(informacion) {
                //asignar datos recuperados
                var opcion = '';
                $.each(informacion, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.asignatura + '</option>';
                });
                $("#nComboAsignatura").html(opcion);

            })
        });

        //Metodo para Cargar datos de resultados aprendizaje
        $(document).ready(function() {
            $.get("{{route('resultados.cargaDatosComboResultados')}}", function(resultados) {
                //asignar datos recuperados
                var opcion = '';
                $.each(resultados, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombreResultado + '</option>';
                });
                $("#selecResultado").html(opcion);
                $("#cbselecResultado").html(opcion);
                
                obtenerContenidos(resultados[0].id);

            })
        });

        //Metodo para cargar Datos en la Tabla
        $(document).ready(function() {
            
           

            
            var tablaExamen = $('#tablaResultados').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('resultados.index') }}",
                },
                columns: [{
                        data: 'id'
                    },
                {
                    data: 'nombreContenido'
                },
                {
                    data: 'nombreSubContenido'
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
    //Metodo para Cargar datos de contenido       
        /*$(document).ready(function() {
            $.get("{{route('contenido.index')}}", function(contenido) {
                //asignar datos recuperados
                var opcion = '';
                $.each(contenido.data, function(index, item) {
                    opcion += '<option  value= ' + item.id + '>' + item.nombreContenido + '</option>';
                });
                $("#unidades").html(opcion);

            })
        });*/
    function obtenerContenidos(id) {
        $.get('contenido/lista/' + id, function(contenido) {
            var opcion = '';
            $.each(contenido, function(index, item) {
                opcion += '<option  value= ' + item.id + '>' + item.nombreContenido + '</option>';
            });
            $("#unidades").html(opcion);
                
        })
    }



</script>

@stop
@stop


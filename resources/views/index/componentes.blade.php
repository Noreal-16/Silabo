@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Datos de Identificacón de Asignatura</h1>
    <section>
        <div class="modal fade" id="modalRegistroComponentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Componentes del aprendizaje
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroComponentes" action="{{route('componentes.store')}}" method="POST" >

                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Nombre Componente:</span>
                                    <input type="text" class="form-control" id="nComponentes" name="nComponentes" placeholder="Ingrese Nombre Componente " >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Abreviatura:</span>
                                    <input type="text" class="form-control" id="nAbreviatura" name="nAbreviatura" placeholder="Ingrese Abreviatura" >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Horas:</span>
                                    <input type="number" class="form-control" id="nHoras" name="nHoras" placeholder="Ingrese Número de Horas" >
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
        <div class="modal fade" id="modalActualizaComponentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="actualizaComponentes">
                        @csrf
                        <input type="hidden"  id="id" name="id" />
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Nombre Componente:</span>
                                <input type="text" class="form-control" id="acComponentes" name="acComponentes" placeholder="Ingrese Nombre Componente " >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Abreviatura:</span>
                                <input type="text" class="form-control" id="acAbreviatura" name="acAbreviatura" placeholder="Ingrese Abreviatura" >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Horas:</span>
                                <input type="number" class="form-control" id="acHoras" name="acHoras" placeholder="Ingrese Número de Horas" >
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

                            <button type="button" class=" btn btn-outline-primary ml-auto float-left" data-toggle="modal" data-target="#modalRegistroComponentes">Nuevo</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <table id="tablaComponentes" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Abreviatura</th>
                                        <th>Horas</th>
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
<!--METODO PARA LISTAR DATOS-->
<script>
    $(document).ready(function() {
    var tablaComponentes = $('#tablaComponentes').DataTable({
        processing:true,
        serverSide:true,

        ajax:{
            url:"{{route('componentes.index')}}",
        },
        columns:[
            {data: 'id'},
            {data: 'nombreComponente'},
            {data: 'abreviatuta'},
            {data: 'horas'},
            {data: 'action', orderable: false},
        ]
    });
});
</script>
@stop
@stop


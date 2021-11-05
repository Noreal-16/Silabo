@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Creditos de Materias</h1>
    <section>
        <div class="modal fade" id="modalRegistroCreditos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                           Creditos
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroCreditos" action="{{route('creditos.store')}}" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Número de Creditos:</span>
                                    <input type="number" class="form-control" id="nCreditos" name="nCreditos" placeholder="Ingrese Número de Creditos " >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Número de Horas:</span>
                                    <input type="number" class="form-control" id="nHorasCreditos" name="nHorasCreditos"  placeholder="Ingrese Número de Horas" >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Bimestre 2:</span>
                                    <input type="number" class="form-control" id="nB1" name="nB1" readonly >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Bimestre 2:</span>
                                    <input type="number" class="form-control" id="nB2" name="nB2" readonly >
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
        <div class="modal fade" id="modalActualizaCreditos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form id="actualizaCreditos">
                        @csrf
                        <input type="hidden"  id="id" name="id" />
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Número de Creditos:</span>
                                <input type="number" class="form-control" id="acCreditos" name="acCreditos" placeholder="Ingrese Número de Creditos " >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Número de Horas:</span>
                                <input type="number" class="form-control" id="acHorasCreditos" name="acHorasCreditos" placeholder="Ingrese Número de Horas" >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Bimestre 2:</span>
                                <input type="number" class="form-control" id="acB1" name="acB1"  >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Bimestre 2:</span>
                                <input type="number" class="form-control" id="acB2" name="acB2"  >
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

                            <button type="button" class=" btn btn-outline-primary ml-auto float-left" data-toggle="modal" data-target="#modalRegistroCreditos">Nuevo</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <table id="tablaCreditos" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Número de Creditos</th>
                                        <th>Número de Horas</th>
                                        <th>Bimestre 1</th>
                                        <th>Bimestre 2</th>
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
    var tablaCresditos = $('#tablaCreditos').DataTable({
        processing:true,
        serverSide:true,

        ajax:{
            url:"{{route('creditos.index')}}",
        },
        columns:[
            {data: 'id'},
            {data: 'creditos'},
            {data: 'horas'},
            {data: 'B1'},
            {data: 'B2'},
            {data: 'action', orderable: false},
        ]
    });
});

$('#nHorasCreditos').focusout(function() {
 var valorHoras = $(this).val();
 var valoresHorasBimestra = valorHoras/2;
$('#nB1').val(valoresHorasBimestra);
$('#nB2').val(valoresHorasBimestra);
});
</script>
@stop
@stop


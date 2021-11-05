@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Actividades de aprendizaje</h1>
    <br>
    <section>
        <div class="modal fade " id="modalRegistroActividades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro de Actividades de aprendizaje
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroActividades" action="" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <span class="input-group-text">Actividades de aprendizaje:</span>
                                <div class="input-group">

                                    <textarea type="text" rows="4" cols="20" class="form-control" id="nActividadAp" name="nActividadAp" placeholder="Ingrese Actividade de Aprendizaje"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Recursos de Aprendizaje:</span>
                                    <input type="text" class="form-control" id="nRecursosAp" name="nRecursosAp" placeholder="Ingrese Recursos de Aprendizaje" >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Intrumentos de Evaluación:</span>
                                    <input type="text" class="form-control" id="nIntrumentosEv" name="nIntrumentosEv" placeholder="Ingrese Intrumentos de Evaluación" >
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Calificación:</span>
                                    <input type="text" class="form-control" id="nCalificacion" name="nCalificacion" placeholder="Ingrese Tipo de Calificación" >
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
        <div class="modal fade" id="modalRegistroActualizaActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Actualiza Descripción Asignatura
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="ActualizaActividades" action="" method="POST" >
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Actividades de aprendizaje:</span>
                                <textarea type="text" rows="4" cols="20" class="form-control" id="acActividadAp" name="acActividadAp" placeholder="Ingrese Actividade de Aprendizaje"> </textarea>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Recursos de Aprendizaje:</span>
                                <input type="text" class="form-control" id="acRecursosAp" name="acRecursosAp" placeholder="Ingrese Recursos de Aprendizaje" >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Intrumentos de Evaluación:</span>
                                <input type="text" class="form-control" id="acIntrumentosEv" name="acIntrumentosEv" placeholder="Ingrese Intrumentos de Evaluación" >
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text">Calificación:</span>
                                <input type="text" class="form-control" id="acCalificacion" name="acCalificacion" placeholder="Ingrese Tipo de Calificación" >
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
    <section class="site-section bg-white " id="testimonials-section" data-aos="fade">
        <div class="container">
            <h1 class="text-center"></h1>
            <div class="row">
                    <div class="card-header btn-succses">
                        <div class="card-title text-center">
                <div class="card" style="width:900px">
                    <div class="card-header btn-succses">
                        <div class="card-title text-center">

                            <button type="button" class=" btn btn-outline-primary ml-auto float-left" data-toggle="modal" data-target="#modalRegistroActividades">Nuevo</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <table id="tablaPacientes" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Actividad Aprendizaje</th>
                                        <th>Recurso de Aprendizaje</th>
                                        <th>Intrumentos de Evaluación</th>
                                        <th>Calificación</th>
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
<script >
</script>
@stop
@stop


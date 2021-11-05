@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content_header')
    <h1>Descripción de la Asignatura</h1>
    <br>
    <section>
        <div class="modal fade " id="modalRegistroDAsignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Registro Descripción Asignatura
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroAsignatura" action="" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Presentación:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="presentacion" name="presentacion" placeholder="Ingrese Observaciones"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <span class="input-group-text">Contextualización en el marco de la descripción microcurricular:</span>
                                <div class="input-group">
                                    <textarea type="text"  rows="4" cols="20" class="form-control" id="contextualizacion" name="contextualizacion" placeholder="Contextualización en el marco de la descripción microcurricular que forma parte del plan curricular de la carrera"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <span class="input-group-text">Contribución de la asignatura al perfil profesional (UTPL-ECTS):</span>
                                <div class="input-group">
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="contribucion" name="contribucion" placeholder="Ingrese Contribución de la Asignatura"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Prerrequisitos:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="prerrequisitos" name="prerrequisitos" placeholder="Ingrese Prerrequisitos"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Adaptaciones Curriculares:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="adaptaciones" name="adaptaciones" placeholder="Ingrese Observaciones"> </textarea>
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
        <div class="modal fade" id="modalRegistroActualizaDAsignatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <form id="registroActualizaAsignatura" action="" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Presentación:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="acPresentacion" name="acPresentacion" placeholder="Ingrese Observaciones"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <span class="input-group-text">Contextualización en el marco de la descripción microcurricular:</span>
                                <div class="input-group">
                                    <textarea  type="text" rows="4" cols="20" class="form-control" id="acContextualizacion" name="acContextualizacion" placeholder="Ingrese Contextualización"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <span class="input-group-text">Contribución de la asignatura al perfil profesional (UTPL-ECTS):</span>
                                <div class="input-group">
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="acContribucion" name="acContribucion" placeholder="Ingrese Contribución de la Asignatura"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Prerrequisitos:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="acPrerrequisitos" name="acPrerrequisitos" placeholder="Ingrese Prerrequisitos"> </textarea>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Adaptaciones Curriculares:</span>
                                    <textarea type="text" rows="4" cols="20" class="form-control" id="acAdaptaciones" name="acAdaptaciones" placeholder="Ingrese Observaciones"> </textarea>
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

                            <button type="button" class=" btn btn-outline-primary ml-auto float-left" data-toggle="modal" data-target="#modalRegistroDAsignatura">Nuevo</button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <table id="tablaPacientes" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Presentación</th>
                                        <th>Contextualización</th>
                                        <th>Contribución</th>
                                        <th>Prerrequisitos</th>
                                        <th>Adaptaciones</th>
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


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
                            Registro Facultad
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
                    </div>

                    <form id="registroFacultad" action="" method="POST" >
                        @csrf
                        <div class="modal-body">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Bimestre</span>
                                <select class="form-control" name="selecResultado" id="selecResultado" aria-describedby="espeHelp">
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

                    <form id="registroFacultad" action="" method="POST" >
                        @csrf
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Resultados de Aprendizaje</span>
                                    <select class="form-control" name="selecResultado" id="selecResultado" aria-describedby="espeHelp">
                                        <option value="aplica">Identifica los factores implicados en el desarrollo del pensamiento abstracto</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <span class="input-group-text">Unidades:</span>
                                    <input type="text" class="form-control" id="nomUnidades" name="nomUnidades" placeholder="Unidad 1 Pensamiento Abstracto" >
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
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Resultados de Aprendizaje</span>
                <select class="form-control" name="seleResulAp" id="seleResulAp" aria-describedby="espeHelp">
                    <option value="aplica">Identifica los factores implicados en el desarrollo del pensamiento abstracto</option>

                </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal" data-target="#modalRegistroResultado">Nuevo</button>
            </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Contenidos</span>
                <select class="form-control" name="selecUnidad" id="selecUnidad" aria-describedby="espeHelp">
                    <option value="aplica">Unidad 1 </option>
                    <option value="nAplica">Unidad 2</option>
                </select>
                <button type="button" class=" btn btn-outline-success ml-auto float-left" data-toggle="modal" data-target="#modalRegistroContenidos">Nuevo</button>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Sub-Unidades</span>
                <input type="text" class="form-control" name="subUnidades" id="subUnidades"  aria-label="sub-unidades" aria-describedby="basic-addon1" placeholder="Ingrese Sub-Unidades">
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
                                <table id="tablaCategoria" class="table table-hover data-table">
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
</script>
@stop
@stop


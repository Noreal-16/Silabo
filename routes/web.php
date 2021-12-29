<?php

use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\InformacionController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\CreditosController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\PeriodoAcademicoController;
use App\Http\Controllers\CiclosController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index.index');
})->name('dashboard');


/**
 * Router para Información General
 */
Route::middleware(['auth:sanctum', 'verified'])->get('informacion', [InformacionController::class, 'index'])->name('informacion.index');
/**
 * Descripcion de la Asignatura
 */
Route::middleware(['auth:sanctum', 'verified'])->get('asignatura', [AsignaturaController::class, 'index'])->name('asignatura.index');
Route::middleware(['auth:sanctum', 'verified'])->post('asignatura', [AsignaturaController::class, 'store'])->name('asignatura.store');
Route::middleware(['auth:sanctum', 'verified'])->post('asignatura/update', [AsignaturaController::class, 'update'])->name('asignatura.update');
Route::middleware(['auth:sanctum', 'verified'])->get('asignatura/show/{id}', [AsignaturaController::class, 'show'])->name('asignatura.show');

/**
 * Resultados de Aprendizaje y contenidos
 */
Route::middleware(['auth:sanctum', 'verified'])->get('resultados', [ResultadoController::class, 'index'])->name('resultados.index');
/**
 * ADMINISTRADOR
 */

  /**
  * CRUD Carrera --Facultad
  */
Route::middleware(['auth:sanctum', 'verified'])->get('carrera', [CarreraController::class, 'index'])->name('carrera.index');
Route::middleware(['auth:sanctum', 'verified'])->get('carrera/carga/combo', [CarreraController::class, 'cargaDatosComboCarreras'])->name('carrera.cargaDatosComboCarreras');
Route::middleware(['auth:sanctum', 'verified'])->get('carrera/dataPeriodo', [CarreraController::class, 'cargaDatosCP'])->name('carrera.cargaDatosCP');
Route::middleware(['auth:sanctum', 'verified'])->post('carrera', [CarreraController::class, 'store'])->name('carrera.store');
Route::middleware(['auth:sanctum', 'verified'])->get('carrera/periodo/{id}', [CarreraController::class, 'cargaDatosPeriodoCarrera'])->name('carrera.cargaDatosPeriodoCarrera');
Route::middleware(['auth:sanctum', 'verified'])->get('carrera/show/{id}', [CarreraController::class, 'show'])->name('carrera.show');
Route::middleware(['auth:sanctum', 'verified'])->post('carrera/update', [CarreraController::class, 'update'])->name('carrera.update');
/**
 * Facultad
 */
Route::middleware(['auth:sanctum', 'verified'])->post('facultad', [FacultadController::class, 'store'])->name('facultad.store');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/datos', [FacultadController::class, 'cargaDatos'])->name('facultad.cargaDatos');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/periodo', [FacultadController::class, 'cargaDatosFP'])->name('facultad.cargaDatosFP');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/lista', [FacultadController::class, 'cargaListaDatos'])->name('facultad.cargaListaDatos');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/periodo/{id}', [FacultadController::class, 'cargaDatosFacuPeriodo'])->name('facultad.cargaDatosFacuPeriodo');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/combo/{id}', [FacultadController::class, 'cargaCombo'])->name('facultad.cargaCombo');
Route::middleware(['auth:sanctum', 'verified'])->get('facultad/lista/{id}', [FacultadController::class, 'listaCombo'])->name('facultad.listaCombo');
/**
 * Departamentos
 */
Route::middleware(['auth:sanctum', 'verified'])->post('departamento', [DepartamentoController::class, 'store'])->name('departamento.store');
Route::middleware(['auth:sanctum', 'verified'])->get('departamento/datos', [DepartamentoController::class, 'cargaDatos'])->name('departamento.cargaDatos');
Route::middleware(['auth:sanctum', 'verified'])->get('departamento/lista/{id}', [DepartamentoController::class, 'cargaComDepartamento'])->name('departamento.cargaComDepartamento');
/**
 * Componentes
 */
Route::middleware(['auth:sanctum', 'verified'])->get('componentes', [ComponenteController::class, 'index'])->name('componentes.index');
Route::middleware(['auth:sanctum', 'verified'])->post('componentes', [ComponenteController::class, 'store'])->name('componentes.store');
/**
 * Creditos
 */
Route::middleware(['auth:sanctum', 'verified'])->get('creditos', [CreditosController::class, 'index'])->name('creditos.index');
Route::middleware(['auth:sanctum', 'verified'])->get('creditos/data', [CreditosController::class, 'cargaComboCreditos'])->name('creditos.cargaComboCreditos');
Route::middleware(['auth:sanctum', 'verified'])->post('creditos', [CreditosController::class, 'store'])->name('creditos.store');
Route::middleware(['auth:sanctum', 'verified'])->get('creditos/cargaCombo/{id}', [CreditosController::class, 'cargaCombo'])->name('creditos.cargaCombo');
Route::middleware(['auth:sanctum', 'verified'])->get('creditos/dataCreditos', [CreditosController::class, 'dataCreditos'])->name('creditos.dataCreditos');
/**
 * Actividades de Aprendizaje
 */
Route::middleware(['auth:sanctum', 'verified'])->get('actividades', [ActividadesController::class, 'index'])->name('actividades.index');
/**
 * Periodo Academico - Ciclos
 */
Route::middleware(['auth:sanctum', 'verified'])->get('periodos', [PeriodoAcademicoController::class, 'index'])->name('periodos.index');
Route::middleware(['auth:sanctum', 'verified'])->get('periodos/datosPeriodos', [PeriodoAcademicoController::class, 'cargaDatosComboPeriodo'])->name('periodos.cargaDatosComboPeriodo');
Route::middleware(['auth:sanctum', 'verified'])->post('periodos', [PeriodoAcademicoController::class, 'store'])->name('periodos.store');
/**
 * Ciclos
 */
Route::middleware(['auth:sanctum', 'verified'])->post('ciclos', [CiclosController::class, 'store'])->name('ciclos.store');

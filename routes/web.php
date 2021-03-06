<?php

use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AulaResource;use App\Http\Resources\MateriaResource;use App\Http\Resources\ClaseResource;
use App\Http\Resources\BotonResource;
use App\Models\Aula;use App\Models\Materia;use App\Models\Clase;use App\Models\Boton;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/informacion', function(){
    return view('informacion');
})->name('informacion');
Route::get('/personalizar', function(){
    return view('personalizar');
})->name('personalizar');
Route::get('/exportar', function(){
    return view('exportar');
});
Route::get('/horario', function(){
    return view('horario');
})->name('horario');

Route::get('/klik-class', function(){
    return view('klik-class');
});
Route::get('/jsonaulas',function(){
    return new AulaResource(Aula::where('user_id',auth()->user()->id)->with('mesas')->get());
});
Route::get('/jsonmaterias',function(){
    return new MateriaResource(Materia::where('user_id',auth()->user()->id)->with('estudiantes.mesa')->get());
});
Route::get('/jsonclases',function(){
    return new ClaseResource(Clase::where('user_id',auth()->user()->id)->with('sesion')->with('materia.estudiantes')->get());
    });
Route::get('/jsonbotones',function(){
    return new BotonResource(Boton::get());
    });
Route::get('/clases',[App\Http\Controllers\claseController::class, 'misClases']);
Route::get('/losBotones',[App\Http\Controllers\botonController::class, 'index']);
Route::get('/estudianteMateriasMesa',[App\Http\Controllers\estudianteController::class, 'estudianteMateriasMesa']);
Route::get('/estudiantesPorMateria_Aula',[App\Http\Controllers\aulaController::class, 'estudiantesPorMateria_Aula']);
Route::get('/inicializar_botones',[App\Http\Controllers\botonController::class, 'inicializarBotones'])->name('botones.inicializa');
Route::put('/inicializar_botones/{user}',[App\Http\Controllers\botonController::class, 'inicializarBotones'])->name('botones.inicializa');
Route::get('/misMaterias',[App\Http\Controllers\materiaController::class, 'misMaterias']);
Route::get('/laMateria/{id}',[App\Http\Controllers\materiaController::class, 'laMateria']);
Route::get('/estudiantes',[App\Http\Controllers\estudianteController::class, 'misEstudiantes']);
// Route::get('/is_tinMat/{id}',[App\Http\Controllers\materiaController::class, 'showMesasMateria']);



// Route::apiResources([
//     'materias' =>MateriaController::class,
//     'estudiantes' => EstudianteController::class,
//     'mesas' => MesaController::class,
//     'clases'  =>ClaseController::class, ]);


// ============= MATERIAController ====================

Route::get('configurar/materias/createall',[App\Http\Controllers\MateriaController::class, 'createall'])->name('materias.createall');
Route::post('configurar/materias/createall',[App\Http\Controllers\MateriaController::class, 'storeall'])->name('materias.storeall');
Route::get('etapaUso/materias/{id}', [App\Http\Controllers\MateriaController::class, 'show'])->name('materias.show');
Route::get('etapaUso/vacias/{id}',[App\Http\Controllers\MateriaController::class, 'editMesasVacias'])->name('materias.editMesasVacias');
Route::put('configurar/vacias/{id}',[App\Http\Controllers\MateriaController::class, 'updateMesasVacias'])->name('materias.updateMesasVacias');
// Route::get('etapaUso/materias/{id}/show', [App\Http\Controllers\MateriaController::class, 'showMesasMateria'])->name('materias.show');
// Route::resource('configurar/materias', App\Http\Controllers\MateriaController::class);

Route::get('configurar/materias',[App\Http\Controllers\MateriaController::class, 'index'])->name('materias.index');
    Route::get('configurar/materias/create',[App\Http\Controllers\MateriaController::class, 'create'])->name('materias.create');
    Route::post('configurar/materias',[App\Http\Controllers\MateriaController::class, 'store'])->name('materias.store');
    Route::get('configurar/materias/{materia}',[App\Http\Controllers\MateriaController::class, 'edit'])->name('materias.edit');
    Route::put('configurar/materias/{materia}',[App\Http\Controllers\MateriaController::class, 'update'])->name('materias.update');
    Route::delete('configurar/materias/{materia}',[App\Http\Controllers\MateriaController::class, 'destroy'])->name('materias.destroy');

//

// ============= AULAController ====================

// Route::get('etapaUso/vacias/{aula}',[App\Http\Controllers\AulaController::class, 'editMesasVacias'])->name('aulas.editMesasVacias');
// Route::put('configurar/vacias/{aula}',[App\Http\Controllers\AulaController::class, 'updateMesasVacias'])->name('aulas.updateMesasVacias');

// Route::resource('configurar/aulas', App\Http\Controllers\AulaController::class);

Route::get('configurar/aulas',[App\Http\Controllers\AulaController::class, 'index'])->name('aulas.index');
    Route::get('configurar/aulas/create',[App\Http\Controllers\AulaController::class, 'create'])->name('aulas.create');
    Route::post('configurar/aulas',[App\Http\Controllers\AulaController::class, 'store'])->name('aulas.store');
    Route::get('configurar/aulas/{aula}/edit',[App\Http\Controllers\AulaController::class, 'edit'])->name('aulas.edit');
    Route::get('etapaUso/aulas/{aula}', [App\Http\Controllers\AulaController::class, 'show'])->name('aulas.show');
    // Route::get('etapaUso/aulas/{aula}/materias/{materia}/show', [App\Http\Controllers\AulaController::class, 'show'])->name('aulas.show');
    Route::put('configurar/aulas/{aula}',[App\Http\Controllers\AulaController::class, 'update'])->name('aulas.update');
    Route::delete('configurar/aulas/{aula}',[App\Http\Controllers\AulaController::class, 'destroy'])->name('aulas.destroy');
//



// ============= SESIONController ====================

Route::resource('configurar/sesions', App\Http\Controllers\SesionController::class);

// Route::get('configurar/sesions',[App\Http\Controllers\SesionController::class, 'index'])->name('sesions.index');
    // Route::get('configurar/sesions/create',[App\Http\Controllers\SesionController::class, 'create'])->name('sesions.create');
    // Route::post('configurar/sesions',[App\Http\Controllers\SesionController::class, 'store'])->name('sesions.store');
    // Route::get('configurar/sesions/{sesion}/edit',[App\Http\Controllers\SesionController::class, 'edit'])->name('sesions.edit');
    // Route::put('configurar/sesions/{sesion}',[App\Http\Controllers\SesionController::class, 'update'])->name('sesions.update');

//


// ============= CLASEController ====================

Route::resource('configurar/clases', App\Http\Controllers\ClaseController::class);
 
// Route::get('configurar/clases',[App\Http\Controllers\ClaseController::class, 'index'])->name('clases.index');
    // Route::get('configurar/clases/create',[App\Http\Controllers\ClaseController::class, 'create'])->name('clases.create');
    // Route::post('configurar/clases',[App\Http\Controllers\ClaseController::class, 'store'])->name('clases.store');
    // Route::get('configurar/clases/{clase}/edit',[App\Http\Controllers\ClaseController::class, 'edit'])->name('clases.edit');
    // Route::put('configurar/clases/{clase}',[App\Http\Controllers\ClaseController::class, 'update'])->name('clases.update');
    // Route::delete('configurar/clases/{clase}',[App\Http\Controllers\ClaseController::class, 'destroy'])->name('clases.destroy');


//


// ============= PASOController ====================

Route::put('home/crearCurso/{user}',[App\Http\Controllers\PasoController::class, 'crearCurso'])->name('crearCurso');
Route::put('home/pasoMenos/{user}',[App\Http\Controllers\PasoController::class, 'updatePasoMenos'])->name('home.updatePasoMenos');
Route::put('home/pasoMas/{user}',[App\Http\Controllers\PasoController::class, 'updatePasoMas'])->name('home.updatePasoMas');

Route::get('/home/mostrarClase',[App\Http\Controllers\ClaseController::class, 'mostrarClase']);
Route::get('/clasesPorDia',[App\Http\Controllers\ClaseController::class, 'clasesPorDia']);


// ============= ESTUDIANTEController ====================


Route::get('mostrar/estudiantes/{materia_id}', [App\Http\Controllers\EstudianteController::class, 'porMateria'])->name('estudiantes.porMateria');
Route::delete('borrar/estudiantes/{materia_id}', [App\Http\Controllers\EstudianteController::class, 'borrarGrupo'])->name('estudiantes.borrarGrupo');
Route::get('configurar/estudiantes', [App\Http\Controllers\EstudianteController::class, 'index'])->name('estudiantes.index');

// Route::resource('configurar/estudiantes', App\Http\Controllers\EstudianteController::class);

Route::get('configurar/estudiantes/create/{materia_id}',[App\Http\Controllers\EstudianteController::class,'create'])->name('estudiantes.create');
    Route::post('configurar/estudiantes/create',[App\Http\Controllers\EstudianteController::class, 'store'])->name('estudiantes.store');
    Route::get('configurar/estudiantes/{estudiante}/edit',[App\Http\Controllers\EstudianteController::class, 'edit'])->name('estudiantes.edit');
    Route::put('configurar/estudiantes/{estudiante}',[App\Http\Controllers\EstudianteController::class,'update'])->name('estudiantes.update');
    Route::delete('configurar/estudiantes/{estudiante}',[App\Http\Controllers\EstudianteController::class,'destroy'])->name('estudiantes.destroy');

// ============= MESAController ====================

Route::get('/mesasPorClase/{clase}',[App\Http\Controllers\MesaController::class, 'clasesPorDia']);
Route::resource('configurar/mesas', App\Http\Controllers\MesaController::class);

// Route::get('configurar/mesas',    [App\Http\Controllers\MesaController::class,  'index'])->name('mesas.index');
    // Route::get('configurar/mesas/create',   [App\Http\Controllers\MesaController::class, 'create'])->name('mesas.create');
    // Route::post('configurar/mesas',   [App\Http\Controllers\MesaController::class,  'store'])->name('mesas.store');
    // Route::get('configurar/mesas/{mesa}/edit',[App\Http\Controllers\MesaController::class,   'edit'])->name('mesas.edit');
    // Route::put('configurar/mesas/{mesa}',[App\Http\Controllers\MesaController::class,' update'])->name('mesas.update');
    // Route::delete('configurar/mesas/{mesa}',[App\Http\Controllers\MesaController::class,'destroy'])->name('mesas.destroy');

// ============= BOTONController ====================

Route::get('personalizar#cloneBooleano',[App\Http\Controllers\BotonController::class, 'cloneBooleano'])->name('botones.cloneBooleano');
Route::get('personalizar#cloneGradual',[App\Http\Controllers\BotonController::class, 'cloneBooleano'])->name('botones.cloneGradual');
Route::get('personalizar#cloneAsistencia',[App\Http\Controllers\BotonController::class, 'cloneAsistencia'])->name('botones.cloneAsistencia');
Route::post('personalizar',[App\Http\Controllers\BotonController::class, 'store'])->name('botones.store');


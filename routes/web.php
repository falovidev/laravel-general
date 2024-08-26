<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\VideoController;
use Mockery\Undefined;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/*
usa get con url '/tasks' , se le pasa el controlador'TaskController::class,' 
y el metodo 'index',que se encuentra en el controlador. name es usado 
con Route('tasks.index') , para nombrar la ruta en otra parte 
del codigo ej:  return redirect()->route('tasks.index') back
o ej:<form action="{{ route('tasks.store') }}" method="POST"> front
*/

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/max/{nombrePelicula}', function ($nombrePelicula) {
    return view('play',['nombre' => $nombrePelicula]);
});

//Route::get('/', [VideoController::class, 'getVideos'])->name('videos.getVideos');


Route::get('/', [VideoController::class, 'index'])->name('videos.index');
Route::get('/play/{id}', [VideoController::class, 'show'])->name('videos.play');
Route::get('/series', [VideoController::class, 'series'])->name('videos.series');
Route::get('/movies', [VideoController::class, 'movies'])->name('videos.movies');
Route::get('/hbo', [VideoController::class, 'hbo'])->name('videos.hbo');
Route::get('/childandfamily', [VideoController::class, 'childAndFamily'])->name('videos.childandfamily');
Route::get('/stuff', [VideoController::class, 'stuff'])->name('videos.stuff');
Route::post('/stuff/{videoId}/add', [VideoController::class, 'addStuff'])->name('addStuff.add');
Route::delete('/stuff/{videoId}/remove', [VideoController::class, 'removeStuff'])->name('stuff.remove');

Route::post('/playvideo/{videoId}/add', [VideoController::class, 'addContinueWatching'])->name('addPlayVideo.add');

// Route::delete('/stuff/{videoId}/remove', [VideoController::class, 'removeStuff'])->name('stuff.remove');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;

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

// The controller search the __invoke method
Route::get('/', HomeController::class);

// Here i created a example route to access to 'courses'
Route::get('cursos', [CursoController::class, 'index']);

// Another way to access the view
// Route::view('/cursos', 'cursos.index');

// Could create also variables into the routes
// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido al curso de $curso";
// });

// Laravel read the route's list from top to bottom, so if it finds a route sooner, it will read it first
// this page not will be access in this way because the third route is read before.
Route::get('cursos/create', [CursoController::class, 'create']);

// After commented the third route, i will be put after the fourd route and now the previous page is accesible
Route::get('cursos/{curso}', [CursoController::class, 'show']);

// The variables could be optional, with this sintax
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
//     return "Bienvenido al curso de $curso" . ($categoria ? ", de la categoría $categoria." : ".");
// });




// FROM PREVIOUS VERSIONS OF LARAVEL
// Route::get('/', 'HomeController');
// Route::get('cursos', 'CursoController@index');
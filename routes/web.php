<?php

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

// rutas prdefinidas de auth
Auth::routes();

// Publico is setLocale para el idioma del frontOffice
Route::group( [ 'middleware' =>'setlocale' ], function() {
  Route::get('/', 'HomeController@getHome');
  // Route::get('/proyectos', 'HomeController@getProjects');

  Route::get('/estudio', 'HomeController@us');
  Route::get('/contacto', 'HomeController@contactUs');
  // Route::get('/tienda', 'HomeController@store'); por el momento no tiene tienda
  Route::get('/proyectos/{slug}', 'ProjectsController@showProject');
});

// paso middleware y prefix para el backoffice
Route::group( [ 'middleware' => 'admin' ], function() {

  // Route::get('/admin', 'HomeController@admin');
  Route::prefix('admin')->group(function () {
    Route::get('/', 'HomeController@admin');

    // Rutas Proyectos
    Route::prefix('proyectos')->group(function () {
      Route::get('/', 'ProjectsController@listProjects');
      Route::get('/año', 'ProjectsController@listProjectsByYear');
      Route::get('/cliente', 'ProjectsController@listProjectsByClient');
      Route::get('/titulo', 'ProjectsController@listProjectsByTitle');
      Route::get('/buscar', 'ProjectsController@searchProjects');
      Route::get('/nuevo', 'ProjectsController@createProject');
      Route::post('/nuevo', 'ProjectsController@storeProject');
      Route::get('/editar/{id}', 'ProjectsController@editProject');
      Route::patch('/editar/{id}', 'ProjectsController@updateProject');
      Route::get('/eliminar/{id}', 'ProjectsController@destroyProject');
    });
    //Rutas imagenes
    Route::get('/imagen_eliminar/', 'ProjectsController@destroyImage');
    Route::post('/imagen_eliminar/', 'ProjectsController@destroyImage');

    // Rutas Tags
    Route::prefix('etiquetas')->group(function () {
      Route::get('/', 'TagsController@listTags');
      Route::get('/nueva', 'TagsController@createTag');
      Route::post('/nueva', 'TagsController@storeTag');
      Route::get('/modificar/{name}', 'TagsController@editTag');
      Route::patch('/modificar/{name}', 'TagsController@updateTag');
      Route::get('/eliminar/{name}', 'TagsController@destroyTag');
    });

    // rutas user
    Route::get('/editar_cuenta/{id}', 'UsersController@profileEdit');
    Route::patch('/editar_cuenta/{id}', 'UsersController@update');

    // Rutas Products
    Route::prefix('productos')->group(function () {
      Route::get('/', 'ProductsController@listProducts');
      Route::get('/nuevo', 'ProductsController@createProduct');
      Route::post('/nuevo', 'ProductsController@storeProduct');
      Route::get('/modificar/{name}', 'ProductsController@editProduct');
      Route::patch('/modificar/{name}', 'ProductsController@updateProduct');
      Route::get('/eliminar/{name}', 'ProductsController@destroyProduct');
    });
  });
});

// // no se encuentra proyecto / no sé si se puede borrar
Route::get('/error', 'ProjectsController@error404');

// cambiar idioma
Route::get('/{lang}', 'HomeController@changeLang');

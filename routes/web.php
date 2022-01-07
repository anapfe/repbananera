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
  Route::get('/proyectos', 'HomeController@getProjects');

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
    Route::get('/proyectos', 'ProjectsController@listProjects');
    Route::get('/proyectos_año', 'ProjectsController@listProjectsByYear');
    Route::get('/proyectos_cliente', 'ProjectsController@listProjectsByClient');
    Route::get('/proyectos_titulo', 'ProjectsController@listProjectsByTitle');
    Route::get('/proyecto_nuevo', 'ProjectsController@createProject');
    Route::post('/proyecto_nuevo', 'ProjectsController@storeProject');
    Route::get('/proyecto_editar/{id}', 'ProjectsController@editProject');
    Route::patch('proyecto_editar/{id}', 'ProjectsController@updateProject');
    Route::get('/proyecto_eliminar/{id}', 'ProjectsController@destroyProject');
    Route::get('/proyectos_buscar', 'ProjectsController@searchProjects');

    //Rutas imagenes
    Route::get('/imagen_eliminar/', 'ProjectsController@destroyImage');
    Route::post('/imagen_eliminar/', 'ProjectsController@destroyImage');

    // Rutas Tags
    Route::get('/etiquetas', 'TagsController@listTags');
    Route::get('/etiqueta_nueva', 'TagsController@createTag');
    Route::post('/etiqueta_nueva', 'TagsController@storeTag');
    Route::get('/etiqueta_modificar/{name}', 'TagsController@editTag');
    Route::patch('/etiqueta_modificar/{name}', 'TagsController@updateTag');
    Route::get('/etiqueta_eliminar/{name}', 'TagsController@destroyTag');

    // rutas user
    Route::get('/editar_cuenta/{id}', 'UsersController@profileEdit');
    Route::patch('/editar_cuenta/{id}', 'UsersController@update');

    // Rutas Products
    Route::get('/productos', 'ProductsController@listProducts');
    Route::get('/producto_nuevo', 'ProductsController@createProduct');
    Route::post('/producto_nuevo', 'ProductsController@storeProduct');
    Route::get('/producto_modificar/{name}', 'ProductsController@editProduct');
    Route::patch('/producto_modificar/{name}', 'ProductsController@updateProduct');
    Route::get('/producto_eliminar/{name}', 'ProductsController@destroyProduct');
  });
});

// // no se encuentra proyecto / no sé si se puede borrar
Route::get('/error', 'ProjectsController@error404');

// cambiar idioma
Route::get('/{lang}', 'HomeController@changeLang');

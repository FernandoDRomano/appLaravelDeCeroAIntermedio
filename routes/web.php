<?php

Route::view('/', 'home')->name('home');
Route::view('about', 'about')->name('about');

Route::view('contact', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('contact.store');

Route::get('projects/deleted', 'ProjectController@projectsDeleted')->name('deleted')->middleware('auth');
Route::patch('projects/{project}/restore', 'ProjectController@restore')->name('projects.restore')->middleware('auth');
Route::delete('projects/{project}/delete-force', 'ProjectController@forceDelete')->name('projects.delete-force')->middleware('auth');
Route::resource('projects', 'ProjectController');

Route::get('categories/{category}', 'CategoryController@show')->name('categories.show');

Auth::routes();

/* 
Route::get('/projects', 'ProjectController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
Route::post('/projects', 'ProjectController@store')->name('projects.store');
Route::get('/projects/edit/{project}', 'ProjectController@edit')->name('projects.edit');
Route::patch('/projects/{project}', 'ProjectController@update')->name('projects.update');
Route::delete('/projects/{project}', 'ProjectController@destroy')->name('projects.delete');
Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show'); 
*/

/* 
    DEFINIENDO UNA RUTA: toda ruta recibe la URI y una función anonima

        Route::get('/', function(){
            return view('vistaHome)
        });

    PASANDO PARAMETROS A UNA RUTA: se puede pasar el parametro en la ruta y este debe ser recibido por la función
    anonima, se lo pasa mediante llaves {parametro}, si queremos que este parametro sea opcional se debe agregar el signo
    de interrogación al final del parametro {parametro?} y ademas darle un valor por defecto al parametro que se 
    recibe en la función anomina => function($nombre = "mi valor por defecto")

        Route::get('user/{nombre}', function($nombre) {
            return "Hola " . $nombre;
        });

        Route::get('user/{nombre?}', function($nombre = "Invitado") {
            return "Hola " . $nombre;
        });

    TIPOS DE RUTAS

        Route::get()
        Route::post()
        Route::put()
        Route::patch()
        Route::delete()

    RUTA QUE SOLO DEVUELVE UNA VISTA: si solo se devolvera una vista estatica o con pocos parametros es conviente usar 
    Route::view() que recibe al igual que las otras rutas la URI y en este caso la vista a retornar

        Route::view('URI', 'viewName');

    PASAR PARAMETROS A LAS VISTAS: para pasar parametros a las vistas, lo podemos hacer enviando un array o usando 
    los metodos with() o compact()

        Route::view('producto', 'viewProducto', ['producto' => $producto]);

        Route::get('/', function(){
        	$nombre = "Jorge";
        	return view('home', compact('nombre')); //['nombre' => $nombre]
        });

        Route::get('/', function(){
        	$nombre = "Jorge";
        	return view('home')->with('nombre', $nombre);
        });


    NOMBRE A LAS RUTAS: se puede darle nombre a las rutas usando el metodo name(), al igual que en Vue es conveniente
    ponerle un nombre a las rutas, asi, si es que cambia la URI no tengo que modificar en todo el sistema en donde se
    hace referencia a la ruta

        Route::get('contacto', function () {
            return view('viewContacto)
        })->name('contacto');
    
    MIDDLEWARE: Un middleware es un mecanismo que se utiliza para filtrar las peticiones HTTP en una aplicación. Esto 
    permite agregar una capa extra de lógica a nuestro sistema, por ejemplo laravel trae por defecto un middleware
    de autentificación en donde al usarlo le indicamos que rutas estan protegidas para usuarios autentificados unicamente
    y en el caso de que no se encuentren autentificados, se los puede redireccionar a alguna página en especifico.
    Los Middleware de laravel funcionan similar a los guardianes de rutas en vue js

        Route::resource('projects', 'ProjectController')->middleware('auth'); 

    Esto restringira todas las rutas de projects a usuarios autentificados solamente, si quisieramos solo restringir
    alguna de las rutas de projects es mejor realizar la implementación del middleware en el ProjectController

    RESTRINGIR RUTAS POR DEFECTO DEL AUTH DE LARAVEL: si quisieramos restringir algunas rutas que trae por defecto
    el auth de laravel, podriamos hacer de la siguiente manera para restringir por ejemplo la ruta de registro

    Auth::routes(['register'=>false]);


*/


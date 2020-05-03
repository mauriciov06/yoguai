<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Ciudad;
use App\Sabor;
use App\Producto;

//Inicio pagina principal
Route::get('/', function () {
	$sabores = Sabor::where('estado_sabor','publicado')->lists('nombre_sabor','id');
	$productos = Producto::where('cantidad_disponible', '>',0)->lists('nombre_producto','id');
	$ciudades = Ciudad::lists('nombre_ciudad','id');
    return view('index', ['ciudades'=>$ciudades, 'sabores'=>$sabores, 'productos'=>$productos]);
});


//Admin
Route::get('/admin', 'FrontController@admin');

//Iniciar sesion
Route::get('/iniciar-sesion', 'LogController@index');
Route::resource('log', 'LogController');

//Usuarios
Route::resource('usuarios', 'UsuarioController');
Route::get('usuarios/{id}/edit', 'UsuarioController@edit');
Route::post('usuarios/{correo}/', 'UsuarioController@validarcorreounico');

//Profile
Route::resource('profile', 'ProfileController');
Route::get('profile/{id}/edit', 'ProfileController@edit');

//Registrarme
Route::resource('registrarme', 'RegistroController');
Route::get('/registrarme', 'RegistroController@index');

//Cerrar sesion
Route::get('/logout', 'LogController@logout');

//Restablecer contraseña
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

//Sabores
Route::resource('sabores', 'SaborController');
Route::get('sabores/{id}/edit', 'SaborController@edit');

//Cliente
Route::resource('clientes', 'ClienteController');
Route::get('clientes/{id}/edit', 'ClienteController@edit');

//Producto
Route::resource('productos', 'ProductoController');
Route::get('productos/{id}/edit', 'ProductoController@edit');
Route::post('productos/{id}/', 'ProductoController@valorproducto');

//Proveedor
Route::resource('proveedores', 'ProveedorController');
Route::get('proveedores/{id}/edit', 'ProveedorController@edit');

//Pedido
Route::resource('pedidos', 'PedidoController');
Route::get('pedidos/{id}/edit', 'PedidoController@edit');
//Modal Reservante
Route::post('pedidos-reservante/{id}/', 'PedidoController@inforeservante');

//Email Contacto
Route::resource('mail', 'MailController');
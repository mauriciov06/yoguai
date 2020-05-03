<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use App\Ciudad;
use App\Sabor;
use App\Producto;
use App\Proveedor;
use App\Pedido;
use Auth;
use Redirect;
use Session;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'validarcorreounico']);
        $this->middleware('admin', ['except'=>'validarcorreounico']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::busquedausuario($request->get('nombre_usuario'),$request->get('correo_usuario'),$request->get('ciudad_usuario'))->orderBy('id','DESC')->where('tipo_cuenta','1')->paginate();
        $numUser = User::where('tipo_cuenta', '1')->count();
        $numCliente = User::where('tipo_cuenta', '2')->count();
        $numSabr = Sabor::count();
        $numProd = Producto::count();
        $numProve = Proveedor::count();
        $ciudades = Ciudad::lists('nombre_ciudad','id');

        if(Auth::user()->tipo_cuenta == 1){
          $numPedi = Pedido::count();
        }else{
          $numPedi = Pedido::where('id_usuario', Auth::id())->count();
        }
        
        return view('usuarios.index', compact('users', 'numUser','ciudades', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudad = Ciudad::lists('nombre_ciudad','id');
        $numUser = User::where('tipo_cuenta', '1')->count();
        $numCliente = User::where('tipo_cuenta', '2')->count();
        $numSabr = Sabor::count();
        $numProd = Producto::count();
        $numProve = Proveedor::count();

        if(Auth::user()->tipo_cuenta == 1){
          $numPedi = Pedido::count();
        }else{
          $numPedi = Pedido::where('id_usuario', Auth::id())->count();
        }

        return view('usuarios.create', compact('ciudad', 'numUser','numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {        
        User::create($request->all());
        return redirect('/usuarios')->with('message','Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $ciudad = Ciudad::lists('nombre_ciudad','id');
        $numUser = User::where('tipo_cuenta', '1')->count();
        $numCliente = User::where('tipo_cuenta', '2')->count();
        $numSabr = Sabor::count();
        $numProd = Producto::count();
        $numProve = Proveedor::count();

        if(Auth::user()->tipo_cuenta == 1){
          $numPedi = Pedido::count();
        }else{
          $numPedi = Pedido::where('id_usuario', Auth::id())->count();
        }

        return view('usuarios.edit', ['user'=>$user, 'ciudad'=>$ciudad, 'numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UserUpdateRequest $request)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        Session::flash('message', 'Usuario editado correctamente');
        return Redirect::to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Usuario eliminado correctamente');
        return Redirect::to('/usuarios');
    }

    public function validarcorreounico(Request $request)
    {
        $correo = $request->correo;
        $users = DB::table('users')->where('email', $correo)->first();
        if(empty($users)){
            return response(['status' => 'true']);
        }else{
            return response(['status' => 'false','id'=>$users->id]);
        }
    }
}

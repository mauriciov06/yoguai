<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Sabor;
use App\Ciudad;
use App\Producto;
use App\Proveedor;
use App\Pedido;
use Auth;
use Redirect;
use Session;
use App\Http\Requests\UserUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        return view('profile.edit', ['user'=>$user, 'ciudad'=>$ciudad, 'numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
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
        return Redirect::to('/profile/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

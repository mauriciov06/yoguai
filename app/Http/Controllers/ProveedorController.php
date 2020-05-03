<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sabor;
use App\Ciudad;
use App\Producto;
use App\Proveedor;
use App\Pedido;
use Redirect;
use Session;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorCreateRequest;
use App\Http\Requests\ProveedorUpdateRequest;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proveedors = Proveedor::busquedaproveedor($request->get('nombre_proveedor'),$request->get('nombre_producto'),$request->get('ciudad_proveedor'))->orderBy('id','DESC')->paginate();
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
        
        return view('proveedores.index', compact('proveedors', 'numUser','ciudades', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
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

        return view('proveedores.create', compact('ciudad', 'numUser','numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorCreateRequest $request)
    {
        Proveedor::create($request->all());
        return redirect('/proveedores')->with('message','Proveedor creado correctamente');
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
        $proveedor = Proveedor::find($id);
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

        return view('proveedores.edit', ['proveedor'=>$proveedor, 'ciudad'=>$ciudad, 'numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProveedorUpdateRequest $request)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->fill($request->all());
        $proveedor->save();

        Session::flash('message', 'Proveedor editado correctamente');
        return Redirect::to('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        Session::flash('message', 'Proveedor eliminado correctamente');
        return Redirect::to('/proveedores');
    }
}

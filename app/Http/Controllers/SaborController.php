<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Sabor;
use App\Producto;
use App\Proveedor;
use App\Pedido;
use Auth;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\SaborCreateRequest;
use App\Http\Requests\SaborUpdateRequest;
use App\Http\Controllers\Controller;

class SaborController extends Controller
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
        $sabores = Sabor::busquedasabor($request->get('nombre_sabor'),$request->get('estado_sabor'))->orderBy('id','DESC')->paginate();
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

        return view('sabores.index', compact('sabores','numUser', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        return view('sabores.create', compact('numUser', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaborCreateRequest $request)
    {
        Sabor::create($request->all());
        return redirect('/sabores')->with('message','Sabor creado correctamente');
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
        $sabor = Sabor::find($id);
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

        return view('sabores.edit', ['sabor'=>$sabor,'numUser'=>$numUser,'numSabr'=>$numSabr,'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaborUpdateRequest $request)
    {
        $sabor = Sabor::find($id);
        $sabor->fill($request->all());
        $sabor->save();

        Session::flash('message', 'Sabor editado correctamente');
        return Redirect::to('/sabores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sabor = Sabor::find($id);
        $sabor->delete();
        Session::flash('message', 'Sabor eliminado correctamente');
        return Redirect::to('/sabores');
    }
}

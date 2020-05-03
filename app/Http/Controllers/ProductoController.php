<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sabor;
use App\Producto;
use App\Proveedor;
use App\Pedido;
use Session;
use Redirect;
use Auth;
use App\Http\Requests;
use App\Http\Requests\ProductoCreateRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>'valorproducto']);
        $this->middleware('admin', ['except'=>'valorproducto']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::busquedaproducto($request->get('nombre_producto'))->orderBy('id','DESC')->paginate(5);
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
        
        return view('productos.index', compact('productos', 'numUser', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
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

        return view('productos.create', compact('numUser', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoCreateRequest $request)
    {
        Producto::create($request->all());
        return redirect('/productos')->with('message','Producto creado correctamente');
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
        $producto = Producto::find($id);
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

        return view('productos.edit', ['producto'=>$producto, 'numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProductoUpdateRequest $request)
    {
        $producto = Producto::find($id);
        $producto->fill($request->all());
        $producto->save();

        Session::flash('message', 'Producto editado correctamente');
        return Redirect::to('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        Session::flash('message', 'Producto eliminado correctamente');
        return Redirect::to('/productos');
    }
    
    public function valorproducto(Request $request)
    {
        $producto = Producto::find($request->id);
        $data = $producto->valor_producto;
        return response(['valorproducto' => $data]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Pedido;
use App\Sabor;
use App\Producto;
use App\Proveedor;
use App\EstadoPedido;
use Auth;
use DB;
use Session;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PedidoUpdateRequest;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(Auth::user()->tipo_cuenta == 1){
        $pedidos = Pedido::busquedapedido($request->get('codigo'),$request->get('fecha_ini'),$request->get('fecha_fin'),$request->get('estado'))->orderBy('id','DESC')->paginate();
        $numPedi = Pedido::count();
      }else{
        $pedidos = Pedido::busquedapedido($request->get('codigo'),$request->get('fecha_ini'),$request->get('fecha_fin'),$request->get('estado'))->orderBy('id','DESC')->where('id_usuario', Auth::id())->paginate();
        $numPedi = Pedido::where('id_usuario', Auth::id())->count();
      }
      $productos = Producto::lists('nombre_producto','id');
      $estados = EstadoPedido::lists('nombre_estado','id');
      $sabores = Sabor::lists('nombre_sabor','id');
      $estadospedidos = EstadoPedido::all();

      $numUser = User::where('tipo_cuenta', '1')->count();
      $numCliente = User::where('tipo_cuenta', '2')->count();
      $numSabr = Sabor::count();
      $numProd = Producto::count();
      $numProve = Proveedor::count();

      return view('pedidos.index', compact('pedidos', 'productos', 'sabores', 'estadospedidos', 'estados', 'numUser', 'numSabr', 'numCliente', 'numProd', 'numProve', 'numPedi'));
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
      if(Auth::guest()){
        if($request->ajax()){
          //Creamos el usuario primero
          $user = new User;
          $user->name = $request->nombre_usuario;
          $user->tipo_cuenta = 2;
          $user->avatar = '';
          $user->email = $request->correo_usuario;
          $user->direccion = $request->direccion_usuario;
          $user->tele_movil = $request->tel_cel_usuario;
          $user->id_ciudad = $request->ciudad_usuario;
          $user->password = '';
          $user->save();

          Pedido::create([
              'codigo_pedido' => 'PE'.strtotime("now"),
              'id_producto' => $request['id_producto'],
              'cantidad' => $request['cantidad'],
              'fecha_pedido' => date("Y-m-d H:i:s"),
              'id_sabor' => $request['id_sabor'],
              'estado' => '1',
              'total' => $request['valor_pagar'],
              'id_usuario' => $user->id,
          ]);

          return response()->json([
              'mensaje' => 'Pedido Creado'
          ]);
        }
      }else{
        if($request->ajax()){
          Pedido::create([
              'codigo_pedido' => 'PE'.strtotime("now"),
              'id_producto' => $request['id_producto'],
              'cantidad' => $request['cantidad'],
              'fecha_pedido' => date("Y-m-d H:i:s"),
              'id_sabor' => $request['id_sabor'],
              'estado' => '1',
              'total' => $request['valor_pagar'],
              'id_usuario' => Auth::id(),
          ]);

          return response()->json([
              'mensaje' => 'Pedido Creado'
          ]);
        }
      }
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
        $pedido = Pedido::find($id);
        $productos = Producto::where('cantidad_disponible', '>',0)->lists('nombre_producto','id');
        $sabores = Sabor::where('estado_sabor','publicado')->lists('nombre_sabor','id');
        $estadopedido = EstadoPedido::lists('nombre_estado','id');

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

        return view('pedidos.edit', ['pedido'=>$pedido, 'productos'=>$productos, 'sabores'=>$sabores, 'estadopedido'=> $estadopedido , 'numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, PedidoUpdateRequest $request)
    {
        $pedido = Pedido::find($id);
        $pedido->fill($request->all());
        $pedido->save();

        Session::flash('message', 'Pedido editado correctamente');
        return Redirect::to('/pedidos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        Session::flash('message', 'Pedido eliminado correctamente');
        return Redirect::to('/pedidos');
    }

    public function inforeservante(Request $request)
    {
        $reservante = User::find($request->id);
        $ciudad =  DB::table('ciudads')->where('id', $reservante->id_ciudad)->first();
        $data = $reservante;
        return response(['inforeservante' => $data, 'ciudad'=>$ciudad->nombre_ciudad]);
    }
}

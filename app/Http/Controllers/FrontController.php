<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Sabor;
use App\Ciudad;
use App\Pedido;
use App\Producto;
use App\Proveedor;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only'=>'admin']);
    }
    public function admin(){
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

        return view('admin.index', ['numUser'=>$numUser, 'numSabr'=>$numSabr, 'numCliente'=>$numCliente, 'numProd'=>$numProd, 'numProve'=>$numProve, 'numPedi'=>$numPedi]);
    }
}

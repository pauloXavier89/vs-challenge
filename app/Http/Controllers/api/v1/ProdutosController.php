<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Produtos;
use App\Http\Controllers as control;

class ProdutosController extends control\Controller
{
    public function index(Request $request){
        // $queryString = $request->all();
        
        $Produtos = new Produtos;
        $Produtos = $Produtos->newQuery();

        if( $request->has('q') ){
            $Produtos->where('nome', 'LIKE' , "%".$request->input('q')."%")->get();
        }
        
        if($request->has('filter')){
            $explode = explode(':', $request->filter);

            $campo = $explode[0];
            $valor = $explode[1];

            $Produtos->where($campo, 'LIKE' , "%".$valor."%");
        }

        if($request->has('sort')){
            $Produtos->orderBy($request->sort);
        }

        // $Produtos->get();

        return response()->json($Produtos);
    }
}

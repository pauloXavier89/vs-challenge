<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;

class ProdutosController extends Controller
{
    public function index(){
        $Produtos = Produtos::all();

        return response()->json($Produtos);
    }
    
    public function show($id){
        $Produtos = Produtos::findOrFail($id);
        
        return response()->json($Produtos);
    }
    
    public function store(Request $request)
    {
        $Produto = new Produtos;
        $Produto->fill($request->all());
        $Produto->save();
        
        return response()->json($Produto);
    }
    
    public function update(Request $request, $id)
    {
        $Produto = Produtos::findOrFail($id);
        
        $Produto->fill($request->all());
        
        $Produto->save();
        return response()->json($Produto);
    }
    
    public function destroy($id)
    {
        $Produto = Produtos::findOrFail($id);
        $Produto->delete();

        return response()->json(['Produto'=>$Produto->id]);
    }
}

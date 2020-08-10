<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class BuscarController extends Controller
{


        public function busqueda(Request $request)
    {

        if($request->get('buscarProducto')){
            $busca = Product::where("name", "LIKE", "%{$request->get('buscarProducto')}%")
                ->paginate(5);
        return view('userViews.show')->with('buscar', $busca);
        }
        //else{
        //  $noticias = Noticia::paginate(5);
        //}

        // return response($noticias);
        return view('userViews.show');
    }





}

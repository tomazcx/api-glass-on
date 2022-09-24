<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('produtos')
        ->join('formatos', 'produtos.idformat','=','formatos.id')
        ->join('cores', 'produtos.idcolor','=','cores.id')
        ->join('materiais', 'produtos.idmaterial','=','materiais.id')
        ->select("produtos.*", "formatos.name as format", "cores.name as color", "materiais.name as material")
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'is_sun_glass' => 'required',
            'image_path' => 'required',
            'main_page' => 'required',
            'idformat' => 'required',
            'idcolor' => 'required',
            'idmaterial' => 'required',
            'parcels' => 'required'
        ]);

        return produtos::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('produtos')
        ->where('produtos.id','=',$id)
        ->join('formatos', 'produtos.idformat','=','formatos.id')
        ->join('cores', 'produtos.idcolor','=','cores.id')
        ->join('materiais', 'produtos.idmaterial','=','materiais.id')
        ->select('produtos.*',"formatos.name as format", "cores.name as color", "materiais.name as material")
        ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = produtos::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return produtos::destroy($id);
    }
}

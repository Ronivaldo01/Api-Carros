<?php

namespace App\Http\Controllers;
use App\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{

    public function index()
    {
        $carro = Carro::all();
        return $carro;
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
        $carro = new Carro();
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->ano = $request->input('ano');
        $carro->save();
        return json_encode($carro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = Carro::find($id);
        return json_encode($carro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produto::find($id);
        if($prod){
        $prod->id = $request->input('id');
        $prod->nome = $request->input('nome');
        $prod->preco = $request->input('preco');
        $prod->estoque = $request->input('estoque');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return json_encode($prod); 
            }
         return "Deu Erro!";
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
        $carro = Carro::find($id);
        if($carro){
        $carro->marca = $request->input('marca');
        $carro->modelo = $request->input('modelo');
        $carro->ano = $request->input('ano');
        $carro->save();
        return json_encode($carro);
        }
        return "Erro ao alterar registro!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carros = Carro::find($id);
        if(isset($carros)){
            $carros->delete();
            return response('200');
        }

        return response("Error:4004");
    }
}

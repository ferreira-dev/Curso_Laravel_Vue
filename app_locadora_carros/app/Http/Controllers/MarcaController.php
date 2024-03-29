<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = $this->marca->all();
        
        if (count($all) < 1 ) {
            return response()->json(['msg' => 'Ainda não há marcas cadastradas'], 200);
        } 

        return response()->json($all, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->marca->rules(), $this->marca->feedback());

        $insert = $this->marca->create($request->all());
        return response()->json($insert, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $marca = $this->marca->find($id);
        
        if (!$marca) {
            return response()->json(['erro' => 'Recurso pesquisado não existe.   '], 404);
        }
        
        return response()->json($marca, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Inteegr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = $this->marca->find($id);

        if (!$marca) {
            return response()->json(['erro' => 'Não foi possível atualizar. Recurso não existe.'], 404);
        }

        $request->validate($marca->rules(), $marca->feedback());
        $marca->update($request->all());
        return response()->json($marca, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);

        if (!$marca) {
            return response()->json(['erro' => 'Erro ao excluir. Recurso não existe.'], 404);
        }

        $marca->delete();
        return response()->json(['msg' => 'A marca foi removida com sucesso! '], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Tipo_Servico;
use Illuminate\Http\Request;

class TipoServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo = Tipo_Servico::all();
        return view('TipoServico', compact('tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novoTipoServico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new Tipo_Servico();
        
        $tipo->nome = $request->input('nome');
        $tipo->descricao = $request->input('descricao');
        $tipo->preco = $request->input('preco');
        $tipo->save();
        
        return redirect('/TipoServico');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo_Servico  $tipo_Servico
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_Servico $tipo_Servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo_Servico  $tipo_Servico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = Tipo_Servico::find($id);
        if(isset($tipo)){
            return view('editarTipoServico', compact('tipo'));
        }
        return redirect('/TipoServico');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo_Servico  $tipo_Servico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipo_Servico::find($id);
        if(isset($tipo)){
            $tipo->nome = $request->input('nome');
            $tipo->descricao = $request->input('descricao');
            $tipo->preco = $request->input('preco');
            $tipo->save();
            return redirect('\TipoServico');
        }
        return response('Serviço não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo_Servico  $tipo_Servico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Tipo_Servico::find($id);
        if (isset($tipo)) {
            $tipo->delete();
        }
        return redirect('/TipoServico');
    }
}

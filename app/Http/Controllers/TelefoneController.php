<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Telefone;
use App\Http\Requests\TelefoneRequest;
class TelefoneController extends Controller {
    public function __construcy() {
        $this->middleware('auth');
    }

    public function adicionar($id) {
        $cliente = Cliente::find($id);
        return view('telefone.adicionar', compact('cliente'));
    }

    public function salvar(TelefoneRequest $request, $id) {
        $telefone = new Telefone;
        $telefone->descricao = $request->input('descricao');
        $telefone->telefone  = $request->input('numero');

        Cliente::find($id)->addTelefone($telefone);

        \Session::flash('flash_message', [
            'msg'   => "Telefone adicionado com sucesso!",
            'class' => "alert-success"
        ]);

        return redirect()->route('cliente.info', $id);
    }

    public function editar($id) {
        $telefone = Telefone::find($id);
        if(empty($telefone)) {
            \Session::flash('flash_message', [
                'msg'   => "Telefone não encontrado!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('cliente.info', $telefone->cliente->id);
        } else {
            return view('telefone.editar', compact('telefone'));
        }
    }

    public function atualizar(TelefoneRequest $request, $id) {
        Telefone::find($id)->update($request->all());

        \Session::flash('flash_message', [
            'msg'   => "Telefone atualizado com sucesso!",
            'class' => "alert-success"
        ]);
        return redirect()->route('cliente.info', Telefone::find($id)->cliente->id);
    }

    public function apagar($id) {
        $telefone = Telefone::find($id);
        if(empty($telefone)) {
            \Session::flash('flash_message', [
                'msg'   => "Telefone não encontrado!",
                'class' => "alert-danger"
            ]);
        } else {
            $telefone->delete();
            \Session::flash('flash_message', [
                'msg'   => "Telefone excluído com sucesso!",
                'class' => "alert-success"
            ]);
        }
        return redirect()->route('cliente.info', $telefone->cliente->id);
    }

    public function index() {}
    public function create() {} 
    public function store(Request $request) {}
    public function show($id) {}
    public function edit($id) {}
    public function update(Request $request, $id) {}
    public function destroy($id) {}
}
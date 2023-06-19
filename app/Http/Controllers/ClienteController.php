<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        // $clientes = Cliente::simplePaginate(10);
        // return view('cliente.index', compact('clientes'));

        return view('cliente.index', [
            'clientes' => DB::table('clientes')->simplePaginate(10)
        ]);
    }

    public function adicionar() {
        return view('cliente.adicionar');
    }

    public function salvar(ClienteRequest $request) {
        Cliente::create($request->all());
        \Session::flash('flash_message', [
            'msg'   => "Cliente adicionado com sucesso!",
            'class' => "alert-success"
        ]);
        return redirect()->route('cliente.adicionar');
    }

    public function editar($id) {
        $cliente = Cliente::find($id);
        if(!$cliente) {
            \Session::flash('flash_message', [
                'msg'   => "Cliente não encontrado!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('cliente.adicionar');
        } else {
            return view('cliente.editar', compact('cliente'));
        }
    }

    public function atualizar(ClienteRequest $request, $id) {
        Cliente::find($id)->update($request->all());
        \Session::flash('flash_message', [
            'msg'   => "Dados atualizados com sucesso!",
            'class' => "alert-success"
        ]);
        return redirect()->route('cliente.index');
    }   

    public function apagar($id) {
        $cliente = Cliente::find($id);
        if(empty($cliente)) {
            \Session::flash('flash_message', [
                'msg'   => "Cliente não encontrado!",
                'class' => "alert-danger"
            ]);
        } else {
            if($cliente->apagarTelefones()) {
                $cliente->delete();
                \Session::flash('flash_message', [
                    'msg'   => "Cliente excluído com sucesso!",
                    'class' => "alert-success"
                ]);
            } else {
                \Session::flash('flash_message', [
                    'msg'   => "Cliente não encontrado!",
                    'class' => "alert-danger"
                ]);
            }
        }
        return redirect()->route('cliente.index');
    }

    public function info($id) {
        $cliente = Cliente::find($id);
        if(empty($cliente)) {
            \Session::flash('flash_message', [
                'msg'   => "Cliente não encontrado!",
                'class' => "alert-danger"
            ]);
            return redirect()->route('cliente.index');
        } else {
            return view('cliente.info', compact('cliente'));
        }
    }

    public function boot() {
        Paginator::useBootstrap();
    }
}

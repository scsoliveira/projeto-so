@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active">Informações</li>
                    <!-- <li class="breadcrumb-item" aria-current="page">Data</li> -->
                </ol>
            </nav>

            <div class="text-center m-4">
                <h4>Informações do(a) cliente {{ $cliente->nome }}</h4>
            </div>

            <div class="card mb-4">
                <div class="card-header"><b>Geral</b></div>
                <div class="container-fluid mt-4">
                    <div class="card-body m-0 p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th>E-mail</th>
                                        <th>Endereço</th>
                                        {{-- <th>Opções</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="align-middle" scope="row">{{ $cliente->id }}</th>
                                        <td class="align-middle">{{ $cliente->nome }}</td>
                                        <td class="align-middle">{{ $cliente->email }}</td>
                                        <td class="align-middle">{{ $cliente->endereco }}</td>
                                        {{-- <td>
                                            <div class="m-auto align-middle d-flex justify-content-center">
                                                <a class="btn btn-sm btn-outline-dark align-middle mr-1" href="{{ route('cliente.editar', $cliente->id) }}">Editar</a>
                                                <a class="btn btn-sm btn-outline-danger align-middle ml-1" href="javascript:(confirm('Apagar registro permanentemente?') ? window.location.href='{{route('cliente.apagar', $cliente->id)}}' : false)">Apagar</a>
                                            </div>
                                        </td> --}}
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><b>Telefones</b></div>
                <div class="text-left m-2 text-center">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('telefone.adicionar', $cliente->id) }}" role="button">Adicionar Telefone</a>
                </div>
                <div class="container-fluid">
                    <div class="card-body m-0 p-0">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Descrição</th>
                                        <th>Número</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cliente->telefones as $telefone)
                                        <tr>
                                            <th class="align-middle" scope="row">{{ $telefone->id }}</th>
                                            <td class="align-middle">{{ $telefone->descricao }}</td>
                                            <td class="align-middle">{{ $telefone->telefone }}</td>
                                            <td>
                                                <div class="m-auto align-middle d-flex justify-content-center">
                                                    <a class="btn btn-sm btn-outline-dark align-middle mr-1" href="{{ route('telefone.editar', $telefone->id) }}">Editar</a>
                                                    <a class="btn btn-sm btn-outline-danger align-middle ml-1" href="javascript:(confirm('Apagar registro permanentemente?') ? window.location.href='{{route('telefone.apagar', $telefone->id)}}' : false)">Apagar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

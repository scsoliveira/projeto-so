@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-12">
            <div class="text-center mb-4 ">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('cliente.adicionar') }}" role="button">Adicionar</a>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Clientes</li>
                    <!-- <li class="breadcrumb-item" aria-current="page">Data</li> -->
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">{{ __('Lista de clientes') }}</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

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
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <th class="align-middle" scope="row">{{ $cliente->id }}</th>
                                            <td class="align-middle">{{ $cliente->nome }}</td>
                                            <td class="align-middle">{{ $cliente->email }}</td>
                                            <td class="align-middle">{{ $cliente->endereco }}</td>
                                            <td>
                                                <div class="m-auto align-middle d-flex justify-content-center">
                                                    <a class="btn btn-sm btn-outline-dark align-middle mr-1" href="{{ route('cliente.editar', $cliente->id) }}"><i class="fas fa-edit">Editar</i></a>
                                                    <a class="btn btn-sm btn-outline-danger align-middle ml-1" href="javascript:(confirm('Apagar registro permanentemente?') ? window.location.href='{{route('cliente.apagar', $cliente->id)}}' : false)">Apagar</a>
                                                    <a class="btn btn-sm btn-outline-primary align-middle ml-1" href="{{ route('cliente.info', $cliente->id) }}">Info</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="text-center">
                        {!!$clientes->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

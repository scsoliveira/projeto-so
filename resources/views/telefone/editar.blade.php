@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-12">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('cliente.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cliente.info', $telefone->cliente->id) }}">Informações</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                    <!-- <li class="breadcrumb-item" aria-current="page">Data</li> -->
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">Editar telefone do cliente <b>{{ $telefone->cliente->nome }}</b></div>
                <div class="container-fluid mt-4">
                    <div class="card-body m-0 p-0">
                        <div class="pr-5 pl-5 pb-3">
                            <form action="{{ route('telefone.atualizar', $telefone->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="form-group row">
                                    <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                                    <div class="col-md-6">
                                        <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ $telefone->descricao }}"  autocomplete="descricao" autofocus>
        
                                        @error('descricao')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>
                                    <div class="col-md-6">
                                        <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ $telefone->telefone }}"  autocomplete="telefone" autofocus>
        
                                        @error('telefone') 
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

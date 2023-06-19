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
                    <li class="breadcrumb-item active">Adicionar</li>
                    <!-- <li class="breadcrumb-item" aria-current="page">Data</li> -->
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('Adicionar novo cliente') }}</div>

                <div class="container-fluid mt-4">
                    <div class="card-body m-0 p-0">
                        <div class="pr-5 pl-5 pb-3">
                            <form class="needs-validation" action="{{ route('cliente.salvar') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Cliente') }}</label>
                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}"  autocomplete="nome" autofocus>
        
                                        @error('nome')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>
                                    <div class="col-md-6">
                                        <input id="endereco" type="text" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}"  autocomplete="endereco" autofocus>
        
                                        @error('endereco')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Salvar</button>
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

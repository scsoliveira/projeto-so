@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="text-center m-auto">
                    <img src="{{ asset('images/404.svg') }}" alt="" width="250px">
                </div>
                <div class="text-center lead mt-3">
                    <p>A página que você está tentando acessar não existe.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct() {
        $this->middleware('guest');
    }

    protected function validator(array $data)  {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'      => 'É necessário preencher o nome.',
            'name.string'        => 'O nome deve conter apenas letras.',
            'name.max'           => 'O nome deve conter no máximo 255 caracteres.',
            'email.required'     => 'É necessário preencher o E-Mail',
            'email.email'        => 'Informe um E-Mai válido.',
            'email.max'          => 'O E-Mail deve conter no máximo 255 caracteres.',
            'email.unique'       => 'O E-Mail informado já está em uso.',
            'password.required'  => 'É necessário preencher a senha.',
            'password.min'       => 'A senha deve conter no mínimo 8 caracteres.',
            'password.confirmed' => 'Confirme a sua senha.'
        ]);
    }

    protected function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

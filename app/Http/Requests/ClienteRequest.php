<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome'     => 'required|max:255',
            'email'    => 'required|email|max:255',
            'endereco' => 'required'
        ];
    }

    public function messages() {
        return [
            'nome.required'     => "É necessário preencher o nome.",
            'nome.max'          => "O nome deve possuir no máximo 255 caracteres.",
            'email.required'    => "É necessário preencher o E-Mail.",
            'email.email'       => "Informe um E-Mail válido.",
            'email.max'         => "O E-Mail deve possuir no máximo 255 caracteres.",
            'endereco.required' => "É necessário preencher o endereço."
        ];
    }
}

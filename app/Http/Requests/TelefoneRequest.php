<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TelefoneRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'descricao' => 'required|max:150',
            'telefone'    => 'required|min:12'
        ];
    }

    public function messages() {
        return [
            'descricao.required' => "É necessário preencher a descrição.",
            'descricao.max'      => "A descrição deve possuir no máximo 150 caracteres.",
            'telefone.required'    => "É necessário preencher o telefone.",
            'telefone.min'         => "O número deve possuir no mínimo 12 caracteres."
        ];
    }
}

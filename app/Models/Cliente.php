<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
    use HasFactory;

    protected $fillable = ['nome', 'email', 'endereco'];

    public function telefones() {
        return $this->hasMany('App\Models\Telefone');
    } 

    public function addTelefone(Telefone $telefone) {
        return $this->telefones()->save($telefone);
    }

    public function apagarTelefones() {
        foreach($this->telefones as $telefone) {
            $telefone->delete();
        }
        return true;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model {
    protected $fillable = ['descricao', 'telefone'];
    use HasFactory;

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }
}

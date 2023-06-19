<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Telefone;
use App\Models\Cliente;
class ClientesTableSeed extends Seeder {
    public function run() {
        Cliente::factory()->times(10)->create()->each(function ($cliente) {
            $cliente->telefones()->save(Telefone::factory()->make());
        });
    }
}
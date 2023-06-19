<?php

namespace Database\Factories;

use App\Models\Telefone;
use Illuminate\Database\Eloquent\Factories\Factory;

class TelefoneFactory extends Factory {
    protected $model = Telefone::class;

    public function definition() {
        return [
            'descricao' => $this->faker->title,
            'telefone' => $this->faker->phoneNumber
        ];
    }
}

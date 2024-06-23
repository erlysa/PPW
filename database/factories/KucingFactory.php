<?php

namespace Database\Factories;

use App\Models\Kucing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class KucingFactory extends Factory
{
    protected $model = Kucing::class;

    public function definition()
    {
        $image = $this->faker->image('public/storage/images', 640, 480, 'cats', false);

        return [
            'id_kucing' => $this->faker->unique()->numberBetween(1, 1000),
            'nama_kucing' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Jantan', 'Betina']),
            'ras_kucing' => $this->faker->word,
            'berat_badan' => $this->faker->randomFloat(2, 1, 10),
            'status_kesehatan' => $this->faker->randomElement(['Sehat', 'Sakit']),
            'foto_kucing' => basename($image),
        ];
    }
}

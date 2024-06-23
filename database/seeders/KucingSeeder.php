<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kucing;

class KucingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kucing::factory()->count(10)->create();
    }
}

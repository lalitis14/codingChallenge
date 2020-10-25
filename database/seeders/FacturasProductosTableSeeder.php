<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FacturaProducto;

class FacturasProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FacturaProducto::factory()->count(60)->create(); 
    }
}

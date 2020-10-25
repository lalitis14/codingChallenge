<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\FacturaProducto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductosTableSeeder::class);
        $this->call(FacturasTableSeeder::class);
        $this->call(FacturasProductosTableSeeder::class);
    }
}

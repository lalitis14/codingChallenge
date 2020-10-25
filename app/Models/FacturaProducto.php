<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "facturas_productos";
    public $guarded = [];

    public function productos(){
        return $this->hasMany("App\Models\Producto", "id_producto");
    }

}

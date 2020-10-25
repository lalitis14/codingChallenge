<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $guarded = [];

    #conectar con tabla Facturas
    public function facturas(){
        return $this->belongsToMany("App\Models\Factura", "facturas_productos", "id_producto", "id_factura")
        ->withPivot('cantidad');
    }

    #transforma precio en flotante de dos decimales con separador de "," para decimales y "." para miles.
    public function precioFloat(){
        return number_format((float)$this->precio, 2, ",", ".");
    }
}

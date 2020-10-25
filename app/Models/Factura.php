<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    public $guarded = [];

    #conectar con Table Producto
    public function productos(){
        return $this->belongsToMany("App\Models\Producto", "facturas_productos", "id_factura", "id_producto")->withPivot('cantidad');
    }

    #Muestra fecha de compra en formato dd/mm/YY
    public function purchaseDate()
    {
        $date = strtotime($this->created_at);
        $newDate = date('d / m / Y',$date);
        return $newDate;
    }

    #Devuelve total de items por factura
    public function getTotalItems(){
        $totalProductos=0;
        foreach ($this->productos as $producto){
            $cant = $producto->pivot->cantidad;
            $totalProductos+=$cant;
        };
        return $totalProductos;
    }

    #Devuelve precio total por factura
    public function getTotalPrice(){
        $precioTotal=0;
        foreach ($this->productos as $producto){
            #calculo subtotal multiplicando precio por cantidad de productos
            $subtotal = $producto->precio * $producto->pivot->cantidad;
            #sumo subtotal a total
            $precioTotal+= $subtotal;
        };
        #convierte precioTotal en flotante de dos decimales con separador de "," para decimales y "." para miles.
        return number_format((float)$precioTotal, 2, ",", ".");
    }

}

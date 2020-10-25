<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\FacturaProducto;

class FacturasController extends Controller
{

    #Función que muestra listado de facturas
    public function listado()
    {
      $facturas = Factura::paginate(10);
      $vac = compact("facturas");
      return view ("/facturas", $vac);
    }

    #Función que muestra detalle de factura
    public function detalle($id_factura)
    {
      $factura = Factura::find($id_factura);
      $vac = compact("factura");
      return view ("/factura-detalle", $vac);
    }

    #Función que muestra detalle de factura lista para edición
    public function visualizarEdicion($id_factura)
    {
      $productos = Producto::all();
      $factura = Factura::find($id_factura);
      $vac = compact("factura", "productos");
      return view ("/factura-editar", $vac);
    }

    #Función que sobreescribe base de datos al confirmar edición
    public function confirmarEdicion($id_factura, Request $req)
    {   
        $factura = Factura::find($id_factura);
        $productos = $factura->productos->toArray();
        for ($i=0; $i <count($productos) ; $i++) {
          $facturaProducto = FacturaProducto::where("id_factura", "=", $id_factura)->where("id_producto", "=", $req["id_producto-".$productos[$i]["pivot"]["id_producto"]])->first();
          $facturaProducto->cantidad = $req["cantidad-".$productos[$i]["pivot"]["id_producto"]];
          $facturaProducto->save();
        }
        $factura = Factura::find($id_factura);
        $vac = compact("factura", "productos");
        return view ("/factura-detalle", $vac);
    }

}
@extends('layout')
@section('title')Listado de Facturas
@endsection


@section('main')

    <div class="card-body">
      <h4 class="font-white">Listado de Facturas</h4>
          @if ($facturas->total()==0)
          <div class="row rounded bg-light pt-2 mt-3 text-center d-flex align-items-center">
                <div class="col-6 offset-3 text-body pb-2">
                  No hay ninguna factura ingresada en sistema.<br>
                  Por favor ejecute el comando <b>php artisan db:seed</b> 
                  y recargue la página.
                </div>
          </div>
          @else
          @foreach ($facturas as $factura)
            <a href="{{ url('/factura-detalle/'. $factura->id)}}">
              <div class="row rounded bg-light pt-2 mt-3 text-center d-flex align-items-center">
                <div class="col-3 text-body">
                  <p>Factura<br>
                  <b>#000{{$factura->id}}</b></p>
                </div>
                <div class="col-3 text-body">
                  <p>Fecha de Compra<br>
                  <b>{{$factura->purchaseDate()}}</b></p>
                </div>
                <div class="col-3 text-body">
                  <p>Cantidad de Items<br>
                  <b>{{$factura->getTotalItems()}}</b></p>
                </div>
                <div class="col-3 text-body">
                  <p>Total<br>
                  <b>${{$factura->getTotalPrice()}}</b></p>
                </div>
            </div>    
          </a>
          @endforeach
          @endif

          <div class="pagination justify-content-end my-2">
            {{$facturas ->links('pagination::bootstrap-4')}}
          </div>

    </div>

@endsection
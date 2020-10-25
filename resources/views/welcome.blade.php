@extends('layout')
@section('title')Listado de Facturas
@endsection


@section('main')

    <div class="card-body">
      <h4 class="font-white">Pantalla de Bienvenida</h4>
          <div class="row rounded bg-light pt-2 mt-3 text-center d-flex align-items-center">
                <div class="col-8 offset-2 text-body pb-2">
                  Antes de ingresar a la pantalla de visualización de facturas,
                  por favor asegúrese de ejecutar el comando
                  <b>php artisan migrate</b> desde la consola.</b>
                  Puede realizar el <b>--seed</b> en la misma ejecución, o bien
                  hacerlo más adelante cuando el sistema lo requiera. 
                </div>
          </div>
    </div>
    <div class="text-center">
        <a class="btn btn-primary" href="{{ url('/facturas') }}">Ingresar</a>
    </div>
@endsection
@extends('layout')
@section('title')Detalle Factura #000{{$factura->id}}
@endsection


@section('main')


  <div class="col py-3">
      <div class="card">
        <div class="card-body">
          <h4 class="text-dark">Datos de la Factura</h4>
            <hr>
              <div class="container">
                  <div class="row rounded bg-light py-2 my-3 text-center">
                  <div class="col-4 pt-2">
                      <p>Nro. Factura<br>
                      <b>000{{$factura->id}}</b></p>
                    </div>
                    <div class="col-4 pt-2">
                      <p>Fecha de Compra<br>
                      <b>{{$factura->purchaseDate()}}</b></p>
                    </div>
                    <div class="col-4 pt-2">
                      <p>Total<br>
                      <b>${{$factura->getTotalPrice()}}</b></p>
                    </div>
                </div>
              </div>

              <h4 class="text-dark">Detalle</h4>
                <hr>
                  <div class="container">
                      <div class="row border-bottom rounded bg-light p-2 my-3 text-center">
                        <div class="d-none d-lg-block col-lg-6 pt-2 text-left">
                          <b><p>Descripción</p></b>
                        </div>
                        <div class="d-none d-lg-block col-4 col-lg-2 pt-2 text-center">
                          <b><p>Cantidad</p></b>
                        </div>
                        <div class="d-none d-lg-block col-4 col-lg-2 pt-2 text-center">
                          <b><p>Precio</p></b>
                        </div>
                        <div class="d-none d-lg-block col-4 col-lg-2 pt-2 text-center">
                          <b><p>Subtotal</p></b>
                        </div>

                        @foreach ($factura->productos as $producto)
                          <div class="d-block d-lg-none col-12 pt-2 text-left">
                            <b><p>Descripción</p></b>
                          </div>

                          <div class="col-12 col-lg-6 pt-2 text-left">
                            <p class="font-s"><strong>{{$producto->nombre}}</strong> - {{$producto->descripcion}}</p>  
                          </div>

                          <div class="col-4 col-lg-2 pt-2 text-center">
                            <p class="d-block d-lg-none"><b>Cantidad</b></p>
                            <p class="font-s">{{$producto->pivot->cantidad}}</p>
                          </div>

                          <div class="col-4 col-lg-2 pt-2 text-center">
                            <p class="d-block d-lg-none"><b>Precio</b></p>
                            <p class="font-s">$ {{$producto->precioFloat()}}</p>
                          </div>

                          <div class="col-4 col-lg-2 pt-2 text-center">
                            <p class="d-block d-lg-none"><b>Subtotal</b></p>
                            <p class="font-s">$ {{number_format((float)$producto->pivot->cantidad * $producto->precio,2,",",".")}}</p>
                          </div>
                        @endforeach
                    </div>
                  </div>
                  
                  <div class="flexbox">
                    <div class="text-center mx-3">
                      <a class="btn btn-primary" href="{{ url('/facturas')}}">Volver</a>
                    </div>
                    <div class="text-center mx-3">
                      <a class="btn btn-secondary" href="{{ url('/factura-editar/'. $factura->id)}}">Editar</a>
                    </div>
                  </div>
              </div>
          </div>
        </div>


@endsection
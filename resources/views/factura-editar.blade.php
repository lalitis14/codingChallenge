@extends('layout')
@section('title')Editar Factura #000{{$factura->id}}
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
                      <b id="total-factura">${{$factura->getTotalPrice()}}</b></p>
                    </div>
                </div>
              </div>
            
            <form id="form-editar-factura" action="{{ url('/factura-editar/'. $factura->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12 text-danger">
                @if ($errors)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
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

                          <div class="col-4 col-lg-2 text-center">
                            <p class="d-block d-lg-none"><b>Cantidad</b></p>
                            <input type="hidden" name="id_producto-{{$producto->id}}" value="{{$producto->id}}">
                            <input required class="cantidad-producto" id="cantidad" name="cantidad-{{$producto->id}}" type="number"  min="1" max="100" value= "{{ old('cantidad') ? old('cantidad') : $producto->pivot->cantidad}}" class="form-control col-6 offset-3">
                          </div>

                          <div class="col-4 col-lg-2 pt-2 text-center">
                            <p class="d-block d-lg-none"><b>Precio</b></p>
                            <p class="font-s">$ {{$producto->precioFloat()}}</p>
                            <input type="hidden" class="precio" value="{{$producto->precio}}">
                          </div>

                          <div class="col-4 col-lg-2 pt-2 text-center">
                            <p class="d-block d-lg-none"><b>Subtotal</b></p>
                            <p class="font-s subtotal">$ {{number_format((float)$producto->pivot->cantidad * $producto->precio,2,",",".")}}</p>
                          </div>
                        @endforeach
                    </div>
                  </div>
                  
                  <div class="flexbox">
                    <div class="text-center mx-3">

                      <a class="btn btn-danger" href="{{ url('/factura-detalle/'. $factura->id)}}">Cancelar</a>
                    </div>
                    <div class="text-center mx-3">
                      <button type="submit" class="btn btn-secondary">Confirmar
                    </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>


@endsection

@section('scripts')
<script src="{{ asset('/js/factura-editar.js') }}"></script>
@endsection
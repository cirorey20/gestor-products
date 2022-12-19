@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 style="font-family: 'Fraunces', serif;" class="text-center">Products</h1>
        <div class="row d-flex justify-content-center">

          <div class="row">
            @foreach ($product as $item)
                
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                
                <div class="card-body">
                  <h4 class="card-title">
                        {{ $item->name }}
                  </h4>
                  <h5>${{ $item->price }}</h5>
                  <p class="card-text">stock: {{ $item->quantity }}</p>
                
                </div>

                <div class="card-footer d-flex">
                    <div class="m-1 p-1 ">
                      <form action="{{route('cart.add')}}" method="GET"  id="add">
                        <input type="hidden" name="product_id" value="{{$item->id}}">
                        <input type="submit" class="btn btn-primary" value="AñadirCarrito">
                      </form>
                    </div>
                    
                </div>
                
                
              </div>
            </div>
            
            @endforeach
          </div>
    
        </div>
    
      </div>
      
      @section('jav')
      {{-- <script src=" url('js/cart.js') "></script> --}}
      <script>

        // console.log("HOLAAAAA");
      </script>
      @endsection


@endsection
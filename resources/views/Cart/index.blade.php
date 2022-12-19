@extends('layouts.app')

@section('content')

<div class="container m-5 p-5">
    <div class="row">
        <div class="col text-center">

            <h1>Mi Carrito</h1>

        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12">

            @if(count(Cart::getContent()))
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>ELIMINAR DEL CARRITO</th>
                    </thead>
                    <tbody>
                        
                        @foreach (Cart::getContent()->sortBy(function ($cart) {
                            return $cart->id;
                        }); as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <div class="input-group">
                                        <a href="{{url('cart-decrement')}}/{{$item->id}}" class="btn btn-outline-secondary" role="button">
                                            -
                                        </a>
                                        
                                        <input type="number" disabled id="numero" min="1" class="form-control text-center" style="width : 20px; heigth : 20px" name="cantidad" value="{{$item->quantity}}">
                                        
                                        <a href="{{url('cart-increment')}}/{{$item->id}}" class="btn btn-outline-secondary" role="button">
                                                +
                                        </a>
                                    </div>                                                                
                                </td>
                                <td>${{$item->price*$item->quantity}}</td>
                                <td>
                                        <a href="{{url('cart-delete')}}/{{$item->id}}" class="btn btn-outline-danger" role="button">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                     
                <h4>Total a pagar: ${{Cart::getSubTotal()}} </h4>
                <form action="{{url('buy')}}" method="POST">
                    @csrf
                    <input type="hidden" name="total" value="{{Cart::getSubTotal()}}">
                    <input type="submit" name="btn" class="btn btn-outline-info" value="Realizar Compra">
                </form>
                
                
            @else
                <h3>Carrito Vacío</h3>
            @endif
        </div>
    </div> 
</div>       

@endsection


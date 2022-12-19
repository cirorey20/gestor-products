@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">


        {{-- {{ url('/product/edit/') }}/{{ $item->id }} --}}
        {{-- <form method="GET" action="{{ url ('/product/update')}}/{{$edit->id}}"> --}}

        <form action="{{ url('/update/') }}/{{ $edit->id }}"  method="POST">
            @csrf
            @method('PUT')
                <div class="form-row">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" required value="{{ $edit->name }}">
                    
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" placeholder="sin puntos ni comas" required value="{{ $edit->price }}">

                    <label for="">Stock</label>
                    <input type="text" name="quantity" class="form-control" required value="{{ $edit->quantity }}">
                    
                    <label for="">Upc</label>
                    <input type="text" name="upc" class="form-control" required value="{{ $edit->upc }}">

                    <label for="">Sale</label>
                    <input type="text" name="sale" class="form-control" required value="{{ $edit->sale }}">
                    
                    <br><br>

                    <button type="submit" class="btn btn-primary form-control">Save</button>
                </div>
        </form>
        <a type="button" href="{{ url ('/admin-index')}}" class="btn btn-danger form-control">Abort</a>
            
        </div>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <form action="{{route('new')}}" method="POST">
                    @csrf
                        <div class="card-body">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" required>
                            
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="sin puntos ni comas" required>
                            
                            <label for="">Stock</label>
                            <input type="text" name="quantity" class="form-control" required>

                            <br>
                            <br><br>

                            <button type="submit" class="btn btn-primary form-control">Guardar</button>
                            
                        </div>
                        <!-- -->
                        
                </form>   

            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                        VER COMPRA
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>shop</th>
                            <th>subtotal</th>
                            <th>total</th>
                        </tr>
                    @foreach ($sale as $item)    
                    </thead>
                    <tbody>
                        <tr>
                            <td>view</td>
                            <td>${{ '$item->subtotal' }}</td>
                            <td>${{ '$item->total' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection

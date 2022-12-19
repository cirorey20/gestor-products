@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Hello {{ Auth::user()->name }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <a class="btn btn-primary" href="" role="button">Shops</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header text-center">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>shop</th>
                                    <th>subtotal</th>
                                    <th>total</th>
                                </tr>
                            @foreach ($sale->load('sales_products') as $item)    
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="{{ url('/client-shop') }}/{{ $item->id }}" class="btn btn-outline-success" > view </a>
                                    </td>
                                    <td>${{ $item->subtotal }}</td>
                                    <td>${{ $item->total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
